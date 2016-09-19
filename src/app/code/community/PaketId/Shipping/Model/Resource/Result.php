<?php

class PaketId_Shipping_Model_Resource_Result extends Mage_Core_Model_Resource_Db_Abstract {
	public function _construct()
    {
        $this->_init('paketid_shipping/result', 'entity_id');
    }
	
}