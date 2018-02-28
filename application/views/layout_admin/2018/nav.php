<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 12/31/17
 * Time: 12:01 AM
 */

if (isset($mess) && count($mess)){
    $total_mess = count($mess);
}else{
    $total_mess = 0;
}
?>
<!-- Logo -->
<a href="<?=base_url()?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
        <span><b>TMoo</b></span>
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><span class="glyphicon glyphicon-edit"><b>TMoo</b>Quiz</span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <?php if ($this->mcode->admin_logged_in()): ?>
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success"><?php echo $total_mess; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have <?php echo $total_mess; ?> messages</li>
                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <?php if ($total_mess > 0): ?>
                                    <?php foreach ($mess as $item): ?>
                                        <?php
                                        $time_message = date('d:m:Y H:i:s',strtotime($item->created_at));
                                        ?>
                                        <li><!-- start message -->
                                            <a href="<?=base_url().'admin/profile.html#message-'.$item->id?>">
                                                <div class="pull-left">
                                                    <!-- User Image -->
                                                    <img src="<?=base_url()?>uploads/logo.png" class="img-circle" alt="User Image">
                                                </div>
                                                <!-- Message title and timestamp -->
                                                <h4>
                                                    TMooQuiz
                                                    <small><i class="fa fa-clock-o"></i> <?php echo $time_message; ?></small>
                                                </h4>
                                                <!-- The message -->
                                                <p><?php echo $item->message; ?></p>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                <?php endif ?>

                                <!-- end message -->
                            </ul>
                            <!-- /.menu -->
                        </li>
                        <li class="footer"><a href="<?=base_url().'admin/profile.html'?>">See All Messages</a></li>
                    </ul>
                </li>
                <!-- /.messages-menu -->

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding-top: 10px">
                        <!-- The user image in the navbar-->
                        <span class="icon-avt">
                            <?php $this->mcode->getAvatar($data_user['avatar']); ?>
                        </span>

                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo $data_user['fullname']; ?> <i class="fa fa-caret-down"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <span id="user-img">
                                <?php $this->mcode->getAvatar($data_user['avatar']); ?>
                            </span>


                            <p>
                                <?php echo $data_user['fullname']; ?>
                                <small style="margin-bottom: 5px;">
                                    <?php if ($data_user['vip']): ?>
                                       <img src="<?=base_url()?>uploads/1.png" width="35px" height="30px" alt="VIP">
                                    <?php endif; ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <h5><?php echo $quiz['total_quiz'];  ?></h5>
                                    <p class="info-description"><i class="fa fa-book" aria-hidden="true"></i> QUIZ</p>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <h5><?php echo $quiz['total_view']; ?></h5>
                                    <p class="info-description"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</p>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <h5><?php echo $data_user['balance']; ?></h5>
                                    <p class="info-description"> VND</p>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?=base_url()?>admin/profile.html" class="btn btn-default btn-flat"><i class="fa fa-fw fa-address-card-o"></i> Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?=base_url()?>signout.html" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            <?php else: ?>
                <li class="login">
                    <a href="<?=base_url()?>login.html"><i class="fa fa-sign-in"></i> Đăng nhập</a>
                </li>
            <?php endif ?>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar" title="Cài đặt"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>
