<?php

class CatModel extends CI_Model {
    
	public function allCat()
	{
		$query = $this->db->select('*')
		                  ->from('tbl_category')
		                  ->order_by('catId', "asc")
                          ->get();
		if( $query->num_rows() )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function allSubCat()
	{
		$query = $this->db->select('*')
		                  ->from('tbl_subcategory')
		                  ->order_by('subCatId', "desc")
                          ->get();
		if( $query->num_rows() )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
}
