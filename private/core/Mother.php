<?php

/**
 * Mother Manager
 *
 * @category  	core
 * @package   	core\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\core;

use \Venus\lib\PhpDoc as PhpDoc;

/**
 * The Mother Manager
 *
 * @category  	core
 * @package   	core\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Mother implements \ArrayAccess {

	/**
	 * containts the closures
	 * @var array
	 */

	private $_aClosures = array();

	/**
	 * containts data type
	 * @var array
	 */

	private $_aDataType = array();

	/**
	 * containts datas
	 * @var array
	 */

	protected $_aData = array();

	private $_aFilterVar = array(
		'int' => FILTER_VALIDATE_INT,
		'integer' => FILTER_VALIDATE_INT,
		'bool' => FILTER_VALIDATE_BOOLEAN,
		'boolean' => FILTER_VALIDATE_BOOLEAN,
		'float' => FILTER_VALIDATE_FLOAT,
		'decimal' => FILTER_VALIDATE_FLOAT,
		'string' => null,
		'email' => FILTER_VALIDATE_EMAIL,
		'ip' => FILTER_VALIDATE_IP,
		'url' => FILTER_VALIDATE_URL,
		'regexp' => FILTER_VALIDATE_REGEXP,
	);

	/**
	 * get a property
	 *
	 * @access public
	 * @param  unknown_type $mKey
	 * @return void
	 */

	public function __get($mKey) {

		if (isset($this->_aDataType[$mKey])) {

			if (!is_callable($data = $this->_aDataType[$mKey][$mKey]) || (is_string($data) && function_exists($data))) {

				return $data;
			}
			else {

				$context = 'context' !== $mKey ? $this->context : null;
				$dataStore = &$this->_aDataType[$mKey];
				$dataStore[$mKey] = call_user_func($data, $context);
				return $dataStore[$mKey];
			}
		}
		else {

			return null;
		}
	}

	/**
	 * set a property
	 *
	 * @access public
	 * @param  unknown_type $mKey
	 * @return void
	 */

	public function __set($mKey, $mValue) {

		if (is_callable($mValue) && !is_string($mValue)) {

			$this->_aClosures[$mKey] = $mValue;
			$this->_aDataType[$mKey] = &$this->_aClosures;
		}
		else {

			$this->_aData[$mKey] = $mValue;
			$this->_aDataType[$mKey] = &$this->_aData;
		}
	}

	/**
	 * unset a property
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return void
	 */

	public function __unset($mKey) {

		if ($this->__isset($mKey)) {

			unset($this->_aDataType[$mKey][$mKey]);
			unset($this->_aDataType[$mKey]);
		}
	}

	/**
	 * test existance of property
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return void
	 */

	public function __isset($mKey) {

		return isset($this->_aDataType[$mKey]);
	}

	/**
	 * if offsetExists of \ArrayAccess
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return mixed
	 */

	function offsetExists($offset) {

		return $this->__isset($offset);
	}

	/**
	 * if offsetGet of \ArrayAccess
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return mixed
	 */

	public function offsetGet($offset) {

		return $this->__get($offset);
	}

	/**
	 * if offsetSet of \ArrayAccess
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return void
	 */

	public function offsetSet($offset, $mValue) {

		$this->__set($offset, $mValue);
	}

	/**
	 * if offsetUnset of \ArrayAccess
	 *
	 * @access public
	 * @param  mixed $mKey
	 * @return void
	 */

	public function offsetUnset($offset) {

		$this->__unset($offset);
	}

	/**
	 * magic method call when the method call not exists (or it's protected)
	 *
	 * @access public
	 * @param  string $sName
	 * @param  array $aArguments
	 * @return
	 */

	public function __call($sName, $aArguments) {

		if (method_exists($this, $sName)) {

			$aPhpDoc = PhpDoc::getPhpDocOfMethod(get_called_class(), $sName);
			$aParam = array();

			if (isset($aPhpDoc['param'])) {
				
				foreach ($aPhpDoc['param'] as $iIndex => $aOne) {
	
					if (!filter_var($aArguments[$iIndex], $this->_aFilterVar[$aOne[0]])) {
	
						new Exception($aOne[1].' must be '.$aOne[0]);
					}
				}
			}
		}
	}
}
