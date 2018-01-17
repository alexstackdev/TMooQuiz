<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 1/17/18
 * Time: 6:37 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    /*
    * Get list user
    */
    public function index()
    {
        //gan diều kiện cho câu truy vấn
        $input = array();
        $input['limit'] = array('5', 0);
        $products = $this->user->get_list($input);
        print_r($products);
    }

    /*
     *  Register user
     * */

    public function register(){
        $data = $this->user->setData();
        if(!$data["username"] || !$data['password'] || !$data['fullname']){
            $this->user->errors('Vui lòng nhập đầy đủ thông.',1);
        }
        $user = $this->user->get_info_rule(array("username"=>$data["username"]));
        if($user){
            $this->user->errors('Tài khoản đã tồn tài ! Vui lòng thử lại.',1);
        }else{
            $data['password'] = md5($data['password']);
            $data['permission'] = 0;
            $data['created'] = date('Y-m-d H:i:s');
            if ($this->user->create($data)) {
                $this->data['message'] = array(
                    "success" =>  'Đăng ký tài khoản thành công!'
                );
                $this->render(null,'json');
            }else{
                $this->user->errors('Có lỗi xảy ra. Vui lòng thử lại !',1);
            }
        }
    }

    /*
     * User login
     * */

    public function login(){
        $data = $this->user->setData();
        $username= $data['username'];
        $password= md5($data['password']);
        if(!$username || !$password){
            $this->user->errors('Vui lòng nhập đầy đủ thông.',1);
        }
        $where = array(
          "username" => $username,
          "password" => $password
        );
        $user = $this->user->get_info_rule($where);
        //echo json_encode($user->user_id);die;
        if($user){
            $ss_id = session_id();
            if(!$this->user->update($user->user_id,array("login"=>$ss_id))){
                $this->user->errors('Có lỗi xảy ra. Vui lòng thử lại !',1);
            }
            $this->session->set_userdata((array)$user);
            $this->data['user'] = $user;
            $this->data['message'] = "Đăng nhập thành công!";
            $this->render(null,'json');
        }else{
            $this->user->errors('Tài khoản hoặc mật khẩu không đúng. Vui lòng thử lại',1);
        }
    }

    /*
     *  User Logout
     * */
    public function logout(){
        if($id = $this->session->user_id){
            $this->user->update($id,array("login"=>null));
        }
        $this->session->sess_destroy();
        $this->data['message'] = array(
            "success" =>  'Đăng xuất tài khoản thành công!'
        );
        $this->render(null,'json');
    }
}
?>