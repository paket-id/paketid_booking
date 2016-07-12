<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 01:58:19
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:28:03
 */

class PaketId_Booking_Model_Resource_Booking_Result extends Mage_Core_Model_Resource_Db_Abstract
{

    /**
     * constructor
     *
     * @access public
     * @author Fram^
     */
    public function _construct()
    {
        $this->_init('paketid_booking/booking_result', 'entity_id');
    }
}
