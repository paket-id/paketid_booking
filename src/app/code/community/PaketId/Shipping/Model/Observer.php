<?php
class PaketId_Shipping_Model_Observer{
	public function addScript($observer) {
    $block = $observer->getEvent()->getBlock();
    if (($block instanceof Mage_Adminhtml_Block_Sales_Order_Shipment_View_Tracking) && $block->getType() != 'core/template' /*&& is your carrier active*/) {
        $shipment = $block->getShipment();
        $_child = clone $block;
        $_child->setType('core/template');
        $block->setChild('PaketId_Shipping', $_child);
        $block->setTemplate('paketid/shipping.phtml');
    }
	}
}
?>
