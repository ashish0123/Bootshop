<?php


class Admin extends CI_Controller {

	public function index()
	{	if($this->session->userdata('login') == true)
		{
			return redirect('Admin/dashboard');
		}
		$this->load->view('admin/admin_login');
	}
	public function login()
	{
		
		if ($this->form_validation->run('admin_login_rules') == FALSE)
		{
			$this->load->view('admin/admin_login');
		}
		else
		{
			$adminUser = $this->input->post('adminUser');
		    $adminPass = md5($this->input->post('adminPass'));
			$this->load->model('LoginModel');
			$data = $this->LoginModel->admin_login_check($adminUser, $adminPass);
			if( $data == TRUE)
			{   
			    $id        = $data->adminId; 
			    $adminName = $data->adminName; 
 
			    $this->session->set_userdata(['admin_id'=>$id, 'login'=>true, 'admin_name'=>$adminName]);   
				return redirect('Admin/dashboard');
				
			} else {
			    $this->session->set_flashdata('login_failed', 'Invalid Credential, Password or Username does not match !!');
			    return redirect('Admin');
			} 
		}
	}
	public function logout()
	{
	    $this->session->unset_userdata('login');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_name');
		return redirect('Admin');   
	}
	public function dashboard()
	{   
	    if($this->session->userdata('login') != true)
		{
	         return redirect('Admin');
		} else {
		     $this->load->view('Admin/dashboard');
		}
	}
}
