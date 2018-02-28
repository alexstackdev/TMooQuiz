<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 2/2/18
 * Time: 10:00 PM
 */
?>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php $this->load->view('layout_admin/2018/header'); ?>
<div class="wrapper">
    <header class="main-header">
        <?php $this->load->view('layout_web/2018/nav'); ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('layout_admin/2018/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content container-fluid custom-content">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <?php echo $the_view_content;?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar Right-->
    <?php $this->load->view('layout_web/2018/sidebar-right'); ?>
</div>
<?php $this->load->view('layout_admin/2018/footer'); ?>

