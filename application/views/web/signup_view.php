<?php $this->load->view('layout_web/include/header'); ?>
<header>
    <?php $this->load->view('layout_web/include/nav'); ?>
</header><!-- /header -->
<div class="container"> 
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-form panel panel-primary">
                <div class="panel-heading">
                    <h3>Đăng ký</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" onsubmit="return false;" data-url="<?=base_url()?>signup/create_user" id="formSignup">
                        <div class="form-group">
                            <label for="user_signup">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="user_signup" autocomplete="off" placeholder="Nhập tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="pass_signup">Mật khẩu</label>
                            <input type="password" class="form-control" id="pass_signup" autocomplete="off" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Tên của bạn</label>
                            <input type="text" class="form-control" id="fullname" autocomplete="off" placeholder="VD : Trung Phan, Đỗ Mạnh :v">
                        </div>                        
                        <button class="btn btn-primary" id="submit_signup">Đăng ký</button>
                        <input type="reset" value="Làm mới"  class="reset-form btn btn-default">
                        <a href="<?=base_url();?>" class="btn btn-default pull-right">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <br><br>
                        <div class="alert alert-warning hidden"></div>
                    </form>
                    <div class="alert alert-warning">Bạn đã có tài khoản ? <a href="<?=base_url()?>login.html"> Đăng nhập </a>ngay</div>
                </div>
            </div>           
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/web/js/signup.js"></script>