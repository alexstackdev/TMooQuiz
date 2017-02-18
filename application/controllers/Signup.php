<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends Public_Controller {
    function __construct() {
        parent::__construct();
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