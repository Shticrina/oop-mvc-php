<?php

class App {
	//This class contains controller, method, & params attributes, initialized with default values.
	public $controller = 'HomeController';
	public $method = 'index';
	public $params = [];

	public function __construct() {
		$url = $this->parseURL();
		// var_dump($url);// null

		if (file_exists('app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
			$this->controller = ucfirst($url[0]) . 'Controller';
			unset($url[0]);
		}

		var_dump($this->controller); // ProductController
		require_once 'app/controllers/' . $this->controller . '.php';
		$this->controller = new $this->controller();

		if (isset($url[1])) {
			if (method_exists($this->controller, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : [];
		// var_dump($this->params); // empty

		call_user_func_array([$this->controller, $this->method], $this->params);
	}

	private function parseUrl() {
		if (isset($_GET['url'])) {
			// return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
			return $url = explode($_GET['url']);
		}
	}
}

?>