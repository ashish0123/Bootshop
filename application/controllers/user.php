<?php


class user extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
       	$this->load->model('ProductModel');
		$this->load->model('CatModel');
	}

	public function index()
	{	
	  if($this->session->userdata('user_login') == true)
		{
			return redirect('user/payment');
		} else {
			$catData    = $this->CatModel->allCat();
	        $subCatData = $this->CatModel->allSubCat();
			$this->load->view('public/inc/header',['srchCat'=>$catData]);
			$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
			$this->load->view('public/user_login');
			$this->load->view('public/inc/footer');
		}
	}
	public function login()
	{
		
		if ($this->form_validation->run('user_login_rules') == FALSE)
		{
			$catData    = $this->CatModel->allCat();
	        $subCatData = $this->CatModel->allSubCat();
			$this->load->view('public/inc/header',['srchCat'=>$catData]);
			$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
			$this->load->view('public/user_login');
			$this->load->view('public/inc/footer');
		}
		else
		{
			$email = $this->input->post('email');
		    $password = md5($this->input->post('password'));
			$this->load->model('LoginModel');
			$data = $this->LoginModel->user_login_check($email, $password);
			if( $data == TRUE)
			{   
				if(!empty($this->input->post('remember')))
				{
					setcookie("user", $this->input->post('email'), time() + (10 * 365 * 24 * 60 * 60));
					setcookie("pass", $this->input->post('password'), time() + (10 * 365 * 24 * 60 * 60));
				}
			    $userId = $data->id; 
			    $email  = $data->email; 
 
			    $this->session->set_userdata(['user_id'=>$userId, 'user_login'=>true, 'user_email'=>$email]);   
				return redirect('ProductSummary');
				
			} else {
			    $this->session->set_flashdata('login_failed', 'Invalid Credential, Password or Username does not match !!');
			    return redirect('user');
			} 
		}
	}
	public function register()
	{
		if($this->session->userdata('user_login') == true)
		{
			return redirect('user/payment');
		} else {
			$catData    = $this->CatModel->allCat();
	        $subCatData = $this->CatModel->allSubCat();
			$this->load->view('public/inc/header',['srchCat'=>$catData]);
			$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
			$this->load->view('public/register');
			$this->load->view('public/inc/footer');
		}
	}
	public function addUser()
	{
		if($this->form_validation->run('user_registraion_rules') && $this->input->post('submit') )
		{ 
		    $data = $this->input->post(); 
		    unset($data['submit']);
			$email = $this->input->post('email');
			
			$this->load->model('CustomerModel');
		    $chkuser = $this->CustomerModel->checkUser($email);
			if($chkuser)
			{
				$this->session->set_flashdata('feedback','You already Registered, try Forgot Password');
				return redirect('User/login');
			} else {
				$reguser = $this->CustomerModel->registerUser($data);
				if($reguser)
				{
					$this->session->set_flashdata('feedback','You Registered successfully, Login Now !!');
					return redirect('User/login');
				} else {
					$this->session->set_flashdata('feedback','Something went wrong, try again !!');
					return redirect('User/register');
				}
			}	    
		} else {
			$catData    = $this->CatModel->allCat();
	        $subCatData = $this->CatModel->allSubCat();
			$this->load->view('public/inc/header',['srchCat'=>$catData]);
			$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);
			$this->load->view('public/register');
			$this->load->view('public/inc/footer');
		}
	}
	public function logout()
	{
	    $this->session->unset_userdata('user_login');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_email');
		return redirect('user');   
	}
	public function payment()
	{   
	    if($this->session->userdata('user_login') != true)
		{
	         return redirect('user');
		} else {
			 $catData    = $this->CatModel->allCat();
			 $this->load->view('public/inc/header',['srchCat'=>$catData]);
		     $this->load->view('public/payment');
			 $this->load->view('public/inc/footer');
		}
	}
}
