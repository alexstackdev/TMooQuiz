<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends Admin_Controller {
    function __construct() {    	
        parent::__construct();
    }

    public function index(){
    	if ($this->mcode->admin_logged_in()) {
    		$this->data['category'] = $this->db->query("SELECT * FROM category")->result();
    		//print_r($this->data['category']);
    		$this->render('admin/category_view');
    	} else {
    		redirect('login','refresh');
    	}
    }

    public function create(){
    	if ($this->mcode->admin_logged_in()) {    		
    		$this->render('admin/category_create');
    	} else {
    		redirect('login','refresh');
    	}
    }

    public function insert(){
    	if ($this->mcode->admin_logged_in()) {    		
    		$cat = $this->input->post('cat_name');
	    	$cat_slug = url_title($this->mcode->stripUnicode(strtolower($cat)));
	    	$data = array(
	    		"category"  =>	$cat,
	    		"cat_slug"	=>	$cat_slug
	    		);
	    	if ($this->db->insert("category",$data)) {
	    		redirect('admin/category');
	    	}
    	} else {
    		redirect('login','refresh');
    	}
    	
    }

    public function edit($id){
    	if ($this->mcode->admin_logged_in()) {
    		$this->data['cat'] = $this->db->query("SELECT * FROM category WHERE category_id = $id")->row_array();
    		//print_r($this->data['cat']);
    		$this->render('admin/category_edit');
    	} else {
    		redirect('login','refresh');
    	}
    }

    public function update(){
    	if ($this->mcode->admin_logged_in()) {
    		$id = $this->input->post('id');
    		$cat = $this->input->post('cat_name');
    		$cat_slug = url_title($this->mcode->stripUnicode(strtolower($cat)));
    		$data = array(
    			"category"	=> $cat,
    			"cat_slug"	=> $cat_slug
    			);
    		$this->db->where("category_id",$id);
    		if ($this->db->update('category',$data)) {
	            redirect('admin/category');
	        }
    	} else {
    		redirect('login','refresh');
    	}
    }

    public function delete($id){
    	if ($this->mcode->admin_logged_in()) {
    		$this->db->where("category_id", $id)->delete("category");
    		redirect('admin/category');
    	} else {
    		redirect('login','refresh');
    	}
    }
}