<div class="col-md-6 col-sm-6 col-xs-12">
	<?php foreach ($quiz_new as $key => $item): ?>
		<?php if ($key % 2 == 0): ?>
			<div class="quiz-item" id="item-new<?php echo $item->quiz_id;?>" data-url="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
  				<a class="quiz-title" href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html?mixed=false">
  					<i class="fa fa-book"></i> <?php echo $item->title; ?>
  					<span class="badge">ID <?php echo $item->quiz_id; ?></span>
  				</a>
  				<div class="quiz-meta">
  					<span class="meta-viewed">
  						<i class="fa fa-bar-chart"></i> Lượt thi: <?php echo $item->viewed; ?>
  					</span>
  					<?php if ($item->fb): ?>
  						<span class="meta-user">
	  						<i class="fa fa-user"></i> Người tạo: <a href="<?php echo $item->fb; ?>" target="_blank"><?php echo $item->fullname; ?></a>
	  					</span>
  					<?php else: ?>
  						<span class="meta-user">
	  						<i class="fa fa-user"></i> Người tạo: <?php echo $item->fullname; ?>
	  					</span>
  					<?php endif ?>								  					
  				</div>								  				
					<div class="meta-time">
						<i class="fa fa-clock-o"></i> Ngày tạo: <?php echo date('d/m/Y',strtotime($item->created)); ?>
					</div>
  				<div class="quiz-description">
  					<span><i class="fa fa-sticky-note" style="color: #e74c3c;"></i> Mô tả: <?php echo $item->note; ?></span>
  				</div>
  				<div class="meta-setting">
  					<i class="fa fa-cog"></i> Thiết lập: <input type="checkbox" name="" id="mixed-new<?php echo $item->quiz_id; ?>" onclick="mixed_qs1(<?php echo $item->quiz_id; ?>)"> Đảo câu hỏi
  				</div>
  				<?php if ($this->session->permission == 2): ?>
  					<div class="btn-admin" style="margin-top: 10px;">
  						<a href="<?=base_url()?>admin/listquiz/edit/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
								<i class="fa fa-edit"></i> Chỉnh sửa
								</button>
							</a>
							<a href="<?=base_url()?>admin/upload/img/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-success">
								<i class="fa fa-upload"></i> Upload ảnh
								</button>
							</a>
  						<button type="button" class="btn btn-danger" onclick="delete_quiz(<?php echo $item->quiz_id; ?>,2)"><i class="fa fa-trash"></i> Xóa</button>
  					</div>
  				<?php endif ?>
			</div>
		<?php endif ?>
	<?php endforeach ?>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
	<?php foreach ($quiz_new as $key => $item): ?>
		<?php if ($key % 2 != 0): ?>
			<div class="quiz-item" id="item-new<?php echo $item->quiz_id;?>" data-url="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
  				<a class="quiz-title" href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html?mixed=false">
  					<i class="fa fa-book"></i> <?php echo $item->title; ?>
  					<span class="badge">ID <?php echo $item->quiz_id; ?></span>
  				</a>
  				<div class="quiz-meta">
  					<span class="meta-viewed">
  						<i class="fa fa-bar-chart"></i> Lượt thi: <?php echo $item->viewed; ?>
  					</span>
  					<?php if ($item->fb): ?>
  						<span class="meta-user">
	  						<i class="fa fa-user"></i> Người tạo: <a href="<?php echo $item->fb; ?>" target="_blank"><?php echo $item->fullname; ?></a>
	  					</span>
  					<?php else: ?>
  						<span class="meta-user">
	  						<i class="fa fa-user"></i> Người tạo: <?php echo $item->fullname; ?>
	  					</span>
  					<?php endif ?>								  					
  				</div>								  				
					<div class="meta-time">
						<i class="fa fa-clock-o"></i> Ngày tạo: <?php echo date('d/m/Y',strtotime($item->created)); ?>
					</div>
  				<div class="quiz-description">
  					<span><i class="fa fa-sticky-note" style="color: #e74c3c;" ></i> Mô tả: <?php echo $item->note; ?></span>
  				</div>
  				<div class="meta-setting">
  					<i class="fa fa-cog"></i> Thiết lập: <input type="checkbox" name="" id="mixed-new<?php echo $item->quiz_id; ?>" onclick="mixed_qs1(<?php echo $item->quiz_id; ?>)"> Đảo câu hỏi
  				</div>
  				<?php if ($this->session->permission == 2): ?>
  					<div class="btn-admin" style="margin-top: 10px;">
  						<a href="<?=base_url()?>admin/listquiz/edit/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-primary">
								<i class="fa fa-edit"></i> Chỉnh sửa
								</button>
							</a>
							<a href="<?=base_url()?>admin/upload/img/<?php echo $item->quiz_id.'.html'; ?>" class="edit_quiz"><button type="button" class="btn btn-success">
								<i class="fa fa-upload"></i> Upload ảnh
								</button>
							</a>
  						<button type="button" class="btn btn-danger" onclick="delete_quiz(<?php echo $item->quiz_id; ?>,2)"><i class="fa fa-trash"></i> Xóa</button>
  					</div>
  				<?php endif ?>
			</div>
		<?php endif ?>
	<?php endforeach ?>
</div>