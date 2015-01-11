<?php

/**
 * Manage Template
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

namespace Venus\lib\Template\Functions;

/**
 * This class manage the Template
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

class ConfigLoad {

	/**
	 * run before
	 *
	 * @access public
	 * @param  array $aParams parameters
	 * @return \Venus\lib\Template\ConfigLoad
	 */

	public function run($aParams = array()) {

		;
	}

	/**
	 * run before
	 *
	 * @access public
	 * @param  array $aParams parameters
	 * @return \Venus\lib\Template\ConfigLoad
	 */

	public function replaceBy($aParams = array()) {

		$sFile = '';

		if (isset($aParams['file'])) { $sFile = $aParams['file']; }
		else { new \Exception('ConfigLoad: file obligatory');}

		$sViewDirectory = str_replace('lib'.DIRECTORY_SEPARATOR.'Template'.DIRECTORY_SEPARATOR.'Function',
			'src'.DIRECTORY_SEPARATOR.PORTAIL.DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR, __DIR__);

		$aConfVars = parse_ini_file($sViewDirectory.$sFile);

		$sContent = '';
		$sContent = $this->_constructVar($sContent, $aConfVars, '$_aProtectedVar[\'app\'][\'config\']');

		return '<?php '.$sContent.'; ?>';
	}

	/**
	 * constructor of var on recursive mode
	 *
	 * @access private
	 * @param  string $sContent content to return
	 * @param  array $aConfVars var to parse
	 * @return unknown
	 */
	private function _constructVar($sContent, $aConfVars, $sVarTemplate) {

		foreach ($aConfVars as $mKey => $mOne) {

			if (is_array($mOne)) {

				$sContent .= $sVarTemplate.'[\''.$mKey.'\'] = array(); ';
				$sContent = $this->_constructVar($sContent, $mOne, $sVarTemplate.'[\''.$mKey.'\']');
			}
			else {

				$sContent .= $sVarTemplate.'[\''.$mKey.'\'] = "'.$mOne.'"; ';
			}
		}

		return $sContent;
	}
}
