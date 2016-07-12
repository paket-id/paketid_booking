<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 01:57:56
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:43:09
 */

class PaketId_Booking_Model_Result extends Mage_Core_Model_Abstract
{
    /**
     * Entity code.
     * Can be used as part of method name for entity processing
     */
    const ENTITY    = 'paketid_booking_result';
    const CACHE_TAG = 'paketid_booking_result';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'paketid_booking_result';

    /**
     * Parameter name in event
     *
     * @var string
     */
    protected $_eventObject = 'paketid_booking_result';

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
        $this->_init('paketid_booking/result');
    }
}