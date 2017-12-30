<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    public function baotri(){
        $this->load->view('web/baotri');
    }

    public function index() {
        $this->session->set_userdata('back',current_url());
    	$this->data['quiz_info'] = array(
    		'title'		=>	'TMooQuiz 2.0',
            'description'   => 'Trang chủ',
            'url'       => base_url()
    		);
    	$sql_cat = "select * from category";     

        $this->data['list_category'] = $this->mcode->get_cache_data('list_category',$sql_cat,1);
        $this->view('web/homepage');
    }

    public function category($slug = "")
    {
        $this->session->set_userdata('back',current_url());
        $sql_cat = "select * from category";        

    	$this->data['list_category'] = $this->mcode->get_cache_data('list_category',$sql_cat,1);
    	$this->data['current_id'] = $this->db->query("select category_id,category from category where cat_slug = '$slug'")->row_array();
    	$cat_id = $this->data['current_id']['category_id'];

        $sql_quiz_view = "SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id  WHERE category_id=$cat_id AND quiz.status = 1 ORDER BY viewed DESC";
        $sql_quiz_new = "SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id  WHERE category_id=$cat_id AND quiz.status = 1 ORDER BY quiz_id DESC";

    	$this->data['quiz_view'] = $this->db->query($sql_quiz_view)->result();
    	$this->data['quiz_new'] = $this->db->query($sql_quiz_new)->result();
    	$this->data['quiz_info'] = array(
    		'title'		=> $this->data['current_id']['category'],
            'description'   => 'Danh mục '.$this->data['current_id']['category'],
            'url'       => base_url().'category/'.$slug.'.html'
    		);
    	$this->view('web/category_view');
    }

    

    public function quiz($id = '', $slug = '')
    {
        $this->session->set_userdata('back',current_url());

        if ( ( !$this->agent->is_browser() || $this->agent->is_mobile() ) && !$this->session->user_id) {
            $this->session->set_flashdata('error','Vui lòng đăng nhập tài khoản của bạn !') ;
            return redirect('login','refresh');
        }
        $sql_qs = "SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id JOIN category ON quiz.category_id = category.category_id WHERE quiz_id =' $id  ' AND quiz_slug='$slug' ";
    	$this->data['qs'] = $this->mcode->get_cache_data($id,$sql_qs,0);    	
    	$sql_cat = "select * from category";

        $this->data['list_category'] = $this->mcode->get_cache_data('list_category',$sql_cat,1);
        $content = $this->mcode->toQuiz($this->data['qs']['quiz_content']);
        $check = $this->input->get('mixed');

        if ($check == 'true') {
            foreach ($content as $key => $section) {
                shuffle($section->array_question);
                foreach ($section->array_question as $key => $question) {
                    shuffle($question->array_answer);
                }
            } 
        } else {
            foreach ($content as $key => $section) {
                foreach ($section->array_question as $key => $question) {
                    shuffle($question->array_answer);
                }
            }
        }
        $this->data['content'] = $content;
        $this->data['quiz_info'] = array(
            'title'     =>  $this->data['qs']['title'],
            'description'   => $this->data['qs']['note'],
            'url'       => base_url().'quiz/'.$id.'/'.$slug.'.html',
            'quiz_view' => 1
            );
        $this->load->helper('captcha');
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

        $history_quiz = $this->db->query("SELECT h.*,user.*,quiz.title,quiz.quiz_id,quiz.quiz_slug FROM history_action as h JOIN user ON user.user_id = h.user_id JOIN quiz ON quiz.quiz_id = h.quiz_id WHERE type = 1 AND h.quiz_id = $id ORDER BY history_id DESC LIMIT 5")->result();
        $this->data['history'] = $history_quiz;
    	$this->view('web/quiz_view');
    }

    public function updateView(){
    	$viewed = $this->input->post('viewed');
    	$quiz_id = $this->input->post('quiz_id');
        $viewed = $viewed + 1;
        $data = array(
            "viewed"    => $viewed
            );
        $this->db->where('quiz_id',$quiz_id);
        if ($this->db->update('quiz',$data)) {            
            echo 'Cập nhật thành công !';
        }
        else
        {
            echo 'Đã có lỗi, chỉnh sửa không thành công.';
        }
        if ($this->mcode->admin_logged_in() && $this->_user['permission'] != 2) {
            $user = $this->_user;
            $user_id = $user['user_id'];
            $history = $this->db->query("SELECT created_at FROM history_action WHERE user_id = $user_id and quiz_id = $quiz_id ORDER BY history_id DESC LIMIT 1")->row_array();
            if ($history) {
                $time = time() - $history['created_at'];
                echo $time;
                if ($time < 500) {
                    return $time;
                }
            }
            $device = 1;
            if ($this->agent->is_mobile()) {
                $device = 2;
            }
            
            $content = $user['fullname'];
            $this->mcode->addHistory(1,$user,$quiz_id,$content,$device);            
        }
    }

    public function search(){
        $this->session->set_userdata('back',current_url());
        $sql_cat = "select * from category";        
        $this->data['list_category'] = $this->mcode->get_cache_data('list_category',$sql_cat,1);

        $this->data['current_id'] = -1;
        $this->data['key'] = $this->input->get('s');
        $key = $this->data['key'];        
        if ($key == null) {
            $this->data['result'] = null;
            $key = 'Lỗi tìm kiếm';
        }
        else
        {
            $sql_search = "SELECT * FROM quiz JOIN user ON quiz.user_id=user.user_id JOIN category ON quiz.category_id = category.category_id WHERE ((title LIKE '%$key%') OR user.fullname LIKE '%$key%' OR quiz_id='$key') AND quiz.status = 1 ORDER BY viewed DESC ";
            $this->data['result'] = $this->mcode->get_cache_data($key,$sql_search,1);
        }
        $this->data['quiz_info'] = array(
            'title'     => 'Tìm kiếm : '.$key,
            'description'   => 'Trang tìm kiếm',
            'url'       => base_url().'search.html?s='.$key
            );
        $this->view('web/search_view');

    }

    public function card_view(){        
        $is_use = $this->input->post('is_use');
        $info = array();
        if ($is_use) {
            $info['title'] = 'Vui lòng nâng cấp tài khoản VIP để sử dụng chức năng này !';
        }
        
        $this->load->helper('captcha');
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
        $this->data['info'] = $info;
        $view = $this->load->view('web/vip/nap_tien',$this->data,TRUE);
        $this->output->set_output($view);
    }

    public function card_pay(){
        $access_key = 'fnewf0r83nklp7u7rdgh';

        // nhap gia tri nhu huong dan ben tren
        $secret = 'hzl1p4mkafc366ztjg25b12qtglnww55';
        $type = $this->input->post('lstTelco');
        $pin = $this->input->post('code');
        $serial = $this->input->post('seri');
        $data = "access_key=" . $access_key . "&pin=" . $pin . "&serial=" . $serial . "&type=" . $type;
        $signature = hash_hmac("sha256", $data, $secret);
        $data.= "&signature=" . $signature;
        if (!$type || !$pin || !$serial) {
            return redirect('','refresh');
        }
        $url = 'https://api.1pay.vn/card-charging/v5/topup';
        // open connection
         $ch = curl_init();

         // set the url, number of POST vars, POST data
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

         // execute post
         $result = curl_exec($ch);
         // close connection
         curl_close($ch);
        
         
        /* print_r($result);
         echo json_encode($result);exit;*/
         
         $result = json_decode($result);
         //  if ($this->_user['permission'] == 2) {
         //     $result = array(
         //        "status" => "00",
         //        "amount" => 20000,
         //        "description" => "Giao dịch thành công."
         //     );
         //     $result = (object) $result;
         // }
         if ($result->status == 00) {
             $amount = $result->amount;
             $balance = $this->_user['balance'] + $amount;
             $data = array(
                "balance"   => $balance
             );
             $this->db->where('user_id',$this->_user['user_id']);
             $this->db->update('user',$data);
             $result->description = 'Nạp thẻ thành công !';
             $result->amount = $balance;

             // history
             $device = $this->agent->is_mobile() ? 2 : 1;
             $user = $this->_user;
             $this->mcode->addHistory(3,$user,null,$amount,$device);
             
         }
         $result->amount = number_format($result->amount,0,',','.');
         echo json_encode($result);       
    }

    public function card_error(){
        $amount = $this->input->get('amount');
        $type = $this->input->get('type');
        $request_time = $this->input->get('request_time');
        $serial = $this->input->get('serial');
        $status = $this->input->get('status');
        $trans_ref = $this->input->get('trans_ref');
        $trans_id = $this->input->get('trans_id');
        $data = array(
            'amount'    =>  $amount,
            'type'    =>  $type,
            'request_time'    =>  $request_time,
            'serial'    =>  $serial,
            'status'    =>  $status,
            'trans_ref'    =>  $trans_ref,
            'trans_id'    =>  $trans_id
        );
        print_r($data);
    }

    public function active_vip(){
        $is_active = $this->input->post('is_active');
        $is_form = $this->input->post('is_form');
        $user = $this->mcode->get_data_user();
        $message = array();
        if ($is_active == 1) {            
            $amount = $user['balance'];
            if ($amount < 20000) {
                $message['code'] = '00';
                $message['message'] = 'Số tiền hiện tại của bạn không đủ để nâng cấp VIP !';
                $this->session->set_flashdata('error',$message['message']);
            }
            else {
                if (!$user['vip']) {
                    $time = date('Y:m:d',time()+5184000) ;
                    $data = array(
                        "balance" => $amount - 20000,
                        "vip"   => 1,
                        "vip_date" => $time
                    );
                    $mess = array(
                        "sender_id" => 1,
                        "recepent_id"   => $user['user_id'],
                        "title" => "Nâng cấp tài khoản VIP thành công !",
                        "message"   => "TMooQuiz chúc bạn đạt được kết quả thi cao nhất.<p>Thank you !</p>"
                    );
                    $this->db->insert('message',$mess);
                    $this->db->where('user_id',$user['user_id']);
                    if ($this->db->update('user',$data)) {
                        $message['code'] = '01';
                        $message['url'] = base_url().'admin/profile.html';
                    }
                    $history_content = "nâng cấp tài khoản VIP thành công";
                }
                elseif ($user['vip'] == 1) {
                    $time = date('Y:m:d',strtotime($user['vip_date'])+5184000);
                    $data = array(
                        "balance" => $amount - 20000,
                        "vip_date" => $time
                    );
                    $mess = array(
                        "sender_id" => 1,
                        "recepent_id"   => $user['user_id'],
                        "title" => "Gia hạn tài khoản VIP thành công !",
                        "message"   => "TMooQuiz chúc bạn đạt được kết quả thi cao nhất.<p>Thank you !</p>"
                    );
                    $this->db->insert('message',$mess);
                    $this->db->where('user_id',$user['user_id']);
                    if ($this->db->update('user',$data)) {
                        $message['code'] = '01';
                        $message['url'] = base_url().'admin/profile.html';
                    }
                    $history_content = "gia hạn tài khoản VIP thành công";
                }
                $device = $this->agent->is_mobile() ? 2 : 1;
                $this->mcode->addHistory(2,$user,null,$history_content,$device);
            }
            if ($is_form) {
                return redirect('admin/profile','refresh');
            }
            echo json_encode($message);
        }
    }
}