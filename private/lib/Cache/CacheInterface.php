<?php

/**
 * Interface of all kind of Cache
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
 * Interface of all kind of Cache
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

interface CacheInterface {

	/**
	 * set a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 * @param  mixed $mValue value of this sesion var
	 * @param  int $iFlag flags
	 * @param  int $iExpire expiration of cache
	 */

	public function set($sName, $mValue, $iFlag, $iExpire);

	/**
	 * get a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 * @param  int $iFlags flags
	 * @param  int $iTimeout expiration of cache
	 */

	public function get($sName, &$iFlags = null, $iTimeout = 0);

	/**
	 * delete a value
	 *
	 * @access public
	 * @param  string $sName name of the session
	 */

	public function delete($sName);

	/**
	 * flush the cache
	 *
	 * @access public
	 */

	public function flush();
}
