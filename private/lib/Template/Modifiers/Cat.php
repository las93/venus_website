<?php

/**
 * Manage Template
 *
 * @category  	lib
 * @package		lib\Template
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
 * @package		lib\Template
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Cat {

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
	 * @param  string $sConcatString string to concat
	 * @return string
	 */

	public function replaceBy($sContent, $sConcatString = '') {

		return '{echo('.$sContent.'.'.$sConcatString.')}';
	}
}
