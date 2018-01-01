<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Tạo danh mục mới</span></h1>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form method="POST" action="<?=base_url()?>admin/category/insert" id="formCreateCategory" data-id="<?php echo $this->session->user_id; ?>">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label>Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="class icon">
                    </div>
                    <button class="btn btn-primary" id="submit_create_category"><i class="fa fa-check-square-o"></i> Ok</button>
                    <input type="reset" class="rs hidden" value="">
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-9'); ?>