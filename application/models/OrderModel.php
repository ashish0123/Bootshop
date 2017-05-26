<?php

class OrderModel extends CI_Model {
    
	public function orderData($custId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_order')
						  ->where(['custId'=>$custId])
						  ->where(['status'=>'pending'])
						  ->or_where(['status'=>'processing'])
						  ->order_by('custId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function deliverData($custId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_order')
						  ->where(['custId'=>$custId, 'status'=>'delivered'])
						  ->order_by('custId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function insertOrderData($data)
	{    
		return $this->db->insert('tbl_order', $data);	
	}
	public function cancelOrder($id)
	{    
		return $this->db->delete('tbl_order', ['id'=>$id]);	
	}
}
