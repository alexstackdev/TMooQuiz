<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Public_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        if ($this->mcode->admin_logged_in()) {
            redirect('admin', 'refresh');
        }
        $this->data['quiz_info'] = array(
            'title'     =>  'TMooQuiz 2.0',
            'description'   => 'Đăng nhập',
            'url'       => base_url().'login.html'
            );
        $this->view('web/login_view');
    }

    public function get_login(){
    	$username = $this->input->post('username');
    	$pass = $this->input->post('pass');
    	// Các biến chứa code JS về thông báo
    	$load = "<script>location.reload();</script>";
		$show_alert = "<script>$('#formSignin #alert').removeClass('hidden');</script>";
		$hide_alert = "<script>$('#formSignin #alert').addClass('hidden');</script>";
		$success_alert = "<script>$('#formSignin #alert').attr('class', 'alert alert-success');</script>";
    	if ($this->mcode->admin_login($username,$pass)) {
    		echo $show_alert.$success_alert.'Đăng nhập thành công !'.$load;
    	}
    	else
    	{
    		echo $show_alert.'Tài khoản hoặc mật khẩu không đúng ! Vui lòng nhập lại.';
    	}
    }
}
?>