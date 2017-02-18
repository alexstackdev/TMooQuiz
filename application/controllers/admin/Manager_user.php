<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_user extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $this->data['userdata'] = $this->session->userdata;
            $this->data['user'] = $this->db->query("SELECT * FROM user")->result();
            $this->render('admin/user_view');
        }
        else
        {
            redirect('login','refresh');
        }  
    }

    public function delete(){
        $user_id = $this->input->post('user_id');
        $this->db->where("user_id", $user_id)->delete("user");
        $this->db->where("user_id", $user_id)->delete("quiz");
    }
}