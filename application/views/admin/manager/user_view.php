<div id="page-wrapper">
	<div class="container-fluid">
		<?php if ($userdata['permission'] == 0): ?>
			<h1 class="page-header title"><span>Bạn không có quyền sử dụng chức năng này!</span></h1>
		<?php else: ?>
			<h1 class="page-header title active-title" data-url="<?=base_url()?>admin/manager_user/delete"><span>Quản lý thành viên</span></h1>
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover display" id="dataTables-example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Fullname</th>
							<th>Msv</th>
							<th>Lớp</th>
							<th>Khoa</th>
							<th>Balance</th>
							<th>Vip</th>
							<th>Time</th>
							<th>Quiz</th>
							<th>View</th>
							<th>Download</th>
							<th>Action</th>
						</tr>						
					</thead>
					<tbody>
						<?php foreach ($user as $key => $item): ?>
							<tr id="<?php echo "id-$item->user_id";?>">
								<td><a href="<?php echo base_url().'admin/manager_user/user_edit/'.$item->user_id;?>"><?php echo $item->user_id;?></a></td>
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
								<td><?php echo $item->msv; ?></td>
								<td><?php echo $item->class ?></td>
								<td><?php echo $this->mcode->getCate($item->khoa); ?></td>
								<td><?php echo $item->balance; ?></td>
								<td><?php echo $item->vip; ?></td>
								<td><?php echo date('d/m/Y',strtotime($item->vip_date)); ?></td>
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
								<td><?php echo $item->total_download; ?></td>
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