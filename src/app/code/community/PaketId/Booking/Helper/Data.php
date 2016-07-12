<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-06-17 11:14:31
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:25:47
 */

class PaketId_Booking_Helper_Data extends Mage_Core_Helper_Abstract
{
	const CONFIG_API_EMAIL = 'paketid_booking/api/email';
	const CONFIG_API_KEY   = 'paketid_booking/api/key';
	const CONFIG_API_DEBUG = 'paketid_booking/api/debug';

	public function getApiEmail()
	{
		return Mage::getStoreConfig(self::CONFIG_API_EMAIL);
	}

	public function getApiKey()
	{
		return Mage::getStoreConfig(self::CONFIG_API_KEY);
	}

	public function isDebug()
	{
		return (boolean)Mage::getStoreConfig(self::CONFIG_API_DEBUG);
	}
}