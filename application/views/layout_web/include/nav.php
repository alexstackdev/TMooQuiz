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
                            <li class="user dropdown "  >
                                <a href="#" data-toggle="dropdown">
                                    <i class="fa fa-user"></i> <?php echo $data_user['fullname']; ?> <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li class="dropdown-item" >
                                        <a href="<?=base_url()?>admin/listquiz.html"><i class="fa fa-dashboard fa-fw"></i> Quản lý đề thi</a>
                                    </li>
                                    <li class="dropdown-item" >
                                        <a href="#" onclick="return false;">
                                            <i class="fa fa-credit-card"></i> Số tiền : <span id="user-balance"><?php echo $data_user['balance']; ?></span> VNĐ
                                        </a>                    
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#" class="menuShowModal" data-url="<?=base_url()?>index/card_view">
                                            <i class="fa fa-bank"></i> Nạp tiền
                                        </a>
                                    </li>
                                    <li class="li-4 dropdown-item" >
                                        <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
                                    </li>
                                </ul>
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