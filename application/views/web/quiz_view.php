<?php $this->load->view('layout_web/include/header'); ?>
<header>	
	<?php $this->load->view('layout_web/include/nav_quiz_view'); ?>
</header>
<div class="container-fluid">
	<div class="row">
		<!--Sidebar left-->
		<div class="sidebar-left col-md-3 col-sm-3 col-xs-12">
			<div class="panel panel-info quiz-info hidden-xs">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-book"></i> Thông tin đề thi</h3>
				</div>
				<div class="panel-body">
					<p><strong>ID đề thi: </strong><span class="quiz-id label label-primary"><?php echo $qs['quiz_id']; ?></span></p>
					<p><strong>Danh mục: </strong><a href="<?=base_url()?>category/<?php echo $qs['cat_slug']; ?>.html" title="<?php echo $qs['category']; ?>"><?php echo $qs['category']; ?></a></p>
					<p><strong>Người tạo: </strong><span><?php echo $qs['fullname']; ?></span></p>
					<p><strong>Lượt thi: </strong><span class="quiz-viewed"><?php echo $qs['viewed']; ?></span></p>
					<p><strong>Ngày tạo: </strong><span><?php echo date('H:i:s d/m/Y',strtotime($qs['created'])); ?></span></p>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-bar-chart"></i> Thông tin thi</h3>
				</div>
				<div class="panel-body">
					<p><strong>Đã làm: </strong><span id="quiz_choosed">0</span></p>
					<p><strong>Đúng: </strong><span id="quiz_correct">0</span></p>					
					<p><strong>Điểm: </strong><span id="quiz_scores" class="label label-danger">0.00%</span></p>
				</div>
			</div>
		</div>
		<!--Content-->		
		<div class="quiz col-md-6 col-sm-6 col-xs-12" data-url="<?=base_url()?>index/updateView">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title text-center quiz-title"><i class="fa fa-graduation-cap"></i> <?php echo $qs['title']; ?></h3>
				</div>
				<div class="panel-body content">					
					<ul id="section_section" class="nav nav-tabs" role="tablist"></ul><br>
					<div id="question_question"></div>
				</div>
				<div class="panel-footer">
					<div class="control text-center">
						<button type="submit" class="btn btn-primary" id="btn-prev" onclick="return previousQuestion()">
							<i class="fa fa-arrow-left"></i> Trước</button>
						<button type="submit" class="btn btn-primary" id="btn-next" onclick="return nextQuestion()">
							Tiếp <i class="fa fa-arrow-right"></i></button>
					<button class="btn btn-primary visible-xs btn-reAnswer" onclick="return reAnswer()">Làm lại câu sai</button>
					</div>
				</div>
			</div>
		</div>
		<!--Sidebar rigth-->
		<div class="sidebar-r col-md-3 col-sm-3 hidden-xs">
			
			<div class="panel panel-success quiz-span">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-tags"></i> Mục lục câu hỏi</h3>
				</div>
				<div class="panel-body">
					<div id="section_catalog"></div>
				</div>
				<div class="panel-footer text-center">
					<button class="btn btn-primary" onclick="return reAnswer()">Làm lại câu sai</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var quiz_id = <?php echo $qs['quiz_id']; ?>;
	var quiz = <?php echo json_encode($content); //print_r($content);?>;
	$(document).keydown(function(e) {
			if (e.keyCode == '39') {
				$('#btn-next').click();
			}
			if (e.keyCode == '37') {
				$('#btn-prev').click();
			}
	})
</script>
<script type="text/javascript" src="<?=base_url()?>assets/web/js/quiz.js"></script>
<?php $this->load->view('layout_web/include/sound_view'); ?>
