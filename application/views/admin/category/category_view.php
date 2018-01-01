<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title" data-url="<?=base_url()?>admin/category/delete"><span>Danh sách danh mục</span></h1>
		<?php if ($category == null) { ?>
			<div class="alert alert-danger">Hiện tại chưa có danh mục nào !</div>
		<?php }
			else { ?>
				<div class="new-cat" style="margin-bottom: 10px;">
					<a href="<?=base_url()?>admin/category/create.html">
					<button type="button" class="btn btn-success">
		  				<i class="fa fa-fw fa-plus"></i> Thêm mới 								
		  			</button>
		  			</a>
		  		</div>
	  			<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category</th>
								<th>Slug</th>
                                <th>Icon</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($category as $key => $item): ?>
							<tr id="<?php echo 'item-'.$item->category_id; ?>">
								<td><?php echo $item->category_id; ?></td>
								<td><a href="<?php echo base_url().'category/'.$item->cat_slug.'.html'; ?>"><?php echo $item->category; ?></a>
								</td>
								<td>
								<?php
									echo $item->cat_slug;
								?>		
								</td>
                                <td>
                                    <i class="<?php echo $item->icon; ?>"></i>

                                </td>
								<td>
									<span><a href="<?=base_url()?>admin/category/edit/<?php echo $item->category_id; ?>" class="edit_cat"><button type="button" class="btn btn-primary">
		  								<i class="fa fa-edit"></i> Chỉnh sửa
		  								</button>
		  							</a></span>
			  						<span>
			  						<a href="<?=base_url()?>admin/category/delete/<?php echo $item->category_id; ?>">
			  							<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Xóa</button>
			  						</a>			  						
			  						</span>
								</td>
							</tr>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="clearfix"></div>
			<?php } ?>
		
        </div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-9'); ?>