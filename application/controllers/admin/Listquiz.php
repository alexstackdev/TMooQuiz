<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Listquiz extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
    	if ($this->mcode->admin_logged_in()) {
            $user_id = $this->session->user_id;
            //$this->data['user'] = $this->db->query("SELECT * FROM user WHERE user_id = $user_id ")->row_array();
<<<<<<< HEAD
<<<<<<< HEAD
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ")->result();
=======
            
            $config['base_url'] = base_url().'admin/listquiz';
            $config['total_rows'] = $this->db->query("SELECT quiz_id from quiz WHERE user_id = $user_id")->num_rows();
            $config['per_page'] = 10;
            $config['use_page_numbers'] = true;
            $config['suffix'] = '.html';
            $config['first_url'] = site_url('admin/listquiz');
            $config['first_link'] = 'Trang đầu';
            $config['last_link'] = 'Trang cuối';
            $config['num_links'] = 2;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
            $start = $page*$config['per_page']-$config['per_page'];
            $limit = $start.",".$config['per_page'];
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ORDER BY created DESC limit $limit")->result();
>>>>>>> parent of e250767... update 1
=======
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ")->result();
>>>>>>> 0544d08624215e5c9df6cf396d7964e4df326234
    		$this->render('admin/listquiz_view');
    	}
    	else
    	{
    		redirect('login','refresh');
    	}        
    }

    public function edit($id=''){
        if ($this->mcode->admin_logged_in()) {
            $this->data['cat'] = $this->db->query("SELECT * FROM category")->result();
            $this->data['quiz'] = $this->db->query("SELECT * FROM quiz WHERE quiz_id = $id ")->row_array();
            $this->render('admin/edit_view');
        }
        else
        {
            redirect('login','refresh');
        } 
    }

    public function editquiz(){
        $quiz_id = $this->input->post('quiz_id');
        $category = $this->input->post('category');
        $edit_content_quiz = $this->input->post('content_quiz');
        $cat = $this->db->query("SELECT category_id FROM category WHERE category='$category'")->row_array();
        $category_id = $cat['category_id'];
        $title = $this->input->post('title');
        $note = $this->input->post('note');
        $success_alert = "<script>$('#formEditQuiz .alert').attr('class', 'alert alert-success');</script>";
        $data = array(
            "category_id"  => $category_id,
            "title"        => $this->mcode->clean($title),
            "note"         => $this->mcode->clean($note),
            "quiz_content" => $this->mcode->clean($edit_content_quiz)
            );
        $this->db->where('quiz_id',$quiz_id);
        if ($this->db->update('quiz',$data)) {
            echo $success_alert.'Chỉnh sửa thành công !';
        }
        else
        {
            echo 'Đã có lỗi, chỉnh sửa không thành công.';
        }
    }

    public function delete(){
        $quiz_id = $this->input->post('quiz_id');
        $this->db->where("quiz_id", $quiz_id)->delete("quiz");
    }
}
?>