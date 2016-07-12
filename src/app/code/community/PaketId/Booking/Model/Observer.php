<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-07 23:53:44
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:27:53
 */

class PaketId_Booking_Model_Observer{
	/**
	 * Hook the event that fired after order placed to post data to paket.id
	 * @return mixed
	 */
    public function processOrder(Varien_Event_Observer $observer)
    {
    	$order = $observer->getEvent()->getOrder();
    	if(!$order && $invoice = $observer->getEvent()->getInvoice()){
    		$order = $invoice->getOrder();
    	}
    	
    	if(!$order)
    		return $this;

    	$billingAddress = $order->getBillingAddress();
    	$shippingAddress = $order->getShippingAddress();

        try {
            $api = Mage::getModel('paketid_booking/api_booking');

			$api->setData('from_email', $billingAddress->getEmail());
			$api->setData('from_name', $billingAddress->getName());
			$api->setData('from_address', $this->getAddress($billingAddress));
			$api->setData('from_phone', $billingAddress->getTelephone());
			$api->setData('from_zip_code', $billingAddress->getPostcode());
			// $api->setData('from_area_id', $billingAddress->getCountryId());
			$api->setData('to_name', $shippingAddress->getName());
			$api->setData('to_email', $shippingAddress->getEmail());
			$api->setData('to_address', $this->getAddress($shippingAddress));
			$api->setData('to_phone', $shippingAddress->getTelephone());
			$api->setData('to_zip_code', $shippingAddress->getPostcode());
			// $api->setData('to_area_id', $shippingAddress->getCountryId());
			$api->setData('message', '');
			$api->setData('note', '');
			// $api->setData('email_receiver', '');
			// $api->setData('email_sender', '');

			$response = $api->send('array');

			if($response['success'] == 1){
				$model = Mage::getModel('paketid_booking/booking_result');
				$model->setData($response['detail']);
				$model->setOrderId($order->getId());
				$model->save();
			}
			else{
				if(Mage::helper('paketid_booking')->isDebug()){
					Mage::log($response['msg'], null, 'paketid_booking.log', true);
				}
				throw new Exception($response['msg']);
			}
        }
        catch (Exception $e) {
            throw new $e;
        }
        
        return $this;
    }

    /**
     * Get address
     */
    private function getAddress($addressModel){
    	$country = Mage::getModel('directory/country')->loadByCode($addressModel->getCountryId());
    	$streets = $addressModel->getStreet();
    	$data = array(
			$streets[0],
			$addressModel->getCity(),
			$addressModel->getRegion(),
			$country->getName(),
		);
		$address = implode(', ', $data);

		return $this->cleanAddress($address);
    }

    /**
     * Remove ugly characters from address string
     */
    private function cleanAddress($address){
    	$uglyChars = array(
			"\r\n" => ", ",
			"\n" => ", ",
			"  " => " ",
			",," => ",",
			", ," => ",",
		);
		
		$address = trim($address);

		foreach($uglyChars as $uglyChar => $replacement){
			while (strpos($address, $uglyChar) !== false) {
	    		$address = str_ireplace($uglyChar, $replacement, $address);
	    	}
		}
    	
    	return $address;
    }
}