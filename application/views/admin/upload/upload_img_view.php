<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title" data-id="<?php echo $quiz['quiz_id']; ?>"><span>Đề thi: <?php echo $quiz['title']; ?></span></h1>
		<div class="upload-img-section">			
            <div class="col-md-6 col-md-offset-3">
	        	<div class="login-form panel panel-primary">
	        		<div class="panel-heading">
	                    <h3><i class="fa fa-upload"></i> Upload Ảnh</h3>
	                </div>				                
	                <div class="panel-body">                		        	
			        	<form method="POST"  action="<?=base_url()?>admin/upload/UploadImg/<?php echo $quiz['quiz_id']; ?>" id="formUploadImg" enctype="multipart/form-data">
							<div class="form-group">
								<label for="myfile">Có thể upload nhiều ảnh cùng 1 lúc</label>
								<input type="file" class="form-control" name="list_img[]" id="myfile" multiple>
							</div>
							<a href="<?=base_url()?>admin/listquiz.html" class="btn btn-default">
			                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
			                </a>
			                <input type="submit" class="btn btn-primary" id="submit_upload_pest" name="upload" value="Upload">
			                <div id="progress-group">
                            <div class="progress progress-striped active">
                                  <div class="progress-bar" id="progressbar" role="progressbar">
                                  </div>
                                  <div class="progress-text" id="percent">0%</div>
                                </div>
                            </div>
                            <div class="alert alert-danger hidden" id="resutl"></div>
			        	</form>
	                </div>
	        	</div>
	        </div>	        
		</div>
		<div class="list-img col-md-12 col-lg-12 col-sm-12 col-xs-12" data-url="<?=base_url()?>admin/upload/DeleteImg"><?php $this->mcode->get_img($url_img); ?></div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/js/ajax-form.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/upload-img.js"></script>