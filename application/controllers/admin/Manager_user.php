<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_user extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $this->data['userdata'] = $this->session->userdata;
            $this->data['user'] = $this->db->query("SELECT user.user_id,username,fullname,permission,fb, Count(quiz_id) as total_quiz , Sum(viewed) as total_view FROM user LEFT JOIN quiz ON user.user_id = quiz.user_id GROUP BY user.user_id ORDER BY total_quiz  DESC ")->result();
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