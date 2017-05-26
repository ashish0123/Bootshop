<?php


class MY_Controller extends CI_Controller {
     public function __construct()
	 {
      parent::__construct();
	    if($this->session->userdata('login') != true || !$this->session->userdata('admin_id') || !$this->session->userdata('admin_name'))
		{
		return redirect('Admin');
		} 
	 }
}
