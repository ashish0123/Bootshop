<?php

class LoginModel extends CI_Model {
    
	public function admin_login_check($adminUser, $adminPass)
	{
		$query = $this->db->where( ['adminUser'=>$adminUser, 'adminPass'=>$adminPass] )->get('tbl_admin');
		if( $query->num_rows() == 1 )
		{
		    return $query->row();
		}else{
		    return false;
		}
	}
	public function user_login_check($email, $password)
	{
		$query = $this->db->where( ['email'=>$email, 'password'=>$password] )->get('tbl_customer');
		if( $query->num_rows() == 1 )
		{
		    return $query->row();
		}else{
		    return false;
		}
	}
}
