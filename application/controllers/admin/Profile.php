<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
        if ($this->mcode->admin_logged_in()) {
            $user_id = $this->session->user_id;
            $this->data['quiz'] = $this->db->query("SELECT Count(quiz_id) as total_quiz, SUM(viewed) as total_view FROM quiz WHERE user_id = $user_id")->row_array();
            $this->data['user'] = $this->_user;
            $this->data['message'] = $this->db->query("SELECT *,user.fullname,user.fb FROM message JOIN user ON user.user_id = message.sender_id WHERE recepent_id = $user_id ORDER BY id DESC")->result();
            if ($this->_user['vip'] == 1) {
                return $this->render('admin/profile/profile_vip','vip');
            }
            $this->render('admin/profile/profile_view');
        }
        else
        {
            redirect('login','refresh');
        }  
    }

    public function change_pass(){
        $old_pass = $this->input->post('old_pass');
        $new_pass = $this->input->post('new_pass');
        $user_id  = $this->session->user_id;
        $pass = $this->session->password;
        if (md5($old_pass) == $pass) {
            $data = array(
                "password"  => md5($new_pass)
                );
            $this->db->where('user_id',$user_id);
            if ($this->db->update('user',$data)) {
                echo 1;
            }
            else {
                echo 2;
            }
        } else {
            echo 0;
        }        
    }

    public function change_info(){
        $new_name = $this->input->post('new_name');
        $new_gmail = $this->input->post('new_gmail');
        $new_fb = $this->input->post('new_fb');
        $user_id = $this->session->user_id;
        $data = array(
            "fullname"  =>  $new_name,
            "fb"    =>  $new_fb,
            "gmail" =>  $new_gmail
            );
        $this->db->where('user_id',$user_id);
        if ($this->db->update('user',$data)) {
            echo 1;
        } else {
            echo 2;
        }
        
    }

    public function upload_avt(){
        if (isset($_FILES['avt'])) {
            $result = array();
           $avt = $_FILES['avt'];
           if ($avt['error'] > 0) {
               $error = 'Có lỗi xảy ra. Vui lòng thử lại !';
               $result['error'] = $error;
           } else {
                if ($avt['size'] > 524288) {
                   $error = 'Ảnh vượt quá kích thước 500kb. Vui lòng thử lại !';
                   $result['error'] = $error;
                   return;
                } else {
                    $user_id = $this->_user['user_id'];
                    $tmp = $avt['tmp_name'];
                    $path = "uploads/avt/$user_id";
                    $url_avt = $path.'/'.$avt['name'];
                    // nếu thư mục chứa ảnh chưa có thì tạo
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    if (file_exists($this->_user['avatar'])) {
                        unlink($this->_user['avatar']);
                    }                    
                    move_uploaded_file($tmp,$url_avt);
                    $this->db->where('user_id',$user_id)->update('user',array('avatar'=>$url_avt));
                    $result['url_img'] = base_url().$url_avt;
                }
            }
            echo json_encode($result);           
        }
    }

    public function preview(){
        if ($this->input->is_ajax_request()) {
            $user_id = $this->input->post('user_id');
            $user = $this->db->query("SELECT * FROM user WHERE user_id = $user_id")->row_array();
            $this->data['user_preview'] = $user;
            $this->data['quiz'] = $this->db->query("SELECT Count(quiz_id) as total_quiz, SUM(viewed) as total_view FROM quiz WHERE user_id = $user_id")->row_array();
            $view = $this->load->view('admin/profile/preview',$this->data,TRUE);
            $this->output->set_output($view);
        }
    }

    public function message_viewed(){
        $check = $this->input->post('message');
        if ($check) {
            $data = array(
                "viewed"    => 1
            );
            if($this->db->update('message', $data, array('recepent_id' => $this->session->user_id))){
                echo json_encode($data);
            }
        }
    }
}
