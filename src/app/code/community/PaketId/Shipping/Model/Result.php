<?php

class PaketId_Shipping_Model_Result extends Mage_Core_Model_Abstract {
	
	/**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY    = 'paketid_shipping_result';
    const CACHE_TAG = 'paketid_shipping_result';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'paketid_shipping_result';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'paketid_shipping_result';

    /**
     * constructor
     *
     * @access public
     * @return void
     * @author Fram^
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('paketid_shipping/result');
    }
}
