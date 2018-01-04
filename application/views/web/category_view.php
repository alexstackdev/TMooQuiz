<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 1/1/18
 * Time: 8:16 PM
 */
?>
<?php $this->load->view('layout_web/include/header'); ?>
<script>
    $('body').toggleClass('fixed');
    $('body').toggleClass('sidebar-mini');

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
                <section class="content-header">
                    <h1>
                        Danh sách đề thi
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> category</a></li>
                        <li class="active"><?php echo $current_id['cat_slug']; ?></li>
                    </ol>
                </section>

        <!-- Main content -->
        <section class="content container-fluid custom-content">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="tab-content">
                        <div class="banner-category-top text-center" style="margin-bottom: 1em; ">
                            <?php if ($data_user['vip'] != 1): ?>
                                <?php $this->mcode->get_banner(2); ?>
                            <?php endif ?>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-quiz" role="tablist" data-user="<?=base_url()?>admin/profile/preview">
                            <li class="active"><a href="#top-view" role="tab" data-toggle="tab" class=""><i class="fa fa-bar-chart"></i> Top View</a></li>
                            <li><a href="#new" role="tab" data-toggle="tab" class=""><i class="fa fa-rss"></i> Mới nhất</a></li>
                        </ul>

                        <!-- Tab panes -->

                        <div class="tab-pane active" id="top-view">
                            <?php if ($quiz_view == null) { ?>
                                <div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
                            <?php }
                            else {
                                $this->load->view('web/tab_content_view');
                            }
                            ?>
                        </div>
                        <div class="tab-pane" id="new">
                            <?php if ($quiz_new == null) { ?>
                                <div class="alert alert-danger">Chuyên mục này chưa có đề thi nào!</div>
                            <?php }
                            else {
                                $this->load->view('web/tab_content_new');
                            }
                            ?>
                        </div>
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
<script>
    $(function(){
        $('aside.main-sidebar').toggleClass('cat-view');
        $('.baner-footer-4').css('margin-top', '1em');
        $check = localStorage.getItem('mixed');
        if ($check == '1'){
            $('a.quiz-title').each(function () {
                $url = $(this).attr('href') + '?mixed=true';
                $(this).attr('href',$url);
            })
        }
        else {
            $('.quiz-item').each(function () {
                $url = $(this).attr('data-url');
                console.log($url);
                $(this).children('.quiz-title').attr('href',$url);
            })
        }
    });
    <?php if ($this->session->permission == 2): ?>
    function delete_quiz($id,$type){
        $url = $('.url').attr('data-url');
        var $check = confirm('Bạn chắc chắn muốn xóa quiz này không? Nhấn Ok để xóa.');
        if ($type == 1) {
            $item = $('#item-view'+$id+'');
        }
        else if($type == 2){
            $item = $('#item-new'+$id+'')
        }
        if ($check) {
            $.ajax({
                url : $url,
                type : 'POST',
                // Các dữ liệu
                data : {
                    quiz_id : $id
                    // Thực thi khi gửi dữ liệu thành công
                }, success : function(data) {
                    $item.remove();
                }
            });
        }
    }
    <?php endif ?>
</script>