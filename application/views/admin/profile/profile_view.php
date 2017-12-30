<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Thông tin cá nhân</span></h2>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form onsubmit="return false;" method="POST" class="form-horizontal" role="form">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Số đề thi :</label>
                                <div class="col-sm-8 col-md-4">
                                  <p class="form-control-static" id="my-quiz"><?php echo $quiz['total_quiz']; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-4 control-label">Tổng lượt xem :</label>
                                <div class="col-sm-8 col-md-4">
                                  <p class="form-control-static" id="my-view"><?php echo $quiz['total_view']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">                            
                            <div class="form-group">
                                <label for="username" class="col-sm-4 control-label">Tài khoản :</label>
                                <div class="col-sm-8 col-md-4">
                                  <p class="form-control-static"><?php echo $this->session->username; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Mật khẩu :</label>
                                <div class="col-sm-8 col-md-4">
                                    <span class="form-control-static">*********</span>
                                    <a href="javascript:void(0)" id="edit-pass"><i class="fa fa-edit"></i> Đổi mật khẩu</a>
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-sm-4 control-label">Mật khẩu hiện tại :</label>
                                <div class="col-sm-8 col-md-4">
                                  <input type="password" class="form-control" id="old-pass"  placeholder="Nhập mật khẩu hiện tại">
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-sm-4 control-label">Mật khẩu mới :</label>
                                <div class="col-sm-8 col-md-4">
                                  <input type="password" class="form-control" id="new-pass"  placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-sm-4 control-label">Xác nhận đổi mật khẩu :</label>
                                <div class="col-sm-8 col-md-4">
                                  <button type="button" class="btn btn-primary" id="ok-change-pass"><i class="fa fa-check-square-o"></i> Đồng ý</button>
                                  <button type="button" class="btn btn-danger" id="close"><i class="fa fa-times"></i> Hủy</button>
                                </div>
                            </div>
                            <input type="reset" value="Làm mới"  class="reset-form hidden">
                            <div class="alert alert-danger hidden" id="alert-pass" data-url="<?=base_url()?>admin/profile/change_pass"></div>
                            
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="myname" class="col-sm-4 control-label">Tên của bạn :</label>
                                <div class="col-sm-8 col-md-4">
                                  <input type="text" class="form-control" id="myname" value="<?php echo $user['fullname']; ?>" placeholder="Nhập tên bạn">
                                </div>
                            </div>
                            <!-- <div class="form-group balance">
                                <label for="username" class="col-sm-4 control-label">Số tiền :</label>
                                <div class="col-sm-8 col-md-4">
                                    <p class="form-control-static"><?php //echo $data_user['balance'].' VND'; ?> 
                                        <button type="button" class="btn btn-primary showModal" data-url="<?php //base_url()?>index/card_view">Nạp tiền</button>
                                        <button class="btn btn-active-vip" onclick="active_vip()" data-url="http://localhost/TMooQuiz/index/active_vip" data-balance="<?php// echo $user['balance']; ?>">Nâng cấp VIP ngay</button>                                             
                                    </p>
                                </div>                                
                            </div> -->
                            <div class="alert text-center hidden" id="alert-active-vip" style="margin-top: 10px;"></div>
                            <div class="form-group">
                                <label for="my-gmail" class="col-sm-4 control-label">Gmail :</label>
                                <div class="col-sm-8 col-md-4">
                                  <input type="text" class="form-control" id="my-gmail" value="<?php echo $user['gmail']; ?>" placeholder="Nhập gmail của bạn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="my-fb" class="col-sm-4 control-label">Facebook :</label>
                                <div class="col-sm-8 col-md-4">
                                  <input type="text" class="form-control" id="my-fb" value="<?php echo $user['fb']; ?>" placeholder="Nhập link Facebook cá nhân nếu muốn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ok-change" class="col-sm-4 control-label">Xác nhận thay đổi nếu có</label>
                                <div class="col-sm-8 col-md-4">
                                    <button type="button" class="btn btn-primary" id="ok-change"><i class="fa fa-check-square-o"></i> Ok</button>
                                </div>
                            </div>
                            <div class="alert alert-danger hidden" id="alert-change" data-url="<?=base_url()?>admin/profile/change_info"></div>                                 
                        </div>
                    </div>                                     
                </form>
			</div>
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-4'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/profile.js""></script>