<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    public function index() {
        if ($this->mcode->admin_logged_in()) {
            redirect('admin', 'refresh');
        }
        $this->data['quiz_info'] = array(
    		'title'		=>	'TMooQuiz 2.0',
            'description'   => 'Đăng ký',
            'url'       => base_url().'signup.html'
    		);
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
        $this->view('web/signup_view');
    }

    public function create_user(){
        $user = $this->input->post('username');
        $password = $this->input->post('pass');
        $fullname = $this->input->post('fullname');
        $time = date('Y-m-d H:i:s');
        $level = 0;
        $check_user = $this->db->query("SELECT * FROM user WHERE username ='$user' ")->row_array();
        if ($check_user) {
            echo 'tên tài khoản đã tồn tại';
        }
        else
        {
            $data = array(
            "user_id"   => "",
            "username"  =>  $user,
            "password"  =>  md5($password),
            "fullname"  =>  $fullname,
            "permission"    => $level,
            "created"   =>  $time,
            "fb"        => ""
            );
            if ($this->db->insert('user',$data)) {
                  echo 'Đăng ký thành công! Vui lòng click vào để <a href="'.base_url().'login.html"> Đăng nhập </a>ngay';
              }
        }
        
    }
}
?>