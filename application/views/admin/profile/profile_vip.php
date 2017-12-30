<?php 
$time = (strtotime($data_user['vip_date'])-time())/(60*60*24);
$time = round($time,0)+1;
if ($time < 0) {
    $time = 0;
}
?>
<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header title"><span>Thông tin cá nhân</span></h2>
		<div class="row">
            <?php if (isset($this->session->error)): ?>
                <div class="alert-error" style="margin-bottom: 10px;">
                    <p><i class="fa fa-exclamation-circle"></i> <?php echo $this->session->error; ?></p>
                </div>           
            <?php endif ?>
            <div class="col-md-8 col-sm-6 col-xs-12 pull-right" style="padding: 0;">
                <div class="col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="<?=base_url()?>uploads/2.png" alt="">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $time; ?></div>
                                    <div>Ngày hết hạn</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" onclick="return false;" id="activevip">
                            <div class="panel-footer">
                                <span class="pull-left">Gia hạn VIP</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>                            
                        </a>
                        <form action="<?=base_url()?>index/active_vip" method="POST" class="hidden">
                            <input type="text" name="is_active" value="1" />
                            <input type="text" name="is_form" value="1"/>
                            <input type="submit" name="submit" id="submit_form_vip">
                        </form>
                    </div>            
                </div>
                <div class="col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge balance-panel"><?php echo number_format($data_user['balance'],0,',','.'); ?></div>
                                    <div>VNĐ</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="showModal" data-url="<?=base_url()?>index/card_view">
                            <div class="panel-footer">
                                <span class="pull-left">Nạp tiền</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>            
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-default profile">
                    <div class="avatar">
                        <?php if ($data_user['avatar']): ?>
                            <img src="<?=base_url().$data_user['avatar']?>" alt="Avatar" class="img-responsive">
                        <?php else: ?>
                            <span class="icon-avatar"><i class="fa fa-user"></i></span> 
                        <?php endif ?>                                              
                    </div>
                    <div class="btn-avt text-center" >
                        <button type="button" class="btn btn-primary" title="Upload Avatar"><i class="fa fa-camera"></i></button>
                    </div>
                    <div class="alert alert-danger alert-avt hidden" style="margin-top: 5px;"></div>
                    <form action="<?=base_url()?>admin/profile/upload_avt" id="upload-avatar" class="hidden" enctype="multipart/form-data">
                        <input type="file" name="avt" id="file-avt">
                        <input type="submit" id="submit-file">
                    </form>
                </div>
                <div class="data-footer">
                    <div class="col-sm-4 col-xs-4 info text-center">
                        <img src="<?=base_url()?>uploads/1.png" alt="Vip" title="Vip" class="img-vip" >
                    </div>
                    <div class="col-sm-4 col-xs-4 info text-center">
                        <h5><?php echo $quiz['total_quiz'];  ?></h5>
                        <p class="info-description"><i class="fa fa-book" aria-hidden="true"></i> QUIZ</p>
                    </div>
                    <div class="col-sm-4 col-xs-4 info text-center">
                        <h5><?php echo $quiz['total_view']; ?></h5>
                        <p class="info-description"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</p>
                    </div>
                    <div class="clearfix">            
                    </div>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="panel panel-default">
                        <div class="panel-body">                            
                            <div class="form-group">
                                <label for="username" class="col-lg-4 control-label">Tài khoản :</label>
                                <div class="col-lg-8">
                                  <p class="form-control-static"><?php echo $this->session->username; ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label">Mật khẩu :</label>
                                <div class="col-lg-8">
                                    <span class="form-control-static">*********</span>
                                    <a href="javascript:void(0)" id="edit-pass"><i class="fa fa-edit"></i> Đổi mật khẩu</a>
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-lg-4 control-label">Mật khẩu hiện tại :</label>
                                <div class="col-lg-8 ">
                                  <input type="password" class="form-control" id="old-pass"  placeholder="Nhập mật khẩu hiện tại">
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-lg-4 control-label">Mật khẩu mới :</label>
                                <div class="col-lg-8 ">
                                  <input type="password" class="form-control" id="new-pass"  placeholder="Nhập mật khẩu mới">
                                </div>
                            </div>
                            <div class="form-group change-pass" >
                                <label class="col-lg-4 control-label">Xác nhận đổi mật khẩu :</label>
                                <div class="col-lg-8 ">
                                  <button type="button" class="btn btn-primary" id="ok-change-pass"><i class="fa fa-check-square-o"></i> Đồng ý</button>
                                  <button type="button" class="btn btn-danger" id="close"><i class="fa fa-times"></i> Hủy</button>
                                </div>
                            </div>
                            <input type="reset" value="Làm mới"  class="reset-form hidden">
                            <div class="alert alert-danger hidden" id="alert-pass" data-url="<?=base_url()?>admin/profile/change_pass"></div>
                            
                        </div>
                    </div>
                </form>
                <div class="edit-profile">
                    <form onsubmit="return false;" method="POST" class="form-horizontal" role="form">  
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user"></i> Edit Profile</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="myname" class="col-lg-4 control-label">Tên:</label>
                                    <div class="col-lg-8">
                                      <input type="text" class="form-control" id="myname" value="<?php echo $user['fullname']; ?>" placeholder="Nhập tên bạn">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="my-gmail" class="col-lg-4 control-label">Gmail :</label>
                                    <div class="col-lg-8 ">
                                      <input type="text" class="form-control" id="my-gmail" value="<?php echo $user['gmail']; ?>" placeholder="Nhập gmail của bạn">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="my-fb" class="col-lg-4 control-label">Facebook :</label>
                                    <div class="col-lg-8 ">
                                      <input type="text" class="form-control" id="my-fb" value="<?php echo $user['fb']; ?>" placeholder="Nhập link Facebook cá nhân nếu muốn">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ok-change" class="col-lg-7 control-label">Xác nhận thay đổi nếu có</label>
                                    <div class="col-lg-5">
                                        <button type="button" class="btn btn-primary" id="ok-change"><i class="fa fa-check-square-o"></i> Ok</button>
                                    </div>
                                </div>
                                <div class="alert alert-danger hidden" id="alert-change" data-url="<?=base_url()?>admin/profile/change_info"></div>                                 
                            </div>
                        </div>                                     
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12 pull-right">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> Notification
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <ul class="timeline">
                            <?php foreach ($message as $key => $item): ?>
                                <?php 
                                    $time_message = date('d:m:Y H:i:s',strtotime($item->created_at));
                                    $class = ($key % 2 == 0) ? '' : 'timeline-inverted';
                                ?>
                                <li class="<?php echo $class; ?>" id="message-<?php echo $item->id; ?>">
                                    <div class="timeline-badge primary"><i class="fa fa-comments"></i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title"><?php echo $item->title; ?></h4>
                                            <p><small class="text-muted"><i class="fa fa-user"></i> 
                                                <?php if ($item->sender_id == 1) {
                                                    echo 'Admin';
                                                } else {
                                                    echo $item->fullname;
                                                } ?>
                                            </small>
                                            </p>
                                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $time_message; ?></small>
                                            </p>
                                        </div>
                                        <div class="timeline-body">
                                            <p><?php echo $item->message; ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                            
                        </ul>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>		
		</div>
	</div>
</div>
<?php $this->mcode->set_li_active('li-4'); ?>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/profile.js""></script>