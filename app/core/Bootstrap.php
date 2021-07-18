<?php 

namespace App\Core; 

/**
*controller/action/params
*/

class Bootstrap
{

	public function __construct() 
	{
		 if (isset($_GET['page'])) {
		 	$url = filter_var($_GET['page'], FILTER_SANITIZE_URL); 
		 	$url = trim($url); 
		 	$url = explode('/', $url); 
		 	$page = ucfirst(array_shift($url)); 

		 	 if (file_exists(ROOT . "app/controllers/" . $page . ".php")) { 
		 	 	 $class = "App\\Controllers\\" . $page; 
		 	 	 $controller = new $class; 
		 	 	 $action = array_shift($url);
		 	 	 if (method_exists($controller, $action)) { 
		 	 	 	$params = array_values($url);
		 	 	 	if(!emptyempty($params)) { 
		 	 	 	call_user_func_array(array($controller, $action), $params); 
		 	 	 	} else {
		 	 	 		$controller->{$action}(@$url);
		 	 	 	}
		 	 	 } else {
		 	 	 	$controller->index();   
		 	 	 }
		 	} else {
		 		$class = "App\\Core\\Error"; 
		 		$controller = new $class();
		 		$controller->fileNotFound(); 
		 	}

		 } else {
		 	$class = "App\\Controllers\\Index"; 
		 	$controller = new $class(); 
		 	$controller->index(); 
		 }

	}
}