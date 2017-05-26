<?php

class Search extends CI_Controller {

	public function searchQuery()
	{
		$searchkey = $this->input->post('searchkey');
		return redirect("Search/search_result/$searchkey");
	}	
	public function search_result($searchkey)
	{
		$this->load->model('CatModel');
	    $this->load->model('ProductModel');
	    $catData    = $this->CatModel->allCat();
		$this->load->view('public/inc/header',['srchCat'=>$catData]);
		$subCatData = $this->CatModel->allSubCat();
		$this->load->view('public/inc/sidebar', ['catData'=>$catData, 'subCatData'=>$subCatData]);	
		
		
		
		$this->load->library('pagination');
		$config = [
					'base_url'        =>  base_url("search/search_result/$searchkey"),
					'per_page'        =>  6,
					'total_rows'      =>  $this->ProductModel->search_result_count($searchkey),
					'uri_segment'     => 4,
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
		$srchPro = $this->ProductModel->searchPro($config['per_page'], $this->uri->segment(4), $searchkey);
		$this->load->view('public/search_product', ['srchPro'=>$srchPro]);
		
		$this->load->view('public/inc/footer');
	}
	
}
