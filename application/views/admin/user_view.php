<div id="page-wrapper">
	<div class="container-fluid">
		<?php if ($userdata['permission'] == 0): ?>
			<h1 class="page-header title"><span>Bạn không có quyền sử dụng chức năng này!</span></h1>
		<?php else: ?>
			<h1 class="page-header title active-title" data-url="<?=base_url()?>admin/manager_user/delete"><span>Quản lý thành viên</span></h1>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Fullname</th>
							<th>Tổng đề thi</th>
							<th>Tổng lượt xem</th>
							<th>Action</th>
						</tr>						
					</thead>
					<tbody>
						<?php foreach ($user as $key => $item): ?>
							<tr id="<?php echo "id-$item->user_id";?>">
								<td><?php echo $item->user_id;?></td>
								<td><?php echo $item->username; ?></td>
								<td>
								<?php  
									if ($item->fb) {
										echo '<a href="'.$item->fb.'" title="Trang cá nhân">'.$item->fullname.'</a>';
									} else {
										echo $item->fullname;
									}									
								?>									
								</td>
								<td>
								<?php 
									if ($userdata['permission'] == 2) {
										echo '<a href="'.base_url().'admin/manager_user/quiz/'.$item->user_id.'">'.$item->total_quiz.'</a>';
									} else {
										echo $item->total_quiz;
									}
								?>									
								</td>
								<td><?php echo $item->total_view; ?></td>
								<td>
									<?php if ($item->permission == 2) {
										echo 'Quản trị viên';
									} else {
										echo '<button type="button" class="btn btn-danger" onclick="delete_user('.$item->user_id.')"><i class="fa fa-trash" ></i> Xóa</button>';
									}?>								
								</td>
							</tr>
						<?php endforeach ?>						
					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
			<div class="pagination-page"><?=$this->pagination->create_links();?></div>
		<?php endif ?>		
	</div>
</div>
<?php $this->mcode->set_li_active('li-5'); ?>
<script>
	function delete_user($id){
	$url = $('h1.active-title').attr('data-url');
	var $check = confirm('Bạn chắc chắn muốn xóa user này không? Nhấn Ok để xóa.');
	$item = $('#id-'+$id+'');
	if ($check) {
		$.ajax({
            url : $url, 
            type : 'POST', 
            // Các dữ liệu
            data : {
            	user_id : $id               
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $item.remove();
            }
        });
	}
}

</script>