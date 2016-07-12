<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 01:59:12
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:43:41
 */

class PaketId_Booking_Model_Resource_Result_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
	/**
     * constructor
     *
     * @access public
     * @return void
     * @author Fram^
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init('paketid_booking/result');
    }

	public function addOrderFilter($order)
    {
        if ($order instanceof Mage_Sales_Model_Order) {
            $order = (int) $order->getId();
        }
        if (!is_array($order)) {
            $order = array($order);
        }

        $this->getSelect()->where("main_table.order_id IN (?)", $order);
        
        return $this;
    }

    /**
     * get banners as array
     *
     * @access protected
     * @param string $valueField
     * @param string $labelField
     * @param array $additional
     * @return array
     * @author Fram^
     */
    protected function _toOptionArray($valueField='entity_id', $labelField='booking_code', $additional=array())
    {
        return parent::_toOptionArray($valueField, $labelField, $additional);
    }

    /**
     * get options hash
     *
     * @access protected
     * @param string $valueField
     * @param string $labelField
     * @return array
     * @author Fram^
     */
    protected function _toOptionHash($valueField='entity_id', $labelField='booking_code')
    {
        return parent::_toOptionHash($valueField, $labelField);
    }

    /**
     * Get SQL for get record count.
     * Extra GROUP BY strip added.
     *
     * @access public
     * @return Varien_Db_Select
     * @author Fram^
     */
    public function getSelectCountSql()
    {
        $countSelect = parent::getSelectCountSql();
        $countSelect->reset(Zend_Db_Select::GROUP);
        return $countSelect;
    }
}
