<?php


class Product extends MY_Controller {

	public function __construct(){ 
	  parent::__construct();
       	$this->load->model('ProductModel');
		$this->load->model('CatModel');
	}
	public function addProduct()
	{	
		$catData    = $this->CatModel->allCat();
		$subCatData = $this->CatModel->allSubCat();
	    $this->load->view('admin/addproducts',['catData'=>$catData, 'subCatData'=>$subCatData]);
	}
	public function insertProduct()
	{
		$config = [
					'upload_path'   =>'./themes/images/products',
					'allowed_types' =>'gif|jpg|jpeg|png',
					'encrypt_name'  => true
		          ];
		$this->load->library('upload', $config);
		
		if ($this->form_validation->run('add_product_rules') && $this->upload->do_upload('image'))
		{
			$post = $this->input->post();
			unset($post['submit']);
			$path = $this->upload->data();
			$image = "themes/images/products/".$path['raw_name'].$path['file_ext'];
			$post['image'] = $image;
			$proData = $this->ProductModel->storeProduct($post);
			$this->_flashAndRedirect( $proData, "Product Added successfully !!", "Product not Added !!");
		}else{
			$image_error = $this->upload->display_errors();
			$catData    = $this->CatModel->allCat();
			$subCatData = $this->CatModel->allSubCat();
			$this->load->view('admin/addproducts',['catData'=>$catData, 'subCatData'=>$subCatData, 'image_error'=>$image_error]);
		}
	}
	public function editProduct($productId)
	{
		$catData    = $this->CatModel->allCat();
		$subCatData = $this->CatModel->allSubCat();
		$proById    = $this->ProductModel->productById($productId);
		$this->load->view('admin/editproduct',['proById'=>$proById, 'catData'=>$catData, 'subCatData'=>$subCatData]);
	}
	public function updateProduct()
	{
		$config = [
					'upload_path'   =>'./themes/images/products',
					'allowed_types' =>'gif|jpg|jpeg|png',
					'encrypt_name'  => true
				  ];
		$this->load->library('upload', $config);
		$post = $this->input->post();
		unset($post['submit']);
		if ($this->form_validation->run('add_product_rules') && $_FILES['image']['name'] )
		{	
			if($this->upload->do_upload('image'))
			{
				$path = $this->upload->data();
				$image = "themes/images/products/".$path['raw_name'].$path['file_ext'];
				$post['image'] = $image;
				if($path['file_name'] == true)
				{
					$dataWimg = $this->ProductModel->dataWithImage($this->input->post('productId'), $post);
					$this->_flashAndRedirect( $dataWimg, "Product Updated successfully !!", "Product not Updated !!");
				}
			  }else{
			     $image_error = $this->upload->display_errors();
				 $catData    = $this->CatModel->allCat();
				 $subCatData = $this->CatModel->allSubCat();
				 $proById    = $this->ProductModel->productById($this->input->post('productId'));
				 $this->load->view('admin/editproduct',['proById'=>$proById, 'catData'=>$catData, 'subCatData'=>$subCatData, 'image_error'=>$image_error]); 
			  }
		}elseif( $this->form_validation->run('add_product_rules') && $_FILES['image']['name']== false ){
			unset($post['image']);
			$dataWOimg = $this->ProductModel->dataWithOutImage($this->input->post('productId'), $post);
			$this->_flashAndRedirect( $dataWOimg, "Product Updated successfully !!", "Product not Updated !!");
		}else{
			$catData    = $this->CatModel->allCat();
			$subCatData = $this->CatModel->allSubCat();
			$proById    = $this->ProductModel->productById($this->input->post('productId'));
			$this->load->view('admin/editproduct',['proById'=>$proById, 'catData'=>$catData, 'subCatData'=>$subCatData]);
		}
	}
	public function deleteProduct($productId)
	{
		$delById = $this->ProductModel->deleteById($productId);
		$this->_flashAndRedirect( $delById, "Product Deleted successfully !!", "Product not Deleted !!");
	}
	private function _flashAndRedirect( $test, $successMsg, $failMsg)
	{
		if($test)
		{
			$this->session->set_flashdata('feedback',$successMsg);
		} else {
			$this->session->set_flashdata('feedback',$failMsg);
		}
		return redirect('Product/viewProduct');
	}
	public function viewProduct()
	{   
		$this->load->library('pagination');
		$config = [
					'base_url'        =>  base_url('Product/viewProduct'),
					'per_page'        =>  5,
					'total_rows'      =>  $this->ProductModel->numRows(),
					
					'full_tag_open'   => "<ul class='pagination'>",
					'full_tag_close'  => "</ul>",
					
					'prev_link'       => '&laquo;',
					'prev_tag_open'   => "<li class='prev'>",
					'prev_tag_close'  => "</li>",
					
					'num_tag_open'    => "<li>",
					'num_tag_close'   => "</li>",
					
					'cur_tag_open'    => "<li class='active'><a href='#'>",
					'cur_tag_close'   => "</a></li>",
					
					'next_link'       => "&raquo;",
					'next_tag_open'   => "<li class='next'>",
					'next_tag_close'  => "</li>",
					
					'first_link'      => "first",
					'first_tag_open'  => "<li>",
					'first_tag_close' => "</li>",
					
					'last_link'       => "last",
					'last_tag_open'   => "<li>",
					'last_tag_close'  => "</li>"
		          ];
		$this->pagination->initialize($config); 
		$data = $this->ProductModel->viewProduct($config['per_page'], $this->uri->segment(3));
	    $this->load->view('admin/viewproducts', ['data'=>$data]);
	}
	
}
