<?php

/**
 * Manage Template
 *
 * @category  	lib
 * @package	lib\Template
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\lib\Template\Modifiers;

/**
 * This class manage the Template
 *
 * @category  	lib
 * @package	lib\Template
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class DateFormat {

	/**
	 * run before
	 *
	 * @access public
	 * @param  array $aParams parameters
	 * @return \Venus\lib\Template\Mailto
	 */

	public function run($aParams = array()) {

		;
	}

	/**
	 * run before
	 *
	 * @access public
	 * @param  string $sContent content to transform
	 * @param  string $sFormat date format
	 * @return string
	 */

	public function replaceBy($sContent, $sFormat = '"%b %e, %Y"') {

		$aTransformFormat = array('%D', '%h', '%n', '%r', '%R', '%t', '%T');
		$aTransformFormatFinal = array('%m/%d/%y', '%b', "\n", '%I:%M:%S %p', '%H:%M', "\t", '%H:%M:%S');

		if (strpos($sFormat, '%e') !== false) {

			$aTransformFormat[] = '%e';
			$aTransformFormatFinal[] = sprintf('%\' 2d', date('j', $sContent));
		}

		if (strpos($sFormat, '%l') !== false) {

			$aTransformFormat[] = '%l';
			$aTransformFormatFinal[] = sprintf('%\' 2d', date('h', $sContent));
		}

		$sFormat = str_replace($aTransformFormat, $aTransformFormatFinal, $sFormat);

		return '{strftime('.$sFormat.', '.$sContent.')}';
	}
}
