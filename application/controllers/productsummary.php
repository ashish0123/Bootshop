<?php

class ProductSummary extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
      $this->load->model('CatModel');
	  $this->load->model('ProductModel');
  }

	public function index()
	{
		$catData    = $this->CatModel->allCat();
	    $subCatData = $this->CatModel->allSubCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
		$this->load->view('public/product_summary');
		$this->load->view('public/inc/footer');
	}
	public function add()
	{
		$getinfo = $this->ProductModel->getInfo($this->input->post('productId'));
		$insert = array(
		          'id'    => $this->input->post('productId'),
				  'qty'   => 1,
				  'price' => $getinfo->price,
				  'name'  => $getinfo->productName
		          );
		$insert['options'] = array(
		                      'image' => $getinfo->image
		                    );
		$this->cart->insert($insert);
		redirect('main');
		
	}
	public function remove($rowid)
	{
		$this->cart->update(array(
				'rowid' => $rowid,
				'qty' => 0
		            ));
		redirect('productsummary');
	}
	public function update()
	{
		$rowid = $this->input->post('rowid');
		$qty   = $this->input->post('qty');
		$this->cart->update(array(
				'rowid' => $rowid,
				'qty' => $qty
		            ));
		redirect('productsummary');
	}
}
