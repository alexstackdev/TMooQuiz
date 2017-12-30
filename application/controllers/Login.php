<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Public_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {            
        if ($this->mcode->admin_logged_in()) {
            redirect('admin/listquiz', 'refresh');
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
        $url = $this->session->back;
        if ($this->mcode->admin_login($username,$pass)) {
            $ss_id = session_id();
            $this->db->where('username',$username)->update('user',array('login' => $ss_id));
            if ($url) {
                return redirect($url,'refresh');
            }
            redirect('admin/listquiz','refresh');
    	}
    	else
    	{
    		$this->session->set_flashdata('error','Tài khoản hoặc mật khẩu không đúng ! Vui lòng nhập lại.') ;
            redirect('login','refresh');
    	}
    }
}
?>