<?php

/**
 * Manage Cache by Memory
 *
 * @category  	lib
 * @package		lib\Cache
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\lib\Cache;

/**
 * This class manage the Cache by Memory
 *
 * @category  	lib
 * @package		lib\Cache
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Memory implements CacheInterface {

    /**
     * A static variable to keep the cache
     * @var array
     */
    
    private static $_aMemories = array();
    
	/**
	 * set a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 * @param  mixed $mValue value of this sesion var
	 * @param  int $iFlag unused
	 * @param  int $iExpire expiration of cache
	 * @return \Venus\lib\Cache\Apc
	 */

	public function set($sName, $mValue, $iFlag = 0, $iExpire = 0) {

		self::$_aMemories[$sName] = $mValue;
		return $this;
	}

	/**
	 * get a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 * @param  int $iFlags flags
	 * @param  int $iTimeout expiration of cache
	 * @return mixed
	 */

	public function get($sName, &$iFlags = null, $iTimeout = 0) {

		return self::$_aMemories[$sName];
	}

	/**
	 * delete a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 * @return true
	 */

	public function delete($sName) {

		unset(self::$_aMemories[$sName]);
		return true;
	}

	/**
	 * flush the cache
	 *
	 * @access public
	 * @return mixed
	 */

	public function flush() {

		return self::$_aMemories = array();
	}
}
