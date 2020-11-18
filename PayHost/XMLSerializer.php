<?php

namespace SrsBsns\PayHost;

class XMLSerializer {

	private static $ns = 'ns1';

	// functions adopted from http://www.sean-barton.co.uk/2009/03/turning-an-array-or-object-into-xml-using-php/

	public static function generateValidXmlFromObj($obj, $node_block = 'nodes', $node_name = ''){
		$arr = get_object_vars($obj);

		return self::generateValidXmlFromArray($arr, $node_block, $node_name);
	}

	public static function generateValidXmlFromArray($array, $node_block = 'nodes', $node_name = ''){
		$xml = '<' . self::$ns . ':' . $node_block . '>'. PHP_EOL;
		$xml .= self::generateXmlFromArray($array, $node_name) . PHP_EOL;
		$xml .= '</' . self::$ns . ':' . $node_block . '>' . PHP_EOL;

		return $xml;
	}

	private static function generateXmlFromArray($array, $node_name){
		$xml = '';

		if(is_array($array) || is_object($array)){
			foreach($array as $key => $value){
				if(is_array($value)){
					foreach($value as $item){
						$xml .= '<' . self::$ns . ':' . $key . '>' . self::generateXmlFromArray($item, $node_name) . '</' . self::$ns . ':' . $key . '>';
					}
				} else

				if(!empty($value)){
					$xml .= '<' . self::$ns . ':' . $key . '>' . self::generateXmlFromArray($value, $node_name) . '</' . self::$ns . ':' . $key . '>';
				}
			}
		} else {
			$xml = htmlspecialchars($array, ENT_QUOTES);
		}

		return $xml;
	}

}
