<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Manager_user extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $this->data['userdata'] = $this->session->userdata;
            $this->data['user'] = $this->db->query("SELECT user.user_id,username,fullname,permission,fb,user.vip,user.vip_date,user.balance,user.msv,user.class,user.khoa, Count(quiz_id) as total_quiz , Sum(viewed) as total_view, Sum(download) as total_download FROM user LEFT JOIN quiz ON user.user_id = quiz.user_id GROUP BY user.user_id")->result();
            $this->render('admin/manager/user_view','vip');
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

    public function quiz($user_id){
        $user = $this->session->permission;
        if ($user == 2 ) {
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,category.category,quiz.download FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ")->result();
            $this->data['user'] = $this->db->query("SELECT fullname FROM user WHERE user_id = $user_id")->row_array();
            $this->render('admin/manager/user_quiz','vip');
        } else {
            redirect('admin/listquiz','refresh');
        }
        
    }

    public function delete_quiz(){
        $quiz_id = $this->input->post('quiz_id');
        $this->db->where("quiz_id", $quiz_id)->delete("quiz");
    }

    public function check_quiz(){
        if ($this->mcode->admin_logged_in()) {
            $this->data['quiz'] = $this->db->query("SELECT quiz_id,title,quiz_slug FROM quiz WHERE check_quiz = 2")->result();
            //print_r($this->data['quiz']);
            $this->render('admin/manager/check_quiz','vip');
        } else {
            redirect('login','refresh');
        }
    }

    public function user_edit($user_id){
        $user = $this->session->permission;
        if ($user == 2 ) {
            $this->session->set_userdata('back',current_url());
            $this->data['user'] = $this->db->query("SELECT * FROM user WHERE user_id = $user_id")->row_array();
            $this->render('admin/manager/user_edit','vip');
        }
        else {
            redirect('admin/listquiz','refresh');
        }
    }

    public function editAction(){
        $data = $this->input->post();
        if ($data) {
            $result = '';
            if ($data['message'] && $data['message_title']) {
               $message = array(
                    "sender_id" =>  $this->session->user_id,
                    "recepent_id"   =>  $data['user_id'],
                    "title" => $data['message_title'],
                    "message"   => $data['message'],
                );
               if ($this->db->insert('message',$message)) {
                   $result = 'Gửi tin nhắn thành công !';
               }
               
            }
            
            unset($data['message_title']);
            unset($data['message']);
            $this->db->where('user_id',$data['user_id']);
            if ($this->db->update('user',$data)) {
                $result .= ' Chỉnh sửa thành công!';
                $this->session->set_flashdata('success',$result);
            } else {
                $this->session->set_flashdata('error','Có lỗi xảy ra!');
            }
            redirect($this->session->back,'refresh');
        }
    }
}