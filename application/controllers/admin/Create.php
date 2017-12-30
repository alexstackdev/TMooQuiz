<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Create extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    public function index() {
        $this->session->set_userdata('back',current_url());
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
            if ($this->_user['vip'] == 1) {
                return $this->render('admin/quiz/create_view','vip');
            }
    		$this->render('admin/quiz/create_view');
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
        $stt = $this->input->post('stt');
        if ($check_content) {
            $check_quiz = 1;
        }
        else {
            $check_quiz = 2;
            $stt = 2;
        }
        $data = array(
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
            $device = $this->agent->is_mobile() ? 2 : 1;
            $user = $this->_user;
            $content = "tạo quiz ".$this->mcode->clean($title_quiz);
            $this->mcode->addHistory(4,$user,$id,$content,$device);
            echo $success_alert.'Tạo đề thi thành công,<a href="'.base_url().'admin/upload/img/'.$id.'.html" title="Upload ảnh"> nhấn vào đây để upload ảnh!</a>';
        }
        else
        {
            echo 'Đã xảy ra lỗi , vui lòng thử lại.';
        }
         
    }

    public function preview(){ 
        $user_id = $this->input->post('user_id');
        $title_quiz = $this->input->post('title_quiz'); // tên đề
        $body_quiz = $this->input->post('body_quiz'); // các câu hỏi
        
        $content = $this->mcode->toQuiz($this->mcode->clean($body_quiz));
        if ($content) {
            $this->data['qs'] = array(
            "title" => $this->mcode->clean($title_quiz),
            "content"  => $content
            );
        }
        else {
            $this->data['qs'] = array(
            "title" => 'Lỗi cấu trúc'
            );
            $this->data['error'] = 'Cấu trúc đề sai sẽ không hiển thị. Vui lòng xem hướng dẫn và ví dụ !';
        }
        
        $dt = $this->load->view('admin/quiz/quiz_preview',$this->data,TRUE);
        $this->output->set_output($dt); 
        
    }
}
?>