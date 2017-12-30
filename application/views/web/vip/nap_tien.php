<div class="modal fade card-pay" id="modalCard">
    <div class="modal-dialog card-content">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-bell"></i> TMooQuiz 2.0 : Ứng dụng giúp bạn ôn thi hiệu quả nhất HUBT</h4>
            </div>
            <div class="modal-body">
                <?php if ($info): ?>
                    <div class="alert-error">
                        <p><i class="fa fa-exclamation-circle"></i> <?php echo $info['title']; ?></p>
                    </div>
                    <p style="padding: 10px;margin: 0 15px;"><i class="fa fa-hand-o-right"></i> Bạn có thể download thử tại <a href="<?=base_url()?>quiz/563/vi-du-download.html">ví dụ</a> này</p>
                <?php endif ?>                
                <div class="modal-intro">
                    <div class="vip-intro col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Giới thiệu tài khoản VIP</h3>
                            </div>
                            <div class="panel-body">                                
                                <p id="item-1">
                                    Sở hữu tài khoản <span><img src="<?=base_url()?>uploads/1.png" width="30" height="30"></span>, Bạn có thể: 
                                </p>
                                <p><i class="fa fa-check-circle"></i> Download đề thi không giới hạn.</p>
                                <p><i class="fa fa-check-circle"></i> Được phép sử dụng trên điện thoại</p>
                                <p><i class="fa fa-check-circle"></i> Sử dụng chức năng Preview khi tạo đề thi.</p>
                                <p><i class="fa fa-check-circle"></i> Loại bỏ toàn bộ quảng cáo xuất hiện trên web.</p>
                                <p><i class="fa fa-check-circle"></i> Thay đổi giao diện quản lý.</p>
                                <p><i class="fa fa-check-circle"></i> Được ưu tiên cập nhật các chức năng mới.</p>
                                <p><i class="fa fa-check-circle"></i> Trở nên khác biệt với các thành viên thông thường bởi Bạn được đính kèm icon <span><img src="<?=base_url()?>uploads/1.png" width="20" height="20"></span>  ngay bên cạnh tên tài khoản.</p>
                                <table class="table table-hover table-responsive table-bordered" style="margin-top: 20px;">
                                    <thead style="background: #eeeeee;">
                                        <tr>
                                            <th>Chi phí nâng cấp</th>
                                            <th>Thời gian sử dụng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><strong>20.000</strong> VNĐ</td>
                                            <td><strong>60</strong> ngày</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <?php if ($data_user['user_id']): ?>
                                    <p><span><strong>Tài khoản của bạn hiện có : </strong></span>
                                    <span class="current-balance"><?php echo number_format($data_user['balance'],0,',','.'); ?> </span><strong>VNĐ</strong></p>
                                    <?php if ($data_user['vip'] != 1): ?>
                                        <p>Bạn chưa được nâng cấp lên Tài Khoản VIP. Hãy <button class="btn btn-active-vip" onclick="active_vip()" data-url="<?=base_url()?>index/active_vip" data-balance="<?php echo $data_user['balance']; ?>">Nâng cấp ngay</button></p>
                                    <?php else: ?>
                                        <p>
                                            <strong>
                                                Tài khoản VIP của bạn còn lại <?php echo $this->mcode->getTimeVip($data_user['vip_date']); ?> ngày
                                            </strong> 
                                            <button class="btn btn-active-vip" onclick="active_vip()" data-url="<?=base_url()?>index/active_vip" data-balance="<?php echo $data_user['balance']; ?>">Gia hạn ngay</button>
                                        </p>
                                    <?php endif ?>                                    
                                <?php else: ?>
                                    <p id="alert-login" style="margin-top: 10px;">Vui lòng <a href="<?=base_url()?>login.html">Đăng Nhập</a> hay <a href="<?=base_url()?>signup.html">Đăng Ký Mới</a> tài khoản để nâng cấp VIP ngay hôm nay.</p>
                                <?php endif ?>
                                <div class="alert hidden" id="alert-active-vip" style="margin-top: 10px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-form col-md-6 col-sm-12 col-xs-12">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Nạp thẻ</h3>
                            </div>
                            <div class="panel-body">
                                <form data-url="<?=base_url()?>index/card_pay" method="POST" id="form-card-pay" role="form" onsubmit="return false;"> 
                                    <div class="form-group">
                                        <label for="myname" class="control-label">Chọn loại thẻ:</label>
                                        <select id="lstTelco" name="lstTelco" class="form-control">
                                            <option value="viettel">Viettel</option>
                                            <option value="mobifone">MobiFone</option>
                                            <option value="vinaphone">Vinaphone</option>
                                            <option value="gate">Gate</option>
                                            <option value="vcoin">Vcoin</option>
                                            <option value="zing">Zing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Số Seri</label>
                                        <input type="text" class="form-control" id="txtSeri" name="txtSeri" placeholder="Nhập Seri thẻ" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã thẻ</label>
                                        <input type="text" class="form-control" id="txtCode" name="txtCode" placeholder="Nhập Mã thẻ" required>
                                    </div>
                                    <div class="">
                                        <label>Nhập mã Captcha</label>
                                        <div class="form-group">                                            
                                            <div class="img-captcha pull-left" style="margin-bottom: 10px;">                        
                                                <?php echo $captcha['image'];?>
                                            </div>
                                            <input type="text" class="form-control input-captcha" id="captcha" autocomplete="off" placeholder="Nhập mã captcha" required>
                                            <input type="hidden"  id="re_captcha" class="show-re-captcha" value="<?=$captcha['word'];?>">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" id="submit_card_pay" data-id="<?php echo $data_user['user_id']; ?>" onclick="CardPay()"><i class="fa fa-check-square-o"></i> Nạp thẻ</button>
                                    <div class="alert hidden" id="alert-card-pay" style="margin-top: 10px;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="quote">
                            <blockquote>
                                Vui lòng liên hệ fanpage <a href="https://www.facebook.com/TMooQuiz/" target="_blank">TMooQuiz</a> nếu cần trợ giúp !
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>