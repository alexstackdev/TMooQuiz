<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_user extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $this->data['userdata'] = $this->session->userdata;
            $config['base_url'] = base_url().'admin/manager_user';
            $config['total_rows'] = $this->db->query("SELECT user_id from user")->num_rows();
            $config['per_page'] = 10;
            $config['use_page_numbers'] = true;
            $config['suffix'] = '.html';
            $config['first_url'] = site_url('admin/manager_user');
            $config['first_link'] = 'Trang đầu';
            $config['last_link'] = 'Trang cuối';
            $config['num_links'] = 2;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $start = $page*$config['per_page']-$config['per_page'];
            $limit = $start.",".$config['per_page'];
            $this->data['user'] = $this->db->query("SELECT user.user_id,username,fullname,permission,fb, Count(quiz_id) as total_quiz , Sum(viewed) as total_view FROM user LEFT JOIN quiz ON user.user_id = quiz.user_id GROUP BY user.user_id ORDER BY total_quiz  DESC limit $limit")->result();
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