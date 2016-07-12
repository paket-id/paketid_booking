<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-07 23:38:04
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:26:10
 */

class PaketId_Booking_Model_Api_Booking extends PaketId_Booking_Model_Api_Abstract
{
	const END_POINT = 'http://paket.id/apis/v2/booking';

	public function _construct()
	{
		parent::_construct();
		$this->setData('api_email', Mage::helper('paketid_booking')->getApiEmail());
		$this->setData('api_key', Mage::helper('paketid_booking')->getApiKey());
	}

	public function getEndpointUrl()
	{
		return self::END_POINT . '?auth-user-email=' . $this->getApiEmail() . '&auth-api-key=' . $this->getApiKey();
	}
	
	public function send($return_type = "object")
	{	
		$url = $this->getEndpointUrl();
		
		$fields = array(
			'from_email' => urlencode($this->getData('from_email')),
			'from_name' => urlencode($this->getData('from_name')),
			'from_address' => urlencode($this->getData('from_address')),
			'from_zip_code' => urlencode($this->getData('from_zip_code')),
			'from_area_id' => urlencode($this->getData('from_area_id')),
			'to_name' =>  urlencode($this->getData('to_name')),
			'to_address' =>  urlencode($this->getData('to_address')),
			'to_zip_code' => urlencode($this->getData('to_zip_code')),
			'to_area_id' => urlencode($this->getData('to_area_id')),
			'from_phone' => urlencode($this->getData('from_phone')),
			'to_phone' =>  urlencode($this->getData('to_phone')),
			'to_email' => urlencode($this->getData('to_email')),
			'message' => urlencode($this->getData('message')),
			'note' => urlencode($this->getData('note')),
			'email_receiver' => urlencode($this->getData('email_receiver')), // -1 if no mail shld be sent to receiver, 0 otherwise
			'email_sender' => urlencode($this->getData('email_sender')) // -1 if no mail shld be sent to sender, 0 otherwise
		);
			
		return $this->postData($url, $fields, $return_type);
	}
}