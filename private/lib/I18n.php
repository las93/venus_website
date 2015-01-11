<?php

/**
 * Manage Translation
 *
 * @category    lib
 * @author      Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright   Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license     https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version     Release: 1.0.0
 * @filesource  https://github.com/las93/venus
 * @link        https://github.com/las93
 * @since       1.0
 */

namespace Venus\lib;

use \Venus\lib\I18n\Mock as Mock;
use \Venus\lib\I18n\Gettext as Gettext;
use \Venus\lib\I18n\Translator as Translator;

/**
 * This class manage the Translation
 *
 * @category    lib
 * @author      Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright   Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license     https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version     Release: 1.0.0
 * @filesource  https://github.com/las93/venus
 * @link        https://github.com/las93
 * @since       1.0
 */

class I18n {
	
	/**
	 * the translation language
	 * @var string
	 */
	
	private $_sLanguage = LANGUAGE;
	
	/**
	 * set the language if you don't want take the default language of the configuration file
	 * 
	 * @access public
	 * @param  string $sLanguage
	 * @return \Venus\lib\I18n
	 */
	
	public function setLanguage($sLanguage) {
		
		$this->_sLanguage = $sLanguage;
		return $this;
	}
	
    /**
     * get a translation
     *
     * @access public
     * @param  string $sName name of the Cookie
     * @param  mixed $mValue value of this sesion var
     * @return \Venus\lib\Cookie
     */

    public function _($sValue) {

    	if (!function_exists("gettext")) {
    		
    		if (!Gettext::isConfigurated()) { Gettext::setConfig(LANGUAGE, I18N_DOMAIN, I18N_DIRECTORY); }	
    		
    		return Gettext::_($sValue);
    	}
    	if (file_exists(I18N_DIRECTORY.LANGUAGE.DIRECTORY_SEPARATOR.'LC_MESSAGES'.DIRECTORY_SEPARATOR.I18N_DOMAIN.'.txt')) {
    		
    		if (!Translator::isConfigurated()) { 
    			
    			Translator::setConfig(I18N_DIRECTORY.LANGUAGE.DIRECTORY_SEPARATOR.'LC_MESSAGES'.DIRECTORY_SEPARATOR.I18N_DOMAIN.'.json');
    		}	
    		
    		return Translator::_($sValue);
    	}
    	else {
    		
    		return Mock::_($sValue);
    	}
    }
}
