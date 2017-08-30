<script type="text/javascript" src="<?=base_url()?>assets/ckeditor/ckeditor.js"></script>
<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Popup thông báo</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formPopup" data-id="<?php echo $this->session->user_id; ?>" data-url="<?=base_url()?>admin/notification/insertPopup">
                    <div class="form-group">
                        <label>Nội dung Popup</label>
                        <textarea  id="txt_content" class="form-control" rows="5" required="required"></textarea>
                    </div>
                    <button class="btn btn-primary" id="submit_popup"><i class="fa fa-check-square-o"></i> Ok</button>
                    <input type="reset" class="rs hidden" value="">
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-8'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/notif.js"></script>
<script type="text/javascript">
    $(function() {                                      
        if(CKEDITOR.instances['txt_content']) {                     
            CKEDITOR.remove(CKEDITOR.instances['txt_content']);
        }
        CKEDITOR.config.width = 1000;
        CKEDITOR.config.height = 150;
        CKEDITOR.replace('txt_content',{});
    })
</script>