<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function quiz(){
    	if ($this->mcode->admin_logged_in()) {
    		$this->render('admin/upload_quiz_view');
    	}
    	else
    	{
    		redirect('login','refresh');
    	}  
    }

    public function img($quiz_id = ''){
    	if ($this->mcode->admin_logged_in()) {
    	$this->data['quiz'] = $this->db->query("SELECT quiz_id,title FROM quiz WHERE quiz_id = $quiz_id")->row_array();
    	$this->data['url_img'] = 'uploads/img/'.$quiz_id;     	
    	$this->render('admin/upload_img_view');	
    	}
    	else
    	{
    		redirect('login','refresh');
    	}  
    }

    public function UploadImg($quiz_id = ''){
    $this->data['quiz'] = $this->db->query("SELECT quiz_id,title FROM quiz WHERE quiz_id = $quiz_id")->row_array(); 	
    	if($this->input->post('upload'))
	    {
	      	// biến thông báo
    		$success_alert = "<script>$('#formUploadImg .alert').attr('class', 'alert alert-success');</script>";
			// nếu ng dùng có chọn ảnh
			if (isset($_FILES['list_img'])) {
				$list_img = $_FILES['list_img'];
				$size = count($list_img['name']);
				$j = 0;
				for ($i=0; $i < $size; $i++) {
					// nếu ảnh có lỗi
					if ($list_img['error'][$i] > 0) {
						echo $list_img['name'][$i].' đã bị lỗi <br>';
						sleep(1);
		                echo "<script>$('#formUploadImg .progress-bar').css('width', '0');$('#percent').html('0');</script>";
					}
					else // nếu ko lỗi
					{
						// nếu là file ảnh thì upload
		            	if ($list_img['type'][$i] == "image/jpeg" ||
		            		$list_img['type'][$i] == "image/jpg" ||
		            		$list_img['type'][$i] == "image/png" ||
		                    $list_img['type'][$i] == "image/bmp")
		            	{
		            		if ($list_img['size'][$i] > 524288) {
		            			echo $list_img['name'][$i].' dung lượng vượt quá 500kb. Vui lòng nén ảnh rồi upload lại! <br>';
								sleep(1);
				                echo "<script>$('#formUploadImg .progress-bar').css('width', '0');$('#percent').html('0');</script>";
		            		} else {
		            			$path_img = 'uploads/img/'.$quiz_id;
						    	// nếu thư mục chứa ảnh chưa có thì tạo
								if (!is_dir($path_img)) {
									mkdir($path_img);
								}
								$url_img = $path_img.'/'.$list_img['name'][$i];
								// Upload file
				                move_uploaded_file($list_img['tmp_name'][$i], $url_img );
				                $j++;
		            		} 		            		
		            	}
					}
				}
				echo $success_alert.'Upload thành công '.$j.' ảnh';
				sleep(2);
                echo "<script>$('#formUploadImg .progress-bar').css('width', '0');$('#percent').html('0');</script>";
			}
			else
			{
				echo 'bạn chưa chọn ảnh';
				sleep(1);
                echo "<script>$('#formUploadImg .progress-bar').css('width', '0');$('#percent').html('0');</script>";
			}
    	}
    } // end function

    public function DeleteImg(){
    	$url_img = $this->input->post('url_img');
    	if (file_exists($url_img)) {
				unlink($url_img);
				echo 'Xóa pest thành công !. Sau 2s sẽ reload.';
			}
			else {
				echo 'Đã xảy ra lỗi';
			}
    }
}