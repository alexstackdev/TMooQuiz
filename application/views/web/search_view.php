<?php $this->load->view('layout_web/include/header'); ?>
<script>$('body').addClass('body-category');</script>
<div id="wrapper">
	<header>	
		<?php $this->load->view('layout_web/include/nav_category_view'); ?>
	</header>
	<div id="page-wrapper search-view">
		<div class="container-fluid">
			<h1 class="title page-header"><span>Từ khóa tìm kiếm : <?php echo $key; ?></span></h1>
			<div class="row">
				<div class="banner-category-1 text-center" style="margin-bottom: 1em; ">
							<!-- <script src="//www.adsptp.com/15039-468x60.js"></script> -->
								<?php $this->mcode->get_banner(1); ?>					
						</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
					<?php if ($result == null): ?>
						<div class="alert alert-danger">Không tìm thấy kết quả. Vùi lòng tìm từ khóa khác !</div>				
					<?php else: ?>
						<div class="alert alert-info"><?php echo 'Có '.count($result).' kết quả tìm kiếm'; ?></div>
						<div class="col-md-6 col-sm-6 col-xs-12">
									<?php foreach ($result as $key => $item): ?>
										<?php if ($key % 2 == 0): ?>
											<div class="quiz-item">
								  				<a class="quiz-title" href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
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
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<?php foreach ($result as $key => $item): ?>
										<?php if ($key % 2 != 0): ?>
											<div class="quiz-item">
								  				<a class="quiz-title" href="<?=base_url()?>quiz/<?php echo $item->quiz_id.'/'.$item->quiz_slug ?>.html">
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
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>
					<?php endif ?>					
				</div>
			</div>
		</div>
	</div>
</div>