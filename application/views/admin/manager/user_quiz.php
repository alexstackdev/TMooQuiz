<div id="page-wrapper">
	<div class="container-fluid">
		<?php if ($this->session->permission == 0): ?>
			<h1 class="page-header title"><span>Bạn không có quyền sử dụng chức năng này!</span></h1>
		<?php else: ?>
			<h1 class="page-header title active-title" data-url="<?=base_url()?>admin/manager_user/delete_quiz"><span>Quản lý thành viên</span></h1>
			<div class="table-responsive">
				<table width="100%" class="table table-striped table-bordered table-hover display" id="dataTables-example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Quiz name</th>
							<th>Lượt xem</th>
							<th>Lượt download</th>
							<th>Action</th>
						</tr>						
					</thead>
					<tbody>
						<?php foreach ($quiz as $key => $item): ?>
							<tr id="<?php echo "id-$item->quiz_id";?>">
								<td><?php echo $item->quiz_id;?></td>
								
								<td><?php echo '<a href="'.base_url().'quiz/'.$item->quiz_id.'/'.$item->quiz_slug.'.html">'.$item->title.'</a>' ; ?></td>
								<td><?php echo $item->viewed; ?></td>
								<td><?php echo $item->download; ?></td>
								<td>
									<?php
									$url = base_url()."admin/listquiz/edit/$item->quiz_id.html";
									echo '
									<a href="'.$url.'" class="edit_quiz"><button type="button" class="btn btn-primary">
		  								<i class="fa fa-edit"></i> Chỉnh sửa
		  								</button>
		  							</a>
									<button type="button" class="btn btn-danger" onclick="delete_quiz('.$item->quiz_id.')"><i class="fa fa-trash" ></i> Xóa</button>';
									?>								
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
	function delete_quiz($id){
	$url = $('h1.active-title').attr('data-url');
	var $check = confirm('Bạn chắc chắn muốn xóa user này không? Nhấn Ok để xóa.');
	$item = $('#id-'+$id+'');
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

</script>