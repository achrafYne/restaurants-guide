<?php
/**
 * 
 * @author achraf
 * @since 26 Mai 2014
 * @copyright sahadina
 */
namespace Sahadina\RestaurantBundle\Utils;

class Sahadina{
	
	/**
	 * Clean name 
	 * @param string $name
	 * @return string $url
	 */
	static public function Sanitize($name)
	{
		$url = strtolower($name);
		$url = preg_replace('/[^a-zA-Z0-9]/i',' ', $url);
		$url = trim($url);
		$url = preg_replace('/\s+/', ' ', $url);
		$url = preg_replace('/\s+/', '-', $url);
		
		return $url;
	}
}