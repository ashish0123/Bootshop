<?php

class Order extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
      $this->load->model('CatModel');
	  $this->load->model('OrderModel');
  }
	public function index()
	{
		if($this->session->userdata('user_login') == false)
		{
			return redirect('user/login');
		}
		$catData    = $this->CatModel->allCat();
	    $subCatData = $this->CatModel->allSubCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$this->load->view('public/inc/sidebar', ['subCatData'=>$subCatData, 'catData'=>$catData]);
		$odrData = $this->OrderModel->orderData($this->session->userdata('user_id'));
		$dlvrData = $this->OrderModel->deliverData($this->session->userdata('user_id'));
		$this->load->view('public/order', ['odrData'=>$odrData, 'dlvrData'=>$dlvrData]);
		$this->load->view('public/inc/footer');
		
	}
	public function completeOrder()
	{
		if($getCart = $this->cart->contents()){
		  foreach($getCart as $Cart){
				$productId = $Cart['id'];
				$productName = $Cart['name'];
				$quantity = $Cart['qty'];
				$price = $Cart['price'] * $quantity;
				  if($this->cart->has_options($Cart['rowid']))
				  foreach ($this->cart->product_options($Cart['rowid']) as $option_name => $option_value){
				$image = $option_value;
				  }
			}
		 } else { return redirect('Order'); }
				$custId = $this->session->userdata('user_id');
		$data = ['custId'=>$custId, 'productId'=>$productId, 'productName'=>$productName, 'quantity'=>$quantity, 'price'=>$price, 'image'=>$image];
		$insrtData = $this->OrderModel->insertOrderData($data);
		if($insrtData)
		{
			$this->remove();
			$this->session->set_flashdata('feedback','Thanks for shopping !!');
		}else{
			$this->session->set_flashdata('feedback','Oops, try again !!');
		}
		return redirect('Order');
	
	}
	public function cancel($id)
	{
		$cnclOdr = $this->OrderModel->cancelOrder($id);
		if($cnclOdr)
		{
			$this->session->set_flashdata('feedback','You canceled one item !!');
		}else{
			$this->session->set_flashdata('feedback','Oops, try again !!');
		}
		return redirect('Order');
	}
	public function remove()
	{
		$this->cart->destroy();
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
