<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>admin/dashboard.html">TMooQuiz Admin 2.0</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="<?=base_url()?>" title="Về trang chủ"><i class="fa fa-home"></i> Trang Chủ</a>
        </li>
        <?php if ($data_user['vip'] == 1): ?>
            <li class="dropdown">
                <a class="dropdown-toggle" id="showMessage" data-url="<?=base_url()?>admin/profile/message_viewed" data-toggle="dropdown" href="#">
                    <?php if (isset($mess) && count($mess)): ?>
                        <span id="total-mess"><?php echo count($mess); ?></span>
                    <?php endif ?><i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <?php if (isset($mess) && count($mess)): ?>
                        <?php foreach ($mess as $item): ?>
                            <?php 
                                $time_message = date('d:m:Y H:i:s',strtotime($item->created_at));
                            ?>
                            <li>
                                <a href="<?=base_url().'admin/profile.html#message-'.$item->id?>">
                                    <div>
                                        <strong><?php echo $item->title; ?></strong>
                                        <p class=" text-muted">
                                            <em><i class="fa fa-clock-o"></i> <?php echo $time_message; ?></em>
                                        </p>
                                    </div>
                                    <span class="clearfix"></span>
                                    <div><?php echo $item->message; ?></div>
                                </a>
                            </li>
                            <li class="divider"></li>
                        <?php endforeach ?>  
                    <?php endif ?>                            
                    <li>
                        <a class="text-center" href="<?=base_url().'admin/profile.html'?>">
                            <strong>Read All Messages</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-messages -->
            </li>
        <?php endif ?>
        
        <li class="user dropdown">
            <a href="<?=base_url()?>admin/profile.html" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $data_user['fullname']; ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li class="dropdown-item" >
                    <a href="#" onclick="return false;">
                        <i class="fa fa-credit-card"></i> Số tiền : <span class="balance-panel"><?php echo number_format($data_user['balance'],0,',','.'); ?></span> VND
                    </a>                    
                </li>
                <li class="li-4 dropdown-item" >
                    <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
                </li>
                <li class="divider"></li>
                <li class="dropdown-item">
                    <a href="<?=base_url()?>signout"><i class="fa fa-fw fa-sign-out"></i> Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav side-nav">
            <!-- <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                    </div>
                    /input-group
                </li> -->
            <?php if ($this->session->permission == 2): ?>
                <li>
                    <a href="<?=base_url()?>admin/dashboard.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
            <?php endif ?>            
            <li >
                <a href="#"><i class="fa fa-fw fa-book"></i> Quiz <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url()?>admin/dashboard/listquiz.html"><i class="fa fa-list-ul"></i> Danh sách đề thi</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/create.html"><i class="fa fa-fw fa-plus"></i> Tạo đề mới</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gamepad"></i> Game giải trí <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?=base_url()?>game/pikachu.html" target="_blank"><span><img src="<?=base_url()?>uploads/pikachu-icon.png" width="18px" height="18px"></span> Pikachu</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>game/game2048.html" target="_blank"><span><img src="<?=base_url()?>uploads/apple-touch-icon.png" width="18px" height="18px"></span> 2048</a>
                    </li>
                </ul>
            </li>
            <?php if ($this->session->permission == 2): ?>
                <li >
                    <a href="<?=base_url()?>admin/category.html"><i class="fa fa-fw fa-bars"></i> Category</a>
                </li>
                <li >
                    <a href="<?=base_url()?>admin/manager_user.html"><i class="fa fa-fw fa-users"></i> Quản lý thành viên</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-cc-discover"></i> Banner<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ">
                            <a href="<?=base_url()?>admin/banner/list.html"><i class="fa fa-fw fa-list-ul"></i> Danh sách banner</a>
                        </li>
                        <li >
                            <a href="<?=base_url()?>admin/banner/create.html"><i class="fa fa-fw fa-plus-circle"></i> Tạo banner mới</a>
                        </li>
                    </ul>
                </li>                    
                <li >
                    <a href="<?=base_url()?>admin/notification/popup.html"><i class="fa fa-bell"></i> Thông báo</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-gear"></i> Components<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </li>
            <?php endif ?>
                       
            <li>
                <a href="<?=base_url()?>signout"><i class="fa fa-fw fa-times-circle"></i> Đăng xuất</a>
            </li>
            <li>
                <a href="<?=base_url()?>"><i class="fa fa-fw fa-arrow-left"></i> Về trang chủ</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>