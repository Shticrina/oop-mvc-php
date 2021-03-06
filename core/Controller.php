<?php

include('config/Database.php');

class Controller {

  	protected function model($model) {
  		$database = new Database($_ENV["DB_HOST"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"], $_ENV["DB_NAME"]);
		$conn = $database->getConnection();

		if (file_exists('models/' . $model . '.php')) {
		  	require_once 'models/' . $model . '.php';
		  	return new $model($conn);
		} else {
		  	return null;
		}
  	}
  
  	protected function view($name, $data = null) {
		if (file_exists('views/'.$name.'.php')) {
		  	include('views/'.$name.'.php');
		} else {
		  	echo "ERROR: View $view not found!";
		}
  	}
}

?>