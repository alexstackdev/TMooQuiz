<?php $this->load->view('layout_web/include/header'); ?>
<script>$('body').addClass('body-category');</script>
<div id="wrapper">
	<header>	
		<?php $this->load->view('layout_web/include/nav_category_view'); ?>
	</header>
	<div id="page-wrapper">
		<div class="container-fluid">
			<h1 class="title page-header"><span>Danh sách đề thi</span></h1>
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-quiz" role="tablist">
					  <li class="active"><a href="#top-view" role="tab" data-toggle="tab" class=""><i class="fa fa-bar-chart"></i> Top View</a></li>
					  <li><a href="#new" role="tab" data-toggle="tab" class=""><i class="fa fa-rss"></i> Mới nhất</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
					  <div class="tab-pane active" id="top-view">
					  	<?php if ($quiz_view == null) { ?>
							<div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
						<?php }
							else { ?>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php foreach ($quiz_view as $key => $item): ?>

										<?php if ($key % 2 == 0): ?>
											<div class="quiz-item" id="item-view<?php echo $item->quiz_id;?>" data-url="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
								  				<a class="quiz-title"  href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html?mixed=false" >
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
							  						<i class="fa fa-clock-o"></i> Ngày tạo: <?php echo  date('H:i:s d/m/Y',strtotime($item->created)); ?>
							  					</div>
								  				<div class="quiz-description">
								  					<span><i class="fa fa-sticky-note" style="color: #e74c3c;"></i> Mô tả: <?php echo $item->note; ?></span>
								  				</div>
								  				<div class="meta-setting">
								  					<i class="fa fa-cog"></i> Thiết lập: <input type="checkbox" name="" id="mixed<?php echo $item->quiz_id; ?>" onclick="mixed_qs(<?php echo $item->quiz_id; ?>)"> Đảo câu hỏi
								  				</div>
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php foreach ($quiz_view as $key => $item): ?>
										<?php if ($key % 2 != 0): ?>
											<div class="quiz-item" id="item-view<?php echo $item->quiz_id;?>" data-url="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
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
								  					<i class="fa fa-cog"></i> Thiết lập: <input type="checkbox" name="" id="mixed<?php echo $item->quiz_id; ?>" onclick="mixed_qs(<?php echo $item->quiz_id; ?>)"> Đảo câu hỏi
								  				</div>
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
							<?php						  		
						  	}
					  	 ?>
					  </div>
					  <div class="tab-pane" id="new">
					  	<?php if ($quiz_new == null) { ?>
							<div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
						<?php }
							else { ?>
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
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
						  		
						  	<?php 
						  	}
					  	 ?>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// đảo câu hỏi
function mixed_qs($id) {
	$check = $('#mixed'+$id+'').prop('checked');
	$url = $('#item-view'+$id+'').attr('data-url');
	if ($check) {
		$url1 = $url+'?mixed=true';
		$('#item-view'+$id+' a').attr('href',$url1);
	} else {
		$url2 = $url+'?mixed=false';
		$('#item-view'+$id+' a').attr('href',$url2);
	}
}
function mixed_qs1($id) {
	$check1 = $('#mixed-new'+$id+'').prop('checked');
	$url = $('#item-new'+$id+'').attr('data-url');
	if ($check1) {
		$url1 = $url+'?mixed=true';
		$('#item-new'+$id+' a').attr('href',$url1);
	} else {
		$url2 = $url+'?mixed=false';
		$('#item-new'+$id+' a').attr('href',$url2);
	}
}
</script>