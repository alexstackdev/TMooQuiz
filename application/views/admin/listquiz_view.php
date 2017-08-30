<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title" data-url="<?=base_url()?>admin/listquiz/delete"><span>Danh sách đề thi của tôi</span></h1>
		<?php if ($quiz == null) { ?>
			<div class="alert alert-danger">Bạn chưa có đề thi nào !</div>
		<?php }
			else { ?>
<<<<<<< HEAD
				<div class="row">
					<?php foreach ($quiz as $key => $item): ?>
						<div class="col-md-4 col-sm-6 col-xs-12">
			  				<div class="panel panel-primary">
			  					<div class="panel-heading">
			  						<h3 class="panel-title quiz-title">
										<a href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
											<?php echo $item->title; ?>
											<span class="badge">ID <?php echo $item->quiz_id; ?></span>
										</a>
			  						</h3>
			  						<p><span>Chuyên mục: </span><?php echo $item->category; ?></p>
			  						<p>
										<span>Lượt xem: <?php echo $item->viewed; ?></span>
									</p>
									<p>
										<span>Ngày tạo: <?php echo date('H:i:s d/m/Y',strtotime($item->created)); ?></span>
									</p>
			  					</div>
			  					<div class="panel-footer action">			  						
		  							<a href="<?=base_url()?>admin/listquiz/edit/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
=======
	  			<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên</th>
								<th>Danh mục</th>
								<th>Lượt xem</th>
								<th>Ngày tạo</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($quiz as $key => $item): ?>
							<tr>
								<td><?php echo $item->quiz_id; ?></td>
								<td>
									<a href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html"><?php echo $item->title; ?></a>
								</td>
								<td><?php echo $item->category; ?></td>
								<td><?php echo $item->viewed ?></td>
								<td><?php echo date('d/m/Y',strtotime($item->created)); ?></td>
								<td>
									<a href="<?=base_url()?>admin/listquiz/edit/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
>>>>>>> parent of e250767... update 1
		  								<i class="fa fa-edit"></i> Chỉnh sửa
		  								</button>
		  							</a>
		  							<a href="<?=base_url()?>admin/upload/img/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-success">
		  								<i class="fa fa-upload"></i> Upload ảnh
		  								</button>
		  							</a>
			  						<button type="button" class="btn btn-danger" onclick="delete_quiz(<?php echo $item->quiz_id; ?>)"><i class="fa fa-trash"></i> Xóa</button>
			  					</div>
			  				</div>
			  			</div>
					<?php endforeach ?>
				</div>
			<?php } ?>
		
        </div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-1'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/delete.js"></script>