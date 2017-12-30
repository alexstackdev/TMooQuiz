<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title" data-url="<?=base_url()?>admin/listquiz/delete"><span>Danh sách đề thi của tôi</span></h1>
		<?php if ($quiz == null) { ?>
			<div class="alert alert-danger">Bạn chưa có đề thi nào !</div>
		<?php }
			else { ?>
				<?php if ($this->session->permission == 2): ?>
					<div class="new-cat" style="margin-bottom: 10px;">
						<a href="<?=base_url()?>admin/manager_user/check_quiz.html">
						<button type="button" class="btn btn-success">
			  				Check quiz							
			  			</button>
			  			</a>
			  		</div>
				<?php endif ?>				
	  			<div class="table-responsive">
					<table width="100%" class="table table-striped table-bordered table-hover display" id="dataTables-example">
						<thead>
							<tr>
								<th style="width: 30px;">ID</th>
								<th>Name</th>
								<th style="width: 85px;">Category</th>
								<th style="width: 65px;">Viewed</th>
								<th style="width: 65px;">Created</th>
								<th style="width: 65px;">Status</th>
								<th>Action 1</th>
								<th style="width: 70px;">Action 2</th>
								<th style="width: 70px;">Action 3</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($quiz as $key => $item): ?>
							<tr>
								<td class="center"><?php echo $item->quiz_id; ?></td>
								<td>
									<a href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html"><?php echo $item->title; ?></a>
								</td>
								<td><?php echo $item->category; ?></td>
								<td><?php echo $item->viewed ?></td>
								<td><?php echo date('d/m/Y',strtotime($item->created)); ?></td>
								<td>
									<?php if ($item->status == 1) {
										echo 'Công khai';
									} else {
										echo 'Không công khai';
									}
									 ?>
								</td>
								<td>
									
		  							<a href="<?=base_url()?>admin/upload/img/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-success">
		  								<i class="fa fa-upload"></i> Upload ảnh
		  								</button>
		  							</a>
								</td>
								<td>
									<a href="<?=base_url()?>admin/listquiz/edit/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
		  								<i class="fa fa-edit"></i> Edit
		  								</button>
		  							</a>
								</td>
								<td>									
			  						<button type="button" class="btn btn-danger" onclick="delete_quiz(<?php echo $item->quiz_id; ?>)"><i class="fa fa-trash"></i> Delete</button>
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
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/delete.js"></script>