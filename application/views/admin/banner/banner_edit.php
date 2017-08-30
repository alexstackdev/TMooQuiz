<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Chỉnh sửa banner</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" onsubmit="return false;" id="formEditBanner" data-id="<?php echo $banner['banner_id']; ?>" data-url="<?=base_url()?>admin/banner/postEdit">
                    <div class="form-group">
                        <label>Tên chiến dịch</label>
                        <input type="text" class="form-control" id="title_banner" placeholder="Nhập tên chiến dịch" value="<?php echo $banner['title']; ?>">
                    </div>
                    <div class="form-group">
                        <label>link ảnh</label>
                        <input type="text" name="" id="link_img" class="form-control" required="required" value="<?php echo $banner['img']; ?>">
                    </div>
                    <div class="form-group">
                        <label>link gốc</label>
                        <input type="text" name="" id="link_banner" class="form-control" required="required" value="<?php echo $banner['link'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Ngày hết hạn</label>
                        <div class="form-group">
                            <input type="date" name="" id="deadline" class="form-control"  required="required" value="<?php echo date('Y-m-d',strtotime($banner['deadline'])); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Vị trí banner</label>
                        
                        <?php for ($i = 1 ; $i <= 10; $i++): ?>
                            <label class="checkbox-inline">
                              <input type="checkbox" class="position" id="<?php echo 'checkbox-'.$i; ?>" value="<?php echo $i; ?>" 
                                <?php foreach ($position as $key => $val): ?>
                                    <?php if ($val->banner_position == $i): ?>
                                        checked
                                    <?php endif ?>
                                <?php endforeach ?>
                              > <?php echo $i; ?>
                            </label>
                        <?php endfor ?>
                    </div>
                    <button class="btn btn-primary" id="submit_edit_banner"><i class="fa fa-check-square-o"></i> Sửa</button>
                    <a href="<?=base_url()?>admin/banner/list.html">
                        <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i> Trở về</button>
                    </a>
                    <input type="reset" class="rs hidden" value="">
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/banner.js"></script>