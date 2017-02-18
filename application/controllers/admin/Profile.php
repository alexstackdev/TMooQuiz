<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $user_id = $this->session->user_id;
            $this->data['quiz'] = $this->db->query("SELECT Count(quiz_id) as total_quiz, SUM(viewed) as total_view FROM quiz WHERE user_id = $user_id")->row_array();
            $this->data['user'] = $this->db->query("SELECT * FROM user WHERE user_id = $user_id ")->row_array();
            $this->render('admin/profile_view');
        }
        else
        {
            redirect('login','refresh');
        }  
    }

    public function change_pass(){
        $old_pass = $this->input->post('old_pass');
        $new_pass = $this->input->post('new_pass');
        $user_id  = $this->session->user_id;
        $pass = $this->session->password;
        if (md5($old_pass) == $pass) {
            $data = array(
                "password"  => md5($new_pass)
                );
            $this->db->where('user_id',$user_id);
            if ($this->db->update('user',$data)) {
                echo 1;
            }
            else {
                echo 2;
            }
        } else {
            echo 0;
        }        
    }

    public function change_info(){
        $new_name = $this->input->post('new_name');
        $new_gmail = $this->input->post('new_gmail');
        $new_fb = $this->input->post('new_fb');
        $user_id = $this->session->user_id;
        $data = array(
            "fullname"  =>  $new_name,
            "fb"    =>  $new_fb,
            "gmail" =>  $new_gmail
            );
        $this->db->where('user_id',$user_id);
        if ($this->db->update('user',$data)) {
            echo 1;
        } else {
            echo 2;
        }
        
    }
}
