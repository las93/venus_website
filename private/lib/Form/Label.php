<?php

/**
 * Manage Form
 *
 * @category  	lib
 * @package		lib\Form
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\lib\Form;

/**
 * This class manage the Form
 *
 * @category  	lib
 * @package		lib\Form
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Label extends Common {

	/**
	 * the label of element
	 *
	 * @access private
	 * @var    string
	 */

	private $_sLabel = null;
	
	/**
	 * the value of element
	 *
	 * @access private
	 * @var    string
	 */

	public function __construct($sLabel) {

		$this->setLabel($sLabel);
	}

	/**
	 * get the Label
	 *
	 * @access public
	 * @return string
	 */

	public function getLabel() {

		return $this->_sLabel;
	}

	/**
	 * set the Label
	 *
	 * @access public
	 * @param  string $sLabel Label of input;
	 * @return \Venus\lib\Form\Input
	 */

	public function setLabel($sLabel) {

		$this->_sLabel = $sLabel;
		return $this;
	}

	/**
	 * get the <html>
	 *
	 * @access public
	 * @return string
	 */

	public function fetch() {

		$sContent = '<label>'.$this->getLabel().'</label> ';

		return $sContent;
	}
}
