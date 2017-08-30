<div id="page-wrapper" style="background: #f7f7f7;">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Chỉnh sửa đề thi</span></h1>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formEditQuiz" data-url="<?=base_url()?>admin/listquiz/editquiz" data-id="<?php echo $quiz['quiz_id']; ?>" style="margin-bottom: 5em;">
                    <div class="form-group">
                        <label>Tên đề thi</label>
                        <input type="text" class="form-control" id="title_edit_quiz" placeholder="Sửa tên đề thi" value="<?php echo $quiz['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" id="note_edit_quiz" rows="3" placeholder="Sửa mô tả"><?php echo $quiz['note']; ?></textarea>
                    </div>                    
                    <div class="form-group">
                        <label>Chọn chuyên mục</label>
                        <select id="category" class="col-md-6 col-sm-6 col-xs-12">
                            <?php foreach ($cat as $key => $item): ?>
                                <?php if ($item->category_id == $quiz['category_id']): ?>
                                    <option selected="selected"><?php echo $item->category; ?></option>
                                <?php else: ?>
                                    <option ><?php echo $item->category; ?></option>
                                <?php endif ?>
                                
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>          
                        <textarea class="form-control" id="body_edit_quiz" rows="18" placeholder="Nhập các câu hỏi của đề thi. Lưu ý nhập đúng cấu trúc đề !"><?php echo $quiz['quiz_content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select id="status" class="col-md-6 col-sm-6 col-xs-12" style="display: block;float: none !important;height: 30px;">
                            <?php if ($quiz['status'] == 1): ?>
                                <option value="2">Không công khai</option>                 
                                <option value="1" selected>Công khai</option>
                            <?php else: ?>
                                <option value="2" selected>Không công khai</option>                 
                                <option value="1" >Công khai</option>
                            <?php endif ?>                           
                        </select>
                    </div>
                    <button class="btn btn-primary" id="submit_edit_quiz"><i class="fa fa-check-square-o"></i> Lưu</button>
                    <a href="<?=base_url()?>admin/listquiz.html">
                        <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i> Trở về</button>
                    </a>
                    <br><br>
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/edit.js"></script>
