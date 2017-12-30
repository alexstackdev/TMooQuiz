<?php $this->load->view('layout_web/include/header');?>
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
					<div class="tab-content">
						<div class="banner-category-top text-center" style="margin-bottom: 1em; ">
							<?php if ($data_user['vip'] != 1): ?>
								<?php $this->mcode->get_banner(2); ?>	
							<?php endif ?>											
						</div>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-quiz" role="tablist" data-user="<?=base_url()?>admin/profile/preview">
					  <li class="active"><a href="#top-view" role="tab" data-toggle="tab" class=""><i class="fa fa-bar-chart"></i> Top View</a></li>
					  <li><a href="#new" role="tab" data-toggle="tab" class=""><i class="fa fa-rss"></i> Mới nhất</a></li>
					</ul>

					<!-- Tab panes -->

					  <div class="tab-pane active" id="top-view">
					  	<?php if ($quiz_view == null) { ?>
							<div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
						<?php }
							else { 
								$this->load->view('web/tab_content_view');					  		
						  	}
					  	 ?>
					  </div>
					  <div class="tab-pane" id="new">
					  	<?php if ($quiz_new == null) { ?>
							<div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
						<?php }
							else { 
								$this->load->view('web/tab_content_new');
						  	}
					  	 ?>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="url" data-url="<?=base_url()?>admin/manager_user/delete_quiz"></div>
<script>
	// đảo câu hỏi ở tab 1
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
// đảo câu hỏi tab 2
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
$(function(){	
	$('.baner-footer-4').css('margin-top', '1em');
});
<?php if ($this->session->permission == 2): ?>
	function delete_quiz($id,$type){
		$url = $('.url').attr('data-url');
		var $check = confirm('Bạn chắc chắn muốn xóa quiz này không? Nhấn Ok để xóa.');
		if ($type == 1) {
			$item = $('#item-view'+$id+'');
		}
		else if($type == 2){
			$item = $('#item-new'+$id+'')
		}
		if ($check) {
			$.ajax({
	            url : $url, 
	            type : 'POST', 
	            // Các dữ liệu
	            data : {
	            	quiz_id : $id               
	            // Thực thi khi gửi dữ liệu thành công
	            }, success : function(data) {
	                $item.remove();
	            }
	        });
		}
	}
<?php endif ?>
</script>