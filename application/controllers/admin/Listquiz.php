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
            
            $config['base_url'] = base_url().'admin/listquiz';
            $config['total_rows'] = $this->db->query("SELECT quiz_id from quiz WHERE user_id = $user_id")->num_rows();
            $config['per_page'] = 20;
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
            $this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,quiz.status,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE user_id = $user_id ORDER BY created DESC limit $limit")->result();
            if ($this->_user['vip'] == 1) {
                return $this->render('admin/quiz/listquiz_vip','vip');
            }
    		$this->render('admin/quiz/listquiz_view');
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
            if ($this->_user['vip'] == 1) {
                return $this->render('admin/quiz/edit_view','vip');
            }
            $this->render('admin/quiz/edit_view');
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
        $check_content = $this->mcode->toQuiz($edit_content_quiz);
        $stt = $this->input->post('stt');
        if ($check_content) {
            $check_quiz = 1;
        }
        else {
            $check_quiz = 2;
            $stt = 2;
        }
        $data = array(
            "category_id"  => $category_id,
            "title"        => $this->mcode->clean($title),
            "note"         => $this->mcode->clean($note),
            "quiz_content" => $this->mcode->clean($edit_content_quiz),
            "check_quiz"   => $check_quiz,
            "status"       => $stt
            );
        $this->db->where('quiz_id',$quiz_id);
        if ($this->db->update('quiz',$data)) {
            $this->cache->delete($quiz_id);
            $device = $this->agent->is_mobile() ? 2 : 1;
            $user = $this->_user;
            $content = $user['fullname'] ." đã chỉnh sửa đề thi ".$this->mcode->clean($title);
            $this->mcode->addHistory(5,$user,$quiz_id,$content,$device);
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