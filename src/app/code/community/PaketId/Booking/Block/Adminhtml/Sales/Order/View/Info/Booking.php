<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 02:57:09
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:22:35
 */

class PaketId_Booking_Block_Adminhtml_Sales_Order_View_Info_Booking extends Mage_Core_Block_Template {
    
    protected $order;
    
    public function getOrder() {
        if (is_null($this->order)) {
            if (Mage::registry('current_order')) {
                $order = Mage::registry('current_order');
            }
            elseif (Mage::registry('order')) {
                $order = Mage::registry('order');
            }
            else {
                $order = new Varien_Object();
            }
            $this->order = $order;
        }
        return $this->order;
    }
}