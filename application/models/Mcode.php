<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mcode extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    // get_login
    public function admin_login($user,$pass) {
        $username= $user;
        $password=$this->mcode->hash($pass);
        $item=$this->db->query("select * from user where username='$username' and password='$password' ")->row_array();
        if($username==$item['username'] && $password==$item['password']) {        
            $this->session->set_userdata($item);
            return true;
        }
        else {
            return false;
        }
    }
    // check user_admin
    public function admin_logged_in() {
        if($this->session->has_userdata('username') && $this->session->has_userdata('user_id')) {
            return true;
        }
        else {
            return false;
        }
    }
    public function clean($strText) {
        $str=preg_replace('/<script\b[^>]*>(.*)|<\/script>/i', "Vui lòng không sử dụng script", $strText);
        return $str;        
    }
    public function hash($text) {
        $str= md5($text); //vc
        return $str;
    }
    public function stripUnicode($str) {
        if(!$str) return false;
        $str=strip_tags($str);
        $unicode=array('a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ','d' => 'đ','e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ','i' => 'í|ì|ỉ|ĩ|ị','o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ','u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự','y' => 'ý|ỳ|ỷ|ỹ|ỵ','A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ','D' => 'Đ','E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ','I' => 'Í|Ì|Ỉ|Ĩ|Ị','O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ','U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự','Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',);
        foreach($unicode as $nonUnicode => $uni) {
            $str=preg_replace("/($uni)/i",$nonUnicode,$str);
        }
        return $str;
    }
    public function generate_username_from_text($strText) {
        $strText=preg_replace('/[^A-Za-z0-9-]/',' ',$strText);
        $strText=preg_replace('/ +/',' ',$strText);
        $strText=trim($strText);
        $strText=str_replace(' ','',$strText);
        $strText=preg_replace('/-+/','',$strText);
        $strText=preg_replace("/-$/","",$strText);
        return $strText;
    }    
    public function username($strText) {
        return  strtolower($this->generate_username_from_text($this->stripUnicode($strText)));
    }

    public function replace_qs($string){
        $string = str_replace('[CR]','</br>',$string);      
        return $string;
    }

    public function toQuiz($str,$type=false) {        
        $image_format = array('.bmp', '.png', '.jpg', '.gif');
        $audio_format = array('.mp3', '.wav');
        $array_line = preg_split('/(\r\n|\n|\r)/', $str);
        $array_section = array();
        $section = new Section;
        $question = new Question;
        $answer = new Answer;
        $correct = 0;
        foreach ($array_line as $key => $line) {
            $line = trim($line);
            if ($this->startWith($line, 'TITL:')
                || $this->startWith($line, 'COMP:')
                || $this->startWith($line, 'MVER:')
                || $this->startWith($line, 'MODI:')
                || $this->startWith($line, 'TIME:')
                || $this->startWith($line, 'NOTE:')) {
                continue;
            }
            // nếu type = false thì lấy question
            if ($type == false) {
                if (strlen($line) == 0) {
                    if (count($question->array_answer) > 1 && count($question->array_answer) < 9 && $correct == 1) {
                        $section->array_question[] = $question;
                    }
                    $question = new Question;
                    $answer = new Answer;
                    $correct = 0;
                    continue;
                }
                if ($this->startWith($line, "'")) {
                    if (count($question->array_answer) > 1 && count($question->array_answer) < 9 && $correct == 1) {
                        $section->array_question[] = $question;
                    }
                    if (count($section->array_question) > 0) {
                        $array_section[] = $section;
                    }
                    $section = new Section;
                    $question = new Question;
                    $answer = new Answer;
                    $correct = 0;
                    $section->section = substr($line, 1) ? htmlentities(substr($line, 1)) : '';
                    continue;
                }
                if (strlen($question->question) == 0) {
                    for ($i = 0; $i < count($image_format); $i++) {
                        if ((stripos($line, '<') === 0 || stripos($line, '<')) && stripos($line, $image_format[$i] . '>')) {
                            $tmp = substr($line, 0, stripos($line, $image_format[$i] . '>') + strlen($image_format[$i]));
                            $question->image = substr($tmp, strripos($tmp, '<') + 1);
                            $line = str_replace('<' . $question->image . '>', '', $line);
                        }
                    }
                    for ($i = 0; $i < count($audio_format); $i++) {
                        if ((stripos($line, '<') === 0 || stripos($line, '<')) && stripos($line, $audio_format[$i] . '>')) {
                            $tmp = substr($line, 0, stripos($line, $audio_format[$i] . '>') + strlen($audio_format[$i]));
                            $question->audio = substr($tmp, strripos($tmp, '<') + 1);
                            $line = str_replace('<' . $question->audio . '>', '', $line);
                        }
                    }
                    $question->question = $this->replace_qs($line);
                } else {
                    if ($this->startWith($line, '*')) {
                        $correct++;
                        $answer->correct = $correct;
                        $line = substr($line, 1);
                    }
                    $answer->answer = htmlentities($line);
                    $question->array_answer[] = $answer;
                    $answer = new Answer;
                }
            }
            
            
        }
        if ($type == false) {
            if (count($question->array_answer) > 1 && count($question->array_answer) < 9 && $correct == 1) {
                $section->array_question[] = $question;
            }
            if (count($section->array_question) > 0) {
                $array_section[] = $section;
            }
        }
          
        return $array_section;
    }
    public function startWith($haystack, $needle) {
        return $needle === "" || strrpos($haystack, $needle, - strlen($haystack)) !== false;
    }
    public function endsWith($haystack, $needle) {
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }
    /**
     * Hàm in ảnh ra nếu có
     */
    public function get_img($path_img){ 
        // nếu tồn tại thư mục chứa ảnh     
        if (is_dir($path_img)) {
            // lấy ds ảnh trong thư mục
            $list_img = array_filter(glob($path_img.'/*'),'is_file');
            $count_img = count($list_img);
            // in ảnh ra 
            echo '<label>Danh sách ảnh <span class="total-img badge">'.$count_img.'</span></label>';
            echo '<div id="result-img">';
            for ($i=0; $i < $count_img; $i++) {
                $url_img = $list_img[$i];
                $title_img = str_replace(array($path_img,'/'),'',$url_img);
                echo '
                <div class="item col-md-3 col-sm-3 col-xs-4 text-center">
                    <div class="item-img">
                        <img src="'.base_url().$url_img.'" class="img-responsive" alt="">
                    </div>
                    <h5 class="title-img" id="img-'.$i.'">'.$title_img.'</h5>
                    <button class="btn btn-danger" id="delete-img-'.$i.'" onclick="delete_img('.$i.')" >
                        <i class="fa fa-trash"></i></span> Xoá
                    </button>
                </div>';                  
            }
            echo '</div>';
        }
        // nếu ko tồn tại thư mục chứa ảnh
        else {
            echo '<div class="alert alert-danger">Đề thi này chưa có ảnh nào</div>';
        }
    }

    /**
     * hàm active nav
     */
    public function set_li_active($li){
        echo "<script>$('ul.side-nav li').removeClass('active');$('li.$li').addClass('active');</script>";
    }

    /**
     * lấy tổng số đề
     */
    public function count_quiz($user_id,$type = true){
        if ($type) {
            $quiz = $this->db->query("SELECT COUNT(quiz_id) as quiz FROM quiz WHERE user_id = $user_id")->row_array();
            echo $quiz['quiz'];
        } else {
            $viewed = $this->db->query("SELECT SUM(viewed) as quiz_view FROM quiz WHERE user_id = $user_id")->row_array();
            echo $viewed['quiz_view'];
        }
        
    }

} // end class
        class Answer{
            public $answer = '';
            public $correct = 0;
        }

        class Question{
            public $question = '';
            public $image = '';
            public $audio = '';
            public $array_answer = array();
        }

        class Section{
            public $section = '';
            public $content = '';
            public $array_question = array();
        }
        
?>