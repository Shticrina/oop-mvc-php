<?php

class ProductController extends Controller {

  	public function detail($product_id) {
	    $product = $this->model('Product')->getProduct($product_id);
	    $this->view('products/show/'.$product_id, ['product' => $product]);
  	}
}

?>