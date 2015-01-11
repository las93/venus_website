<?php

/**
 * bootstrap of the demo
 *
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */

error_reporting(E_ALL);
ini_set('display_error', 1);

const PORTAIL = 'Website';

set_include_path(get_include_path().PATH_SEPARATOR.str_replace('public'.DIRECTORY_SEPARATOR.PORTAIL, 'private', __DIR__));

require 'conf/AutoLoad.php';

\Venus\lib\Debug::activateDebug();

$oRouter = new \Venus\core\Router();
$oRouter->run();