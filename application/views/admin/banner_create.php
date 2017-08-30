<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Tạo banner mới</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formCreateBanner" data-id="<?php echo $this->session->user_id; ?>" data-url="<?=base_url()?>admin/banner/insert">
                    <div class="form-group">
                        <label>Tên chiến dịch</label>
                        <input type="text" class="form-control" id="title_banner" placeholder="Nhập tên chiến dịch">
                    </div>
                    <div class="form-group">
                        <label>link ảnh</label>
                        <input type="text" name="" id="link_img" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label>link gốc</label>
                        <input type="text" name="" id="link_banner" class="form-control" required="required" >
                    </div>
                    <div class="form-group">
                        <label>Ngày hết hạn</label>
                        <div class="form-group">
                            <input type="date" name="" id="deadline" class="form-control" value="" required="required" title="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Vị trí banner</label>
                        
                        <?php for ($i = 1 ; $i <= 10; $i++): ?>
                            <label class="checkbox-inline">
                              <input type="checkbox" class="position" id="<?php echo 'checkbox-'.$i; ?>" value="<?php echo $i; ?>"> <?php echo $i; ?>
                            </label>
                        <?php endfor ?>
                    </div>
                    <button class="btn btn-primary" id="submit_create_banner"><i class="fa fa-check-square-o"></i> Ok</button>
                    <input type="reset" class="rs hidden" value="">
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-7'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/banner.js"></script>