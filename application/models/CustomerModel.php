<?php

class CustomerModel extends CI_Model {
    
	public function customerData($id)
	{
		$query = $this->db->select('*')
                          ->from('tbl_customer')
						  ->where(['id'=>$id])
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function checkUser($email)
	{
		$query = $this->db->select('*')
                          ->from('tbl_customer')
						  ->where(['email'=>$email])
						  ->get();
		if( $query )
		{
		    return $query->row();
		}else{
		    return false;
		}
	}
	public function checkPass($id, $password)
	{
		$query = $this->db->select('*')
                          ->from('tbl_customer')
						  ->where(['id'=>$id])
						  ->where(['password'=>$password])
						  ->get();
		if( $query )
		{
		    return $query->row();
		}else{
		    return false;
		}
	}
	public function changePass($id, $nPass)
	{
		$query = $this->db->where('id', $id)
						  ->update('tbl_customer', $nPass);
		if( $query )
		{
		    return true;
		}else{
		    return false;
		}
	}
	public function registerUser($data)
	{    
		return $this->db->insert('tbl_customer', $data);	
	}
	public function updateCustomerData($id, $data)
	{
		$query = $this->db->where('id', $id)
						  ->update('tbl_customer', $data);
		if( $query )
		{
		    return true;
		}else{
		    return false;
		}
	}
	
}
