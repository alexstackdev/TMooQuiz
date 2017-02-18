<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Tạo đề thi mới</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formCreateQuiz" data-id="<?php echo $this->session->user_id; ?>" data-url="<?=base_url()?>admin/create/insert">
                    <div class="form-group">
                        <label>Tên đề thi</label>
                        <input type="text" class="form-control" id="title_create_quiz" placeholder="Nhập tên đề thi">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" id="note_create_quiz" rows="3" placeholder="Mô tả ngắn đề thi"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn chuyên mục</label>
                        <select id="category" class="col-md-6 col-sm-6 col-xs-12">
                        	<?php foreach ($cat as $key => $item): ?>
                        		<option><?php echo $item->category; ?></option>
                        	<?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <div><a data-toggle="modal" href='#modal-id'>Click để xem hướng dẫn cấu trúc đề</a></div>
                        <textarea class="form-control" id="body_create_quiz" rows="18" placeholder="Nhập các câu hỏi của đề thi. Lưu ý nhập đúng cấu trúc đề !"></textarea>
                    </div>                    
                    <label>Nhập mã Captcha</label>
                    <div class="form-group">                                            
                        <div class="img-captcha pull-left">                        
                            <?php echo $captcha['image'];?>
                        </div>
                        <input type="text" class="form-control input-captcha" id="captcha" autocomplete="off" placeholder="Nhập mã captcha">
                        <input type="hidden"  id="re_captcha" class="show-re-captcha" value="<?=$captcha['word'];?>">
                    </div>
                    <button class="btn btn-primary" id="submit_create_quiz"><i class="fa fa-check-square-o"></i> Ok</button>
                    <input type="reset" class="rs hidden" value="">
                     <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-2'); ?>
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Cấu trúc đề</h4>
            </div>
            <div class="modal-body">
                <p>- Mỗi câu hỏi cách nhau 1 hoặc nhiều dòng.</p>
                <p>- 1 câu hỏi có thể có nhiều đáp án.</p>
                <p>- Đáp án đúng là đáp án có dấu * đằng trước.</p>
                <p>- Nếu chia nhiều phần thì sử dụng : 'Tên phần . Xem ví dụ sau :</p>
                <ul>
                    <li>'Phần A</li>
                    <li>Câu 1 : Nội dung câu hỏi</li>
                    <li>Nội dung đáp án 1</li>
                    <li>*Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>
                </ul>
                <ul>
                    <li>Câu 2 : Nội dung câu hỏi</li>
                    <li>*Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>
                </ul>
                <ul>
                    <li>'Phần B</li>
                    <li>Câu 3 : Nội dung câu hỏi</li>
                    <li>Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>*Nội dung đáp án 3</li>
                </ul>
                <ul>
                    <li>Câu 4 : Nội dung câu hỏi</li>
                    <li>Nội dung đáp án 1</li>
                    <li>Nội dung đáp án 2</li>
                    <li>Nội dung đáp án 3</li>
                    <li>Nội dung đáp án 4</li>                    
                    <li>*Nội dung đáp án 5</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/create.js"></script>