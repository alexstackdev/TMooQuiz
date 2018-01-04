<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 12/31/17
 * Time: 12:03 AM
 */
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="<?=base_url()?>search.html" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="s" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <?php if ($this->mcode->admin_logged_in()): ?>
            <!-- Sidebar user panel (optional) -->
            <ul class="sidebar-menu" data-widget="tree">
                 <!-- Optionally, you can add icons to the links -->
                <li class="treeview">
                    <a href="javascript::void()"><i class="fa fa-users"></i> <span>Admin</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if ($this->session->permission == 2): ?>
                            <li>
                                <a href="<?=base_url()?>admin/dashboard.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                        <?php endif ?>
                        <li ><a href="<?=base_url()?>admin/listquiz.html"><i class="fa fa-fw fa-book"></i>Danh sách quiz</a></li>
                        <li><a href="<?=base_url()?>admin/create.html"><i class="fa fa-fw fa-plus"></i> Tạo quiz mới</a></li>
                        <li>
                            <a href="<?=base_url()?>admin/profile.html"><i class="fa fa-fw fa-address-card-o"></i> Thông tin cá nhân</a>
                        </li>
                        <li>
                            <a href="#" class="menuShowModal" data-url="<?=base_url()?>index/card_view"><i class="fa fa-circle-o"></i> VIP</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php endif ?>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree" id="cat-menu">
            <li class="header"><i class="fa fa-list-ul"></i> Chuyên mục</li>
            <!-- Optionally, you can add icons to the links -->
            <?php
            foreach ($list_category as $key => $item) { ?>
                <li class="cate-item">
                    <a href="<?=base_url()?>category/<?=$item->cat_slug?>.html">
                        <i class="fa fa-folder"></i>
                        <span><?php echo $item->category; ?></span>
                    </a>
                </li>

                <?php
            }
            ?>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
