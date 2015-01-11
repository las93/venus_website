<?php

/**
 * Bash Tools
 *
 * @category  	lib
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\lib;

/**
 * Bash Tools
 *
 * @category  	core
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Bash {

	/**
	 * color of the text in the bash
	 *
	 * @access public
	 * @var    array
	 */

	public static $_aColorCodes = array(
		'default' => 39,
		'black' => 30,
		'red' => 31,
		'green' => 32,
		'yellow' => 33,
		'blue' => 34,
		'magenta' => 35,
		'cyan' => 36,
		'light gray' => 37,
		'dark gray' => 90,
		'light red' => 91,
		'light green' => 92,
		'light yellow' => 93,
		'light blue' => 94,
		'light magenta' => 95,
		'light cyan' => 96,
		'white' => 97
	);

	/**
	 * color of the background in the bash
	 *
	 * @access public
	 * @var    array
	 */

	public static $_aBackgroundCodes = array(
		'default' => 49,
		'black' => 40,
		'red' => 41,
		'green' => 42,
		'yellow' => 43,
		'blue' => 44,
		'magenta' => 45,
		'cyan' => 46,
		'light gray' => 47,
		'dark gray' => 100,
		'light red' => 101,
		'light green' => 102,
		'light yellow' => 103,
		'light blue' => 104,
		'light magenta' => 105,
		'light cyan' => 106,
		'white' => 107
	);

	/**
	 * color of the decoration code in the bash
	 *
	 * @access public
	 * @var    array
	 */

	public static $_aDecorationCodes = array(
		'bold' => '1',
		'dim' => '2',
		'underline' => '4',
		'blink' => '5',
		'reverse' => '7',
		'hidden' => '8'
	);

	/**
	 * set a decoration of the text
	 *
	 * @access public
	 * @param  string $sContent content to around by the style
	 * @param  string $sStyleName the name of the style
	 * @return string
	 */

	public static function setDecoration($sContent, $sStyleName) {

		return self::_applyCode($sContent, self::$_aBackgroundCodes[$sStyleName]);
	}

	/**
	 * set a color of the background
	 *
	 * @access public
	 * @param  string $sContent content to around by the style 
	 * @param  string $sColorName the name of the color
	 * @return string
	 */

	public static function setBackground($sContent, $sColorName) {

		if (!isset(self::$_aBackgroundCodes[$sColorName])) { $sColorName = 'black'; }

		return self::_applyCode($sContent, self::$_aBackgroundCodes[$sColorName]);
	}

	/**
	 * set a color of the text
	 *
	 * @access public
	 * @param  string $sContent content to around by the style
	 * @param  string $sColorName the name of the color
	 * @return string
	 */

	public static function setColor($sContent, $sColorName) {

		if (!isset(self::$_aBackgroundCodes[$sColorName])) { $sColorName = 'white'; }

		return self::_applyCode($sContent, self::$_aBackgroundCodes[$sColorName]);
	}

	/**
	 * around the text by a color
	 *
	 * @access private
	 * @param  string $sContent content to around by the style
	 * @param  string $sCode the name of the code (color or decoration)
	 * @var    string
	 */

	private static function _applyCode($sContent, $sCode) {

		return "\033[" . $sCode . "m" . $sContent . "\033[0m";
	}
}