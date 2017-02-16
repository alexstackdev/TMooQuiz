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
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ")->result();
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
            "title"        => $title,
            "note"         => $note,
            "quiz_content" => $edit_content_quiz
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