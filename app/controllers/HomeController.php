<?php

class HomeController extends Controller {

  	public function index() {
  		// page given in URL parameter, default page is one
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		  
		// set number of records per page
		$records_per_page = 5;
		  
		// calculate for the query LIMIT clause
		$from_record_num = ($records_per_page * $page) - $records_per_page;

  		$productModel = $this->model('Product');
	    $products = $productModel->listAll($from_record_num, $records_per_page);
	    $this->view('home/productList', ['products' => $products, 'nb_products' => $productModel->countProducts]);

	    /*$item = new stdClass();
        $item->name = 'jon doe mine';
        $items = [$item];
	    $this->view('home/productList', ['items' => $items]);*/
  	}
}

?>