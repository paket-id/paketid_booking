<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 03:00:28
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:25:58
 */

class PaketId_Booking_Model_Adminhtml_Observer{

	public function getSalesOrderBookingInfo(Varien_Event_Observer $observer) {
        $block = $observer->getBlock();
        // layout name should be same as used in /app/design/adminhtml/default/default/layout/paketid_booking.xml
        if (($block->getNameInLayout() == 'order_info') && ($child = $block->getChild('paketid_booking.order.info.booking.block'))) {
            $transport = $observer->getTransport();
            if ($transport) {
                $html = $transport->getHtml();
                $html .= $child->toHtml();
                $transport->setHtml($html);
            }
        }
    }
}