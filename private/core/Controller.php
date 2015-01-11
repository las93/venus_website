<?php

/**
 * Controller Manager
 *
 * @category  	core
 * @package   	core\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	http://www.iscreenway.com/framework/licence.php Tout droit réservé à http://www.iscreenway.com
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\core;

use \Venus\core\Router as Router;
use \Venus\core\Security as Security;
use \Venus\lib\I18n as I18n;
use \Venus\lib\Template as Template;
use \Venus\lib\Form as Form;
use \Venus\lib\Mail as Mail;
use \Venus\lib\Session as Session;
use \Venus\lib\Cookie as Cookie;
use \Venus\core\UrlManager as UrlManager;

/**
 * Controller Manager
 *
 * @category  	core
 * @package   	core\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	http://www.iscreenway.com/framework/licence.php Tout droit réservé à http://www.iscreenway.com
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus
 * @link      	https://github.com/las93
 * @since     	1.0
 */
abstract class Controller extends Mother 
{
	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */
	public function __construct()
	{
		$aClass = explode('\\', get_called_class());
		$sClassName = $aClass[count($aClass) - 1];
		$sNamespaceName = preg_replace('/\\\\'.$sClassName.'$/', '', get_called_class());
		
		if (isset($sClassName)) {

			$sNamespaceBaseName = str_replace('\Controller', '', $sNamespaceName);
			$defaultModel = $sNamespaceBaseName.'\Model\\'.$sClassName;
			$defaultView = str_replace('\\', DIRECTORY_SEPARATOR, str_replace('Venus\\', '\\', $sNamespaceBaseName)).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.$sClassName.'.tpl';
			$defaultLayout = str_replace('\\', DIRECTORY_SEPARATOR, str_replace('Venus\\', '\\', $sNamespaceBaseName)).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR.'Layout.tpl';

			$this->model = function() use ($defaultModel) { return new $defaultModel; };

			$this->view = function() use ($defaultView) { return new Template($defaultView); };

			$this->layout = function() use ($defaultLayout) { return new Template($defaultLayout); };

			$this->layout->assign('model', $defaultView);
		}

		$this->form = function() { return new Form(); };
		$this->security = function() { return new Security(); };
		$this->router = function() { return new Router; };
		$this->mail = function() { return new Mail; };
		$this->session = function() { return new Session; };
		$this->translator = function() { return new I18n; };
		$this->url = function() { return new UrlManager; };
		$this->cookie = function() { return new Cookie; };
	}

	/**
	 * redirection HTTP
	 *
	 * @access public
	 * @param  string $sUrl url for the redirection
	 * @param int $iHttpCode code of the http request
	 * @return void
	 */
	public function redirect($sUrl, $iHttpCode = 301)
	{
		if ($iHttpCode === 301) { header('Status: 301 Moved Permanently', false, 301); }
		else if ($iHttpCode === 302) { header('Status: Moved Temporarily', false, 301); }
		
		header('Location: '.$sUrl);
		exit;
	}

	/**
	 * call an other action as you call action with URL/Cli
	 *
	 * @access public
	 * @param  string $sUri uri for the redirection
	 * @param  array $aParams parameters
	 * @return void
	 */
	public function forward($sUri, $aParams = array())
	{
		$this->router->runByFoward($sUri, $aParams);
	}

	/**
	 * call the 404 Not Found page
	 *
	 * @access public
	 * @return void
	 */
	public function NotFound()
	{
		$$this->router->runHttpErrorPage(404);
	}

	/**
	 * call the 403 Forbidden page
	 *
	 * @access public
	 * @return void
	 */
	public function Forbidden()
	{
		$$this->router->runHttpErrorPage(403);
	}
}
