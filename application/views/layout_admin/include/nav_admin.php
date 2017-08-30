<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="listquiz.html">TMooQuiz Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="<?=base_url()?>" title="Về trang chủ"><i class="fa fa-home"></i> Trang Chủ</a>
        </li>
        <li class="user dropdown "  >
            <a href="<?=base_url()?>admin/profile.html" data-toggle="dropdown">
                <i class="fa fa-user"></i> <?php echo $data_user['fullname']; ?> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li class="dropdown-item" >
                    <a href="#">
                        <i class="fa fa-credit-card"></i> Số tiền : <?php echo $data_user['balance'].' VND'; ?>
                    </a>                    
                </li>
                <li class="li-4 dropdown-item" >
                    <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
                </li>
                <li class="dropdown-item">
                    <a href="<?=base_url()?>signout"><i class="fa fa-fw fa-times-circle"></i> Đăng xuất</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav side-nav">
            <li class="li-1 active">
                <a href="<?=base_url()?>admin/listquiz.html"><i class="fa fa-fw fa-book"></i> Danh sách đề thi</a>
            </li>
            <li class="li-2">
                <a href="<?=base_url()?>admin/create.html"><i class="fa fa-fw fa-plus"></i> Tạo đề mới</a>
            </li>
            <li class="li-3">
                <a href="<?=base_url()?>admin/upload/quiz.html"><i class="fa fa-fw fa-upload"></i> Upload</a>
            </li>
            <li class="li-4">
                <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
            </li>
            
            <?php if ($this->session->permission == 2): ?>
                <li class="li-9">
                    <a href="<?=base_url()?>admin/category.html"><i class="fa fa-fw fa-table"></i> Category</a>
                </li>
                <li class="li-5">
                    <a href="<?=base_url()?>admin/manager_user.html"><i class="fa fa-fw fa-table"></i> Quản lý thành viên</a>
                </li>
                <li class="li-6">
                    <a href="<?=base_url()?>admin/banner/list.html"><i class="fa fa-fw fa-cc-discover"></i> Danh sách banner</a>
                </li>
                <li class="li-7">
                    <a href="<?=base_url()?>admin/banner/create.html"><i class="fa fa-fw fa-plus-circle"></i> Tạo banner mới</a>
                </li>
                <li class="li-8">
                    <a href="<?=base_url()?>admin/notification/popup.html"><i class="fa fa-bell"></i> Thông báo</a>
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