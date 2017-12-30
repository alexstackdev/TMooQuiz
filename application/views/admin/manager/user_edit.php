<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Chỉnh sửa User</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
                <?php if ($this->session->error): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> <?php echo $this->session->error; ?>
                    </div>
                <?php endif ?>
                <?php if ($this->session->success): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Title!</strong> <?php echo $this->session->success; ?>
                    </div>
                <?php endif ?>
                
				<form method="POST" action="<?=base_url().'admin/manager_user/editAction'?>" id="formEditUser" >
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="title_banner" placeholder="Nhập tên chiến dịch" value="<?php echo $user['username']; ?>" disable>
                    </div>
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text"  class="form-control"  value="<?php echo $user['fullname']; ?>" disable>
                    </div>
                    <div class="form-group">
                        <input type="text"  class="form-control hidden" name="user_id" value="<?php echo $user['user_id']; ?>" disable>
                    </div>
                    <div class="form-group">
                        <label>Balance</label>
                        <input type="text"  class="form-control" name="balance"  value="<?php echo $user['balance']; ?>" disable>
                    </div>
                    <div class="form-group">
                        <label>Vip</label>
                        <input type="text" name="vip" class="form-control" value="<?php echo $user['vip']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày hết hạn</label>
                        <div class="form-group">
                            <input type="date" name="vip_date" class="form-control"  required="required" value="<?php 
                            if($user['vip_date']){
                                echo date('Y-m-d',strtotime($user['vip_date']));
                            }  else {
                                echo date('Y-m-d');
                            }
                            ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <input type="text" name="message_title" class="form-control" style="margin-bottom: 10px;" placeholder="Message Title">
                        <textarea id="input" name="message" class="form-control" rows="3" placeholder="Nội dung tin nhắn"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Sửa</button>
                    <a href="<?=base_url()?>admin/manager_user.html">
                        <button type="button" class="btn btn-default"><i class="fa fa-arrow-left"></i> Trở về</button>
                    </a>
                    <div class="alert alert-danger hidden"></div>
                </form>
			</div>
		</div>
	</div>
</div>