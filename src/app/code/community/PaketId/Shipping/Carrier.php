<?php
// app/code/local/Envato/Customshippingmethod/Model
class PaketId_Shipping_Model_Carrier
extends Mage_Shipping_Model_Carrier_Abstract
implements Mage_Shipping_Model_Carrier_Interface
{
  protected $_code = 'paketid_shipping';
 
  public function collectRates(Mage_Shipping_Model_Rate_Request $request)
  {
    $result = Mage::getModel('shipping/rate_result');
    $result->append($this->_getDefaultRate());
 
    return $result;
  }
 
  public function getAllowedMethods()
  {
    return array(
      'paketid_shipping' => $this->getConfigData('name'),
      //'standard' => 'Standard', if you want to use the standard price
    );
  }
 
  protected function _getDefaultRate()
  {
    $rate = Mage::getModel('shipping/rate_result_method');
     
    $rate->setCarrier($this->_code);
    $rate->setCarrierTitle($this->getConfigData('title'));
    $rate->setMethod($this->_code);
    $rate->setMethodTitle($this->getConfigData('name'));
    $rate->setPrice($this->getConfigData('price'));
    $rate->setCost(0);
     
    return $rate;
  }

  public function isTrackingAvailable()
  {
    return true;
  }

  public function getTrackingInfo($tracking)
  {
    $track = Mage::getModel('shipping/tracking_result_status');
    $track->setUrl('https://www.paket.id/is/' . $tracking)
        ->setTracking($tracking)
        ->setCarrierTitle($this->getConfigData('name'));
    return $track;
  }
  /*
  protected function _getStandardShippingRate()
    {
        $rate = Mage::getModel('shipping/rate_result_method');
        /* @var $rate Mage_Shipping_Model_Rate_Result_Method */

        //$rate->setCarrier($this->_code);
        /**
         * getConfigData(config_key) returns the configuration value for the
         * carriers/[carrier_code]/[config_key]
         */
        /*
        $rate->setCarrierTitle($this->getConfigData('title'));

        $rate->setMethod('standand');
        $rate->setMethodTitle('Standard');

        $rate->setPrice(4.99);
        $rate->setCost(0);

        return $rate;
    }

  protected function _getExpressShippingRate() /if customer wants to choose whether standard or express service
  {
    $rate = Mage::getModel('shipping/rate_result_method');
    /* @var $rate Mage_Shipping_Model_Rate_Result_Method */
    /*
    $rate->setCarrier($this->_code);
    $rate->setCarrierTitle($this->getConfigData('title'));
    $rate->setMethod('express');
    $rate->setMethodTitle('Express (Next day)');
    $rate->setPrice(12.99);
    $rate->setCost(0);
    return $rate;
  }
  */
}