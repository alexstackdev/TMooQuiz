<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends Public_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('captcha');
    }
    public function index() {
        if ($this->mcode->admin_logged_in()) {
            return redirect('', 'refresh');
        }
        $this->data['cat'] = $this->db->query("SELECT * FROM category")->result();
        $this->data['quiz_info'] = array(
            'title'     =>  'TMooQuiz 2.0',
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
                'pool' => '123456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ',
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
        $data = $this->input->post();
        if ($data['captcha'] != $data['re_captcha']) {
            $this->session->set_flashdata('error','Captcha không đúng ! Vui lòng thử lại.') ;
            return redirect('signup');
        }
        $user = $data['username'];
        $check_user = $this->db->query("SELECT * FROM user WHERE username ='$user' ")->row_array();
        if ($check_user) {
            $this->session->set_flashdata('error','Tài khoản đã tồn tài ! Vui lòng thử lại.') ;
            return redirect('signup','refresh');
        }
        else
        {
            $data['password'] = md5($data['password']);
            $data['permission'] = 0;
            $data['created'] = date('Y-m-d H:i:s');
            unset($data['captcha']);
            unset($data['re_captcha']);
            if ($this->db->insert('user',$data)) {
                $this->session->set_flashdata('success','Đăng ký tài khoản thành công!') ;
                return redirect('login','refresh');
            }
        }
        
    }
}
?>