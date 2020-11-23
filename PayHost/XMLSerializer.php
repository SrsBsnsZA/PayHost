<?php

namespace SrsBsns\PayHost;

use SrsBsns\PayHost\types\SingleVaultRequest;

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

	public static function generateVaultXml(SingleVaultRequest $singleVaultRequest)
    {
        $xml = '';
        $xml .= "<".self::$ns.":SingleVaultRequest><".self::$ns.":CardVaultRequest><".self::$ns.":Account><".self::$ns.":PayGateId>".$singleVaultRequest->getCardVaultRequest()->getAccount()->getPayGateId().
            "</".self::$ns.":PayGateId><".self::$ns.":Password>".$singleVaultRequest->getCardVaultRequest()->getAccount()->getPassword().
            "</".self::$ns.":Password></".self::$ns.":Account><".self::$ns.":CardNumber>".$singleVaultRequest->getCardVaultRequest()->getCardNumber()."</".self::$ns.":CardNumber>".
            "</".self::$ns.":CardNumber><".self::$ns."CardExpiryDate>".$singleVaultRequest->getCardVaultRequest()->getCardExpiryDate()."</".self::$ns.":CardExpiryDate>".
            "</".self::$ns.":CardVaultRequest></".self::$ns.":SingleVaultRequest>";
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
