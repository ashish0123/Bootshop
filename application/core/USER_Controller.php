<?php


class USER_Controller extends CI_Controller {
     public function __construct()
	 {
      parent::__construct();
	    if($this->session->userdata('login') != true || !$this->session->userdata('user_id') || !$this->session->userdata('user_email'))
		{
		return redirect('user/login');
		} 
	 }
}
