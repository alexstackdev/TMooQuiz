<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin_Controller {
    function __construct() {
        parent::__construct();
        if (!$this->mcode->admin_logged_in()) {
            # code...
            return redirect ('login');
        }
    }


    public function index(){
        if ($this->session->permission != 2) {
            return redirect('admin/dashboard/listquiz');
        }
        
        $user = $this->db->query("SELECT COUNT(user_id) as total_user FROM user")->row_array();
        $vip = $this->db->query("SELECT COUNT(user_id) as total_vip FROM user WHERE vip = 1")->row_array();
        $quiz = $this->db->query("SELECT COUNT(quiz_id) as total_quiz FROM quiz")->row_array();
        $this->data['total'] = array(
            'vip' => $vip['total_vip'],
            'user'  => $user['total_user'],
            'quiz' => $quiz['total_quiz']
        );

        $history_quiz = $this->db->query("SELECT h.*,user.*,quiz.title,quiz.quiz_id,quiz.quiz_slug FROM history_action as h JOIN user ON user.user_id = h.user_id JOIN quiz ON quiz.quiz_id = h.quiz_id WHERE type = 4 OR type = 5 ORDER BY history_id DESC")->result();
        $history_vip = $this->db->query("SELECT h.*,user.* FROM history_action as h JOIN user ON user.user_id = h.user_id WHERE type = 2 OR type = 3 ORDER BY history_id DESC")->result();
        $history_action = $this->db->query("SELECT h.*,user.*,quiz.title,quiz.quiz_id,quiz.quiz_slug FROM history_action as h JOIN user ON user.user_id = h.user_id JOIN quiz ON quiz.quiz_id = h.quiz_id WHERE type = 1  ORDER BY history_id DESC LIMIT 1000")->result();
        $this->data['history_quiz'] = $history_quiz;
        $this->data['history_vip'] = $history_vip;
        $this->data['history_action'] = $history_action;
    	$this->render('admin/dashboard','vip');
    }

    public function listquiz(){
    	$user_id = $this->session->user_id;
    	$this->data['quiz'] = $this->db->query("SELECT quiz.quiz_id,quiz.title,quiz.quiz_slug,quiz.viewed,quiz.created,quiz.status,category.category FROM quiz JOIN category ON quiz.category_id = category.category_id WHERE quiz.user_id = $user_id Order by quiz_id DESC")->result();
    	$this->render('admin/quiz/listquiz_vip','vip');
    }
}