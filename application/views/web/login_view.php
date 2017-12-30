<?php $this->load->view('layout_web/include/header'); ?>
<header>
    <?php $this->load->view('layout_web/include/nav'); ?>
</header><!-- /header -->
<div class="container"> 
    <div class="row">
        <div class="col-md-3">
            <div class="banner-left text-center">
                <?php if ($data_user['vip'] != 1) {
                    $this->mcode->get_banner(6);
                }  ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="login-form panel panel-primary">
                <div class="panel-heading">
                    <h3>Đăng nhập</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?=base_url()?>login/get_login" id="formSignin" data-url="<?=base_url()?>login/get_login">
                        <div class="form-group">
                            <label for="user_signin">Tên đăng nhập</label>
                            <input type="text" class="form-control" name="username" id="user_signin" placeholder="Nhập tài khoản" >
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Mật khẩu</label>
                            <input type="password" class="form-control" name="pass" id="pass_signin" placeholder="Nhập mật khẩu" >
                        </div>
                        <button class="btn btn-primary" id="submit_signin">Đăng nhập</button>
                        <a href="<?=base_url();?>" class="btn btn-default pull-right">
                            <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                        </a>
                        <br><br>
                        <?php if ($this->session->error): ?>
                            <div class="alert alert-danger" id="alert">
                                <?php echo $this->session->error; ?>
                            </div>
                        <?php endif ?>
                        <?php if ($this->session->success): ?>
                            <div class="alert alert-primary" id="alert">
                                <?php echo $this->session->success; ?>
                            </div>
                        <?php endif ?>
                        
                        <div class="alert alert-warning">Bạn chưa có tài khoản ? <a href="<?=base_url()?>signup.html" title="Đăng ký"> Đăng ký </a>ngay</div>
                    </form>
                </div>
            </div>           
        </div>
        <div class="col-md-3 hidden-xs">
            <div class="banner-right text-center">                    
                <?php if ($data_user['vip'] != 1) {
                    $this->mcode->get_banner(7);
                }  ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/admin/js/login.js"></script>