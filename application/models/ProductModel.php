<?php

class ProductModel extends CI_Model {
    
	public function viewProduct($limit, $offset)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
                          ->join('tbl_category', 'tbl_product.catId = tbl_category.catId')
				          ->join('tbl_subCategory', 'tbl_product.subCatId = tbl_subCategory.subCatId')
						  ->order_by('productId', "desc")
						  ->limit($limit, $offset)
                          ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function viewProductByID($productId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
                          ->join('tbl_category', 'tbl_product.catId = tbl_category.catId')
				          ->join('tbl_subCategory', 'tbl_product.subCatId = tbl_subCategory.subCatId')
						  ->where(['productId'=>$productId])
                          ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function featurePro()
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->order_by('productId', "desc")
						  ->limit(4)
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function relatedProduct($subCatId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->where(['subCatId'=>$subCatId])
						  ->order_by('productId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function specialtPro($limit, $offset)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->where(['type'=>2])
						  ->limit($limit, $offset)
						  ->order_by('productId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function latestPro($limit, $offset)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->order_by('productId', "desc")
						  ->limit($limit, $offset)
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
	public function numRowsSpclOffer()
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->where(['type'=>2])
						  ->order_by('productId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->num_rows();
		}else{
		    return false;
		}
	}
	public function numRows()
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->order_by('productId', "desc")
						  ->get();
		if( $query )
		{
		    return $query->num_rows();
		}else{
		    return false;
		}
	}
	
	public function storeProduct($data)
	{    
		return $this->db->insert('tbl_product', $data);	
	}
	
	public function productById($productId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->where(['productId'=>$productId])
						  ->get();
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
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
	public function getInfo($productId)
	{
		$query = $this->db->select('*')
                          ->from('tbl_product')
						  ->where(['productId'=>$productId])
						  ->get();
		if( $query )
		{
		    return $query->row();
		}else{
		    return false;
		}
	}
	
	public function dataWithImage($productId, $data)
	{   $delquery = $this->db->select('image')
                          ->from('tbl_product')
						  ->where(['productId'=>$productId])
						  ->get();
		$delimage = $delquery->row('image');
		unlink($delimage);
		$query = $this->db->where('productId', $productId)
						  ->update('tbl_product', $data);
		if( $query )
		{
		    return true;
		}else{
		    return false;
		}
	}
	public function dataWithOutImage($productId, $data)
	{
		$query = $this->db->where('productId', $productId)
						  ->update('tbl_product',$data);
		if( $query )
		{
		    return true;
		}else{
		    return false;
		}
	}
	public function deleteById($productId)
	{
		$delquery = $this->db->select('image')
                          ->from('tbl_product')
						  ->where(['productId'=>$productId])
						  ->get();
		$delimage = $delquery->row('image');
		unlink($delimage);
		return $this->db->delete('tbl_product', ['productId'=>$productId]);	
	}
	public function search_result_count($searchkey)
	{ 
		    $query = $this->db->from('tbl_product')
						      ->like('productName', $searchkey)
						      ->get();
		
		if( $query )
		{
		    return $query->num_rows();
		}else{
		    return false;
		}
	}
	public function searchPro($limit, $offset, $searchkey)
	{ 
		    $query = $this->db->from('tbl_product')
						      ->like('productName', $searchkey)
						      ->order_by('productId', "desc")
						      ->limit($limit, $offset)
						      ->get();
		
		if( $query )
		{
		    return $query->result();
		}else{
		    return false;
		}
	}
}
