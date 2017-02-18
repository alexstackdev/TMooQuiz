<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends Public_Controller {

    function __construct() {
        parent::__construct();
    }
    public function index() {
    	$this->data['quiz_info'] = array(
    		'title'		=>	'TMooQuiz 2.0',
            'description'   => 'Trang chủ',
            'url'       => base_url()
    		);
    	$this->data['list_category'] = $this->db->query("select * from category")->result();      
        $this->view('web/homepage');
    }

    public function category($slug = "")
    {
    	$this->data['list_category'] = $this->db->query("select * from category")->result();
    	$this->data['current_id'] = $this->db->query("select category_id,category from category where cat_slug = '$slug'")->row_array();
    	$cat_id = $this->data['current_id']['category_id'];
    	$this->data['quiz_view'] = $this->db->query("SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id WHERE category_id=$cat_id ORDER BY viewed DESC")->result();
    	$this->data['quiz_new'] = $this->db->query("SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id WHERE category_id=$cat_id ORDER BY quiz_id DESC")->result();
    	$this->data['quiz_info'] = array(
    		'title'		=> $this->data['current_id']['category'],
            'description'   => 'Danh mục '.$this->data['current_id']['category'],
            'url'       => base_url().'category/'.$slug.'.html'
    		);
    	$this->view('web/category_view');
    }

    public function quiz($id = '', $slug = '')
    {
    	$this->data['qs'] = $this->db->query("SELECT *,quiz.created FROM quiz JOIN user ON quiz.user_id=user.user_id JOIN category ON quiz.category_id = category.category_id WHERE quiz_id =' $id  ' AND quiz_slug='$slug' ")->row_array();    	
    	$this->data['section'] = $this->db->query("SELECT * FROM section WHERE quiz_id='$id' ")->result();
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
    		'title'		=>	$this->data['qs']['title'],
            'description'   => $this->data['qs']['note'],
            'url'       => base_url().'quiz/'.$id.'/'.$slug.'.html'
    		);
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
    }

    public function search(){
        $this->data['list_category'] = $this->db->query("select * from category")->result();
        $this->data['current_id'] = -1;
        $this->data['key'] = $this->input->get('s');
        $key = $this->data['key'];        
        if ($key == null) {
            $this->data['result'] = null;
            $key = 'Lỗi tìm kiếm';
        }
        else
        {
            $this->data['result'] = $this->db->query("SELECT * FROM quiz JOIN user ON quiz.user_id=user.user_id JOIN category ON quiz.category_id = category.category_id WHERE (title LIKE '%$key%') OR user.fullname LIKE '%$key%' OR quiz_id='$key' ORDER BY viewed DESC ")->result();
        }
        $this->data['quiz_info'] = array(
            'title'     => 'Tìm kiếm : '.$key,
            'description'   => 'Trang tìm kiếm',
            'url'       => base_url().'search.html?s='.$key
            );
        $this->view('web/search_view');

    }

}