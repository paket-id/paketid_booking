<?php
/**
 * @Author: Phu Hoang
 * @Date:   2016-07-08 01:32:03
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-07-13 00:22:35
 */

abstract class PaketId_Booking_Model_Api_Abstract extends Mage_Core_Model_Abstract{
	
	public abstract function send($return_type = 'object');
	
	protected function postData($url, $fields, $return_type = 'object'){
		//url-ify the data for the POST
		$fields_string="";
		
		foreach($fields as $key=>$value) {
			$fields_string .= $key.'='.$value.'&';
		}
		
		rtrim($fields_string, '&');
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
		
		//execute post
		$result = curl_exec($ch);
		
		//close connection
		curl_close($ch);
		
		$return_type = strtolower($return_type);

		if ($return_type=="json")
			return $result;
		elseif ($return_type=="object")
			return json_decode($result);

		return $this->convertJSONtoArray($result);
	}

	protected function convertJSONtoArray($data)
	{
		if(is_string($data))
			$data = json_decode($data);

		return json_decode(json_encode($data), true);
	}
}