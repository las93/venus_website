<?php

/**
 * Controller to test
 *
 * @category  	src
 * @package   	src\Website\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Website\Controller;

use \Venus\src\Website\common\Controller as Controller;

/**
 * Controller to test
 *
 * @category  	src
 * @package   	src\Website\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Home extends Controller {

	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */

	public function __construct() {

		parent::__construct();
	}

	/**
	 * the main page
	 *
	 * @access public
	 * @return void
	 */

	public function show() {

		echo "Hello World";

	}
}