<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Create extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    public function index() {
    	if ($this->mcode->admin_logged_in()) {
            $this->data['cat'] = $this->db->query("SELECT category FROM category")->result();
            $vals = array(
                'word'      => '',
                'img_path' => 'uploads/captcha/',
                'img_url' => base_url().'uploads/captcha/',
                'img_width' => '120',
                'img_height' => 34,
                'expiration' => 720,
                'word_length' => 5,
                'font_size' => 35,
                'img_id' => 'Imageid',
                'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                'colors' => array(
                    'background' => array(235, 235, 235),
                    'border' => array(51, 51, 51),
                    'text' => array(255, 0, 0),
                    'grid' => array(255, 255, 255)
                )
            );  
            $this->data['captcha'] = create_captcha($vals);
    		$this->render('admin/create_view');
    	}
    	else
    	{
    		redirect('login','refresh');
    	} 
        
    }

    public function insert(){
        $user_id = $this->input->post('user_id');
        $title_quiz = $this->input->post('title_quiz'); // tên đề
        $body_quiz = $this->input->post('body_quiz'); // các câu hỏi
        $check_content = $this->mcode->toQuiz($body_quiz);

        $note_quiz = $this->input->post('note_quiz'); // mô tả
        $category = $this->input->post('category'); // tên chuyên mục
        $slug_quiz = url_title($this->mcode->stripUnicode(strtolower($this->mcode->clean($title_quiz)))); // tạo slug theo tên đề
        $cat_id = $this->db->query("SELECT category_id FROM category WHERE category = '$category' ")->row_array(); // lấy category_id
        $time = date('Y-m-d H:i:s');
        $success_alert = "<script>$('#formCreateQuiz .alert').attr('class', 'alert alert-success');</script>";
        $stt = $this->input->post('status');
        if ($check_content) {
            $check_quiz = 1;
        }
        else {
            $check_quiz = 2;
            $stt = 2;
        }
        $data = array(
            "quiz_id" => "",
            "category_id" => $cat_id['category_id'],
            "user_id" => $user_id,
            "title" => $this->mcode->clean($title_quiz),
            "note" => $this->mcode->clean($note_quiz),
            "quiz_content"  => $this->mcode->clean($body_quiz),
            "created" => $time,
            "viewed" => 0,
            "quiz_slug" =>  $slug_quiz,
            "check_quiz" => $check_quiz,
            "status"    => $stt
            );

        if ($this->db->insert("quiz",$data)) {
            $id = $this->db->insert_id();
            echo $success_alert.'Tạo đề thi thành công,<a href="'.base_url().'admin/upload/img/'.$id.'.html" title="Upload ảnh"> nhấn vào đây để upload ảnh!</a>';
        }
        else
        {
            echo 'Đã xảy ra lỗi , vui lòng thử lại.';
        }
         
    }
}
?>