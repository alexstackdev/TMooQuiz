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
							<tr>
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
								<td><?php $this->mcode->count_quiz($item->user_id); ?></td>
								<td><?php $this->mcode->count_quiz($item->user_id,false); ?></td>
								<td>
									<?php if ($item->permission == 1) {
										echo 'Quản trị viên';
									} else {
										echo '<button type="button" class="btn btn-danger"><i class="fa fa-trash" onclick="delete_user('.$item->user_id.')"></i> Xóa</button>';
									}?>								
								</td>
							</tr>
						<?php endforeach ?>						
					</tbody>
				</table>
			</div>
		<?php endif ?>		
	</div>
</div>
<?php $this->mcode->set_li_active('li-5'); ?>
<script>
	function delete_user($id){
	$url = $('h1.active-title').attr('data-url');
	var $check = confirm('Bạn chắc chắn muốn xóa user này không? Nhấn Ok để xóa.');
	if ($check) {
		$.ajax({
            url : $url, // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
            	user_id : $id               
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {           
                console.log(data);
                location.href = '';
            }
        });
	}
}
</script>