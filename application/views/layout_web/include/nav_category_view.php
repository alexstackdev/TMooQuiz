<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?=base_url()?>">TMooQuiz 2.0</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li>
            <a href="<?=base_url()?>admin/create.html" ><i class="fa fa-plus"></i> Tạo đề thi</a>
        </li>
        <?php if ($this->mcode->admin_logged_in()): ?>
            <li class="user">
                <a href="<?=base_url()?>admin/listquiz.html" title="Trang quản trị"><i class="fa fa-user"></i> <?php echo $this->session->fullname; ?></a>
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
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="navbar-collapse navbar-ex1-collapse collapse" aria-expanded="false" style="height: 1px;">
        <ul class="nav navbar-nav side-nav">
            <li class="nav-search">
                <form action="<?=base_url()?>search.html" method="get" role="search" accept-charset="utf-8">
                    <div class="input-group">
                        <input type="text" class="form-control pull-left " name="s" id="key_word" value="" placeholder="Tìm kiếm"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"   id="open_file" ><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>              
                </form> 
            </li>
            <?php 
                foreach ($list_category as $id => $item) { 
                    if ($item->category_id == $current_id['category_id']) { ?>
                        <li class="list-menu-item menu-item-<?php echo $item->category_id;?> current-cat">
                            <a href="<?=base_url()?>category/<?=$item->cat_slug?>.html" title="<?php echo $item->category; ?>">
                                <?php echo $item->category; ?>                                
                            </a>
                        </li>
                    <?php }
                    else { ?>
                    <li class="list-menu-item menu-item-<?php echo $item->category_id;?>">                                    
                        <a href="<?=base_url()?>category/<?=$item->cat_slug?>.html" title="<?php echo $item->category; ?>">
                                <?php echo $item->category; ?>                            
                        </a> 
                    </li>                                       
                    <?php }                             
                }
             ?>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>