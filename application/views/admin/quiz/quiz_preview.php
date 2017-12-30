<div class="quiz col-md-8 col-sm-7 col-xs-12" data-url="<?=base_url()?>index/updateView">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title text-center quiz-title"><i class="fa fa-graduation-cap"></i> <?php echo $qs['title']; ?></h3>
		</div>
		<div class="panel-body content">					
			<ul id="section_section" class="nav nav-tabs" role="tablist"></ul><br>
			<div id="question_question">
				<?php if (isset($error) && $error): ?>
					<?php echo $error; ?>
				<?php endif ?>
			</div>
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
<div class="sidebar-r col-md-4 col-sm-5 hidden-xs">
	
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
<div class="clearfix"></div>
<script>
	var baseUrl = '<?php echo base_url(); ?>';
	var quiz_id = 'preview';
	<?php if (isset($qs['content']) && $qs['content']): ?>
		var quiz = <?php echo json_encode($qs['content']); //print_r($content);?>;
	<?php else: ?>
		var quiz = false;
	<?php endif ?>		
</script>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/quiz-preview.js"></script>