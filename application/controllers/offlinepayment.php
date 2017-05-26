<?php

class OfflinePayment extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
       	$this->load->model('ProductModel');
		$this->load->model('CatModel');
	}

	public function index()
	{
	 
	 if( $this->cart->contents() == false)
		{
			$this->session->set_flashdata('no_item', 'Your cart is empty !!');
			return redirect('productsummary');
		} else {
			$catData    = $this->CatModel->allCat();
	        $subCatData = $this->CatModel->allSubCat();
			$this->load->view('public/inc/header',['srchCat'=>$catData]);
			$cusData = $this->ProductModel->customerData($this->session->userdata('user_id'));
			$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData, 'cusData'=>$cusData]);
			$this->load->view('public/offline_payment');
			$this->load->view('public/inc/footer');
		}
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
		redirect('offlinepayment');
	}
}
