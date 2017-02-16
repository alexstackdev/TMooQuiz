<?php $this->load->view('layout_web/include/header'); ?>
<header>
    <?php $this->load->view('layout_web/include/nav'); ?>
</header><!-- /header -->
<div class="container"> 
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-form panel panel-primary">
                <div class="panel-heading">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" onsubmit="return false;" id="formSignin" data-url="<?=base_url()?>login/get_login">
                        <div class="form-group">
                            <label for="user_signin">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="user_signin" placeholder="Nhập tài khoản" >
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Mật khẩu</label>
                            <input type="password" class="form-control" id="pass_signin" placeholder="Nhập mật khẩu" >
                        </div>
                        <button class="btn btn-primary" id="submit_signin">Đăng nhập</button>
                        <a href="<?=base_url();?>" class="btn btn-default pull-right">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <br><br>
                        <div class="alert alert-danger hidden" id="alert"></div>
                        
                        <div class="alert alert-warning">Bạn chưa có tài khoản ? <a href="<?=base_url()?>signup.html" title="Đăng ký"> Đăng ký </a>ngay</div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/login.js"></script>