<?php
namespace app\core;
class App {
	function __construct() {
		//this is where we want to route the request to the appropriate classes methods
		//we wish to route requests to /controller/method
		$request = $this ->parseUrl($_GET['url'] ?? '');
		
		//	var_dump(request);

		//defaults
		$controller = 'main';
		$method = 'index';
		$params = [];

		//is the requested controller in the controllers folder?
		if (file_exists('app/controllers' . $request[0] . '.php')) {
			echo "the $request[0] controller exists";

			$controller = $request[0];
		//	$controller = new main();
			
			//ToDO: remove the $request[0] element
			unset($request[0]);
		}
		$controller = 'app\\controllers\\' . $controller;
		$controller = new $controller;

		if (isset($request[1] && method_exists($controller, $request[1])) {
			$method = $request[1];
			//ToDo: remove $request[1]
			unset($request[1]);
		}
		$controller->$method();
	
		$params = array_values($request);

		//call the controller method with parameters
		call_user_func_array([$controller, $method],$params);
		
	}

	function parseUrl($url) {

		return explode('/',trim($url,'/'));
	}
}