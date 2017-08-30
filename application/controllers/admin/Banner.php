<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Banner extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
    	if ($this->mcode->admin_logged_in()) {
    		$this->data['banner'] = $this->db->query("SELECT * FROM banner")->result();
    		$this->render('admin/banner/banner_view');
    	} else {
    		redirect('login','refresh');
    	}
    	
    }

    public function create(){
    	if ($this->session->permission == 2) {
    		$this->render('admin/banner/banner_create');
    	} else {
    		redirect('admin/listquiz','refresh');
    	}    	
    }

    public function insert(){
    	$banner_title = $this->input->post('banner_title');
    	$link_img = $this->input->post('link_img');
    	$link_banner = $this->input->post('link_banner');
    	$deadline = $this->input->post('deadline');
    	$position = $this->input->post('position');
    	$success_alert = "<script>$('#formCreateBanner .alert').attr('class', 'alert alert-success');</script>";
    	$data = array(
    		"banner_id"	=>	"",
    		"title"		=>	$banner_title,
    		"img"		=>	$link_img,
    		"link"		=>	$link_banner,
    		"deadline"	=>	$deadline
    		);
    	
    	if ($this->db->insert("banner",$data)) {
    		$id = $this->db->insert_id();
    		foreach ($position as $key => $val) {
    			$arr = array(
    				"banner_id"	=>	$id,
    				"banner_position"	=> $val
    				);
    			$this->db->insert("position",$arr);
    		}
    		echo $success_alert.'Tạo banner thành công';
    		sleep(2);

    	} else {
    		echo 'Cõ lỗi xảy ra , vui lòng thử lại !';
    	}
    	
    }

    public function edit($id){
    	if ($this->session->permission == 2) {
    		$this->data['banner'] = $this->db->query("SELECT * FROM banner WHERE banner_id = $id")->row_array();
    		$this->data['position'] = $this->db->query("SELECT banner_position FROM position WHERE banner_id = $id")->result();
    		$this->render('admin/banner/banner_edit');
    	} else {
    		redirect('admin/listquiz','refresh');
    	} 
    }

    public function postEdit(){
    	$id = $this->input->post('id');
    	$banner_title = $this->input->post('banner_title');
    	$link_img = $this->input->post('link_img');
    	$link_banner = $this->input->post('link_banner');
    	$deadline = $this->input->post('deadline');
    	$position = $this->input->post('position');
    	$success_alert = "<script>$('#formEditBanner .alert').attr('class', 'alert alert-success');</script>";
    	$data = array(
    		"title"		=>	$banner_title,
    		"img"		=>	$link_img,
    		"link"		=>	$link_banner,
    		"deadline"	=>	$deadline
    		);
        
    	$this->db->where('banner_id',$id);
    	if ($this->db->update('banner',$data)) {
            $this->db->where("banner_id", $id)->delete("position");
            foreach ($position as $key => $val) {
                $arr = array(
                    "banner_id" =>  $id,
                    "banner_position"   => $val
                    );
                $this->db->insert("position",$arr);
            }
            echo $success_alert.'Chỉnh sửa thành công !';
        }
        else
        {
            echo 'Đã có lỗi, chỉnh sửa không thành công.';
        }
    }

    public function delete(){
        $banner_id = $this->input->post('id');
        $this->db->where("banner_id", $banner_id)->delete("banner");
        $this->db->where("banner_id", $banner_id)->delete("position");
    }
}