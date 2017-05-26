<?php

class ProductDetails extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
      $this->load->model('CatModel');
	  $this->load->model('ProductModel');
  }

	public function view($productId)
	{
		$catData    = $this->CatModel->allCat();
	    $subCatData = $this->CatModel->allSubCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
		
		$prodetail  = $this->ProductModel->viewProductByID($productId); 
	    foreach($prodetail as $leResult)
		$relpro  = $this->ProductModel->relatedProduct($leResult->subCatId);
		$this->load->view('public/product_details', ['prodetail'=>$prodetail, 'relproduct'=>$relpro]);
		$this->load->view('public/inc/footer');
	}
	public function add()
	{
		$getinfo = $this->ProductModel->getInfo($this->input->post('productId'));
		$insert = array(
		          'id'    => $this->input->post('productId'),
				  'qty'   => $this->input->post('quantity'),
				  'price' => $getinfo->price,
				  'name'  => $getinfo->productName
		          );
		$insert['options'] = array(
		                      'image' => $getinfo->image
		                    );
		$this->cart->insert($insert);
		redirect('productsummary');
		
	}
	public function addSimilar()
	{
		$getinfo = $this->ProductModel->getInfo($this->input->post('productId'));
		$insert = array(
		          'id'    => $this->input->post('productId'),
				  'qty'   => $this->input->post('quantity'),
				  'price' => $getinfo->price,
				  'name'  => $getinfo->productName
		          );
		$insert['options'] = array(
		                      'image' => $getinfo->image
		                    );
		$this->cart->insert($insert);
		redirect('productdetails/view'.'/'.$this->input->post('productId'));
		
	}
	
}
