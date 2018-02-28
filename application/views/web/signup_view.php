<?php $this->load->view('layout_web/include/header'); ?>
<script>
    $('body').toggleClass('sidebar-mini');
    $('body').toggleClass('sidebar-collapse');
</script>
<div class="wrapper">
    <header class="main-header">
        <?php $this->load->view('layout_web/2018/nav'); ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('layout_web/2018/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!--        <section class="content-header">-->
        <!--            <h1>-->
        <!--                Page Header-->
        <!--                <small>Optional description</small>-->
        <!--            </h1>-->
        <!--            <ol class="breadcrumb">-->
        <!--                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>-->
        <!--                <li class="active">Here</li>-->
        <!--            </ol>-->
        <!--        </section>-->

        <!-- Main content -->
        <section class="content container-fluid custom-content">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
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
                            <h3>Đăng ký</h3>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="<?=base_url()?>signup/create_user"  id="formSignup">
                                <div class="form-group">
                                    <label for="user_signup">Tên đăng nhập</label>
                                    <input type="text" class="form-control" name="username" id="user_signup" autocomplete="off" placeholder="Nhập tài khoản" required minlength="6">
                                </div>
                                <div class="form-group">
                                    <label for="pass_signup">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" id="pass_signup" autocomplete="off" placeholder="Nhập mật khẩu" required minlength="6">
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Tên của bạn</label>
                                    <input type="text" class="form-control" name="fullname" autocomplete="off" placeholder="VD : Trung Phan, Đỗ Mạnh" required>
                                </div>
                                <div class="form-group">
                                    <label for="msv">Mã sinh viên</label>
                                    <input type="text" class="form-control" name="msv" autocomplete="off" placeholder="VD : 14107133" required>
                                </div>
                                <div class="form-group">
                                    <label for="class">Lớp</label>
                                    <input type="text" class="form-control" name="class" autocomplete="off" placeholder="VD : KT21.01">
                                </div>
                                <div class="form-group">
                                    <label>Chọn chuyên ngành</label>
                                    <select name="khoa" id="category" class="form-control" required>
                                        <option value="">-------------------</option>
                                        <?php foreach ($cat as $key => $item): ?>
                                            <option value="<?php echo $item->category_id; ?>"><?php echo $item->category; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhập mã Captcha</label>
                                    <div class="form-group">
                                        <div class="img-captcha pull-left">
                                            <?php echo $captcha['image'];?>
                                        </div>
                                        <input type="text" class="form-control input-captcha" name="captcha" autocomplete="off" placeholder="Nhập mã captcha" required>
                                        <input type="hidden"  name="re_captcha" class="show-re-captcha" value="<?=$captcha['word'];?>">
                                    </div>
                                    <blockquote style="font-size: 13px;border-left: 5px solid #428bca;">
                                        Nếu captcha khó quá , vui lòng tải lại trang!
                                    </blockquote>
                                </div>
                                <button class="btn btn-primary" id="submit_signup">Đăng ký</button>
                                <input type="reset" value="Làm mới"  class="reset-form btn btn-default">
                                <a href="<?=base_url();?>" class="btn btn-default pull-right">
                                    <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                                </a>
                                <br><br>
                                <?php if (isset($this->session->error) && $this->session->error): ?>
                                    <div class="alert alert-error " style="margin: 0 ;margin-bottom: 10px;">
                                        <?php echo $this->session->error; ?>
                                    </div>
                                <?php endif ?>
                            </form>
                            <div class="alert alert-warning">Bạn đã có tài khoản ? <a href="<?=base_url()?>login.html"> Đăng nhập </a>ngay</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 hidden-xs">
                    <div class="banner-left text-center">
                        <?php if ($data_user['vip'] != 1) {
                            $this->mcode->get_banner(7);
                        }  ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Control Sidebar Right-->
    <?php $this->load->view('layout_web/2018/sidebar-right'); ?>
</div>
<!-- <script type="text/javascript" src="assets/web/js/signup.js"></script> -->