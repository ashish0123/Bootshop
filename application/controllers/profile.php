<?php


class Profile extends CI_Controller {
	public function __construct(){ 
	  parent::__construct();
		$this->load->model('CatModel');
		$this->load->model('CustomerModel');
	}
	public function index()
	{	
	    if($this->session->userdata('user_login') == false)
		{
			return redirect('user/payment');
		} else {
		$catData    = $this->CatModel->allCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$custData = $this->CustomerModel->customerData($this->session->userdata('user_id'));
		$this->load->view('public/edit_profile', ['custData'=>$custData]);
		$this->load->view('public/inc/footer');
		}
	}
	public function viewProfile()
	{
		if($this->session->userdata('user_login') == false)
		{
			return redirect('user/payment');
		} else {
			$catData    = $this->CatModel->allCat();
		    $this->load->view('public/inc/header',['srchCat'=>$catData]);
			$custData = $this->CustomerModel->customerData($this->session->userdata('user_id'));
			$this->load->view('public/profile', ['custData'=>$custData]);
			$this->load->view('public/inc/footer');
		}
	}
	public function changepass()
	{
		if($this->session->userdata('user_login') == false)
		{
			return redirect('user/payment');
		} else {
			$catData    = $this->CatModel->allCat();
		    $this->load->view('public/inc/header',['srchCat'=>$catData]);
			$this->load->view('public/changeuserpass');
			$this->load->view('public/inc/footer');
		}
	}
	public function password()
	{
		if($this->session->userdata('user_login') == false)
		{
			return redirect('user/payment');
		} else {
			if($this->form_validation->run('change_password_rules') && $this->input->post('password') )
		    { 
					$data = $this->input->post(); 
					unset($data['submit']);
					$password     = md5($this->input->post('password'));
					$newpassword  = $this->input->post('newpassword');
					$new1password = $this->input->post('new1password');
					if($newpassword == $new1password )
					{
						$this->load->model('CustomerModel');
						$chkpass = $this->CustomerModel->checkPass($this->session->userdata('user_id'), $password);
						if($chkpass)
						{
							$newpassword  = md5($this->input->post('newpassword'));
							$newpass = ['password' => $newpassword];
							$chngpass = $this->CustomerModel->changePass($this->session->userdata('user_id'), $newpass);
							$this->session->set_flashdata('feedback','Your Password is changed now !!');
							return redirect('Profile/viewProfile');
						} else {
							$this->session->set_flashdata('feedback','Your Old Password is Incorrect !!');
							return redirect('Profile/changepass');
						}
					} else {
						$this->session->set_flashdata('feedback','Your New Password and Re-Type Password does not match !!');
						return redirect('Profile/changepass');
					}
			 } else {
					$catData    = $this->CatModel->allCat();
		            $this->load->view('public/inc/header',['srchCat'=>$catData]);
					$this->load->view('public/changeuserpass');
					$this->load->view('public/inc/footer');
			 }
	       }
	    }
	public function update()
	{
		if($this->session->userdata('user_login') == false)
		{
			return redirect('user/payment');
		}
		if($this->form_validation->run('customer_profile_rules') && $this->input->post('update'))
		{ 
		    $data = $this->input->post(); 
		    unset($data['update']);	
			$this->load->model('CustomerModel');
		    $updcustData = $this->CustomerModel->updateCustomerData($this->session->userdata('user_id'), $data);
			if($updcustData)
			{
				$this->session->set_flashdata('feedback',"Your profile is updated successfully !!");
			} else {
				$this->session->set_flashdata('feedback',"Oops! something went wrong, try again !!");
			}
			return redirect('Profile');	    
		} else {
			$catData    = $this->CatModel->allCat();
		    $this->load->view('public/inc/header',['srchCat'=>$catData]);
			$custData = $this->CustomerModel->customerData($this->session->userdata('user_id'));
			$this->load->view('public/edit_profile', ['custData'=>$custData]);
			$this->load->view('public/inc/footer');
		}
	}
	
}
