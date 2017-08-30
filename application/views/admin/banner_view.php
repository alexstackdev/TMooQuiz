<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title" data-url="<?=base_url()?>admin/banner/delete"><span>Danh sách banner quảng cáo</span></h1>
		<?php if ($banner == null) { ?>
			<div class="alert alert-danger">Hiện tại chưa có banner nào !</div>
		<?php }
			else { ?>
	  			<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Chiến dịch</th>
								<th>Ảnh</th>
								<th>Link</th>
								<th>Hết hạn</th>
								<th>Vị trí</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($banner as $key => $item): ?>
							<tr id="<?php echo 'item-'.$item->banner_id; ?>">
								<td><?php echo $item->banner_id; ?></td>
								<td><?php echo $item->title; ?></td>
								<td>
								<?php 
								echo $item->img;
								echo "<p><img class='img-responsive' src='$item->img' style='max-width:200px;max-height:80px;'/></p>";
								?>		
								</td>
								<td><?php echo $item->link; ?></td>
								<td><?php echo date('d/m/Y',strtotime($item->deadline)); ?></td>
								<td>
									<?php $this->mcode->get_position($item->banner_id); ?>
								</td>
								<td>
									<p><a href="<?=base_url()?>admin/banner/edit/<?php echo $item->banner_id; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
		  								<i class="fa fa-edit"></i> Chỉnh sửa
		  								</button>
		  							</a></p>
			  						<p><button type="button" class="btn btn-danger" onclick="delete_banner(<?php echo $item->banner_id ?>)"><i class="fa fa-trash"></i> Xóa</button></p>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="clearfix"></div>
			<?php } ?>
		
        </div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-6'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/banner.js"></script>