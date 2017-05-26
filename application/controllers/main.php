<?php

class Main extends CI_Controller {

	public function __construct(){ 
	  parent::__construct();
      $this->load->model('CatModel');
	  $this->load->model('ProductModel');
  }

	public function index()
	{
		$catData    = $this->CatModel->allCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$this->load->view('public/inc/slider');
		$subCatData = $this->CatModel->allSubCat();
		$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);


		$fePro = $this->ProductModel->featurePro();
		$this->load->view('public/featured_product', ['fePro'=>$fePro]);

		
		$this->load->library('pagination');
		$config = [
					'base_url'        =>  base_url('main/index'),
					'per_page'        =>  6,
					'total_rows'      =>  $this->ProductModel->numRows(),
					
					'full_tag_open'   => "<ul>",
					'full_tag_close'  => "</ul>",
					
					'prev_link'       => '&laquo;',
					'prev_tag_open'   => "<li>",
					'prev_tag_close'  => "</li>",
					
					'num_tag_open'    => "<li>",
					'num_tag_close'   => "</li>",
					
					'cur_tag_open'    => "<li><a  style='background:#3366FF; color:#FFF;' href='#'>",
					'cur_tag_close'   => "</a></li>",
					
					'next_link'       => "&raquo;",
					'next_tag_open'   => "<li>",
					'next_tag_close'  => "</li>",
					
					'first_link'      => "first",
					'first_tag_open'  => "<li>",
					'first_tag_close' => "</li>",
					
					'last_link'       => "last",
					'last_tag_open'   => "<li>",
					'last_tag_close'  => "</li>"
		          ];
		$this->pagination->initialize($config); 
		$lePro = $this->ProductModel->latestPro($config['per_page'], $this->uri->segment(3));
		$this->load->view('public/latest_product', ['lePro'=>$lePro]);
		
		$this->load->view('public/inc/footer');
	}
	
}
