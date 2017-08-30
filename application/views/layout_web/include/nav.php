<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                                                    </button>
                <a class="navbar-brand" href="<?=base_url();?>"><span class="glyphicon glyphicon-edit"></span>TMooQuiz 2.0</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse">
                <ul class="nav navbar-nav navbar-right nav-homepage">
                    <li>
                        <a href="<?=base_url()?>admin/create.html"><i class="fa fa-plus"></i> Tạo đề thi</a>
                    </li>
                    <?php if ($this->mcode->admin_logged_in()): ?>
                        <li class="user">
<<<<<<< HEAD
<<<<<<< HEAD
                            <a href="<?=base_url()?>admin.html"><i class="fa fa-user"></i> <?php echo $this->session->fullname; ?></a>
=======
                            <a href="<?=base_url()?>admin/listquiz.html"><i class="fa fa-user"></i> <?php echo $this->session->fullname; ?></a>
>>>>>>> parent of e250767... update 1
=======
                            <a href="<?=base_url()?>admin.html"><i class="fa fa-user"></i> <?php echo $this->session->fullname; ?></a>
>>>>>>> 0544d08624215e5c9df6cf396d7964e4df326234
                        </li>
                        <li class="logout">
                            <a href="<?=base_url()?>signout.html"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                        </li>
                    <?php else: ?>
                        <li class="login">
                            <a href="<?=base_url()?>login.html"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                        </li>
                    <?php endif ?>
                </ul>                                    
            </div>
        </div>
</nav>