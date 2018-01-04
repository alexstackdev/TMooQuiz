<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 1/3/18
 * Time: 8:08 PM
 */
?>
<?php $this->load->view('layout_web/include/header'); ?>
<script>
    $('body').toggleClass('sidebar-collapse');
</script>
<div class="wrapper quiz-view" id="quiz-wrapper" data-mixed="<?php echo $mixed; ?>" data-url="<?=base_url().'quiz/'.$qs['quiz_id'].'/'.$qs['quiz_slug'].'.html'?>">
    <header class="main-header">
        <?php $this->load->view('layout_web/2018/nav'); ?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('layout_web/2018/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" >
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
        <section class="content container-fluid custom-content" style="width: 100%">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <!--Sidebar left-->
                <div class="sidebar-left col-md-3 col-sm-3 col-xs-12">
                    <div class="panel panel-info quiz-info hidden-xs">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-book"></i> Thông tin đề thi</h3>
                        </div>
                        <div class="nav-quiz" data-user="<?=base_url()?>admin/profile/preview"></div>
                        <div class="panel-body">
                            <p><strong>ID đề thi: </strong><span class="quiz-id label label-primary"><?php echo $qs['quiz_id']; ?></span></p>
                            <p><strong>Danh mục: </strong><a href="<?=base_url()?>category/<?php echo $qs['cat_slug']; ?>.html" title="<?php echo $qs['category']; ?>"><?php echo $qs['category']; ?></a></p>
                            <p><strong>Người tạo: </strong>
                                <?php if ($qs['vip']): ?>
                                    <span>
								<a href="#" onclick="InfoUser(<?php echo $qs['user_id'] ;?>)">
		                              <?php if ($qs['avatar']): ?>
                                          <span class="icon-avt"><img class="img-responsive" src="<?=base_url().$qs['avatar']?>" ></span>
                                      <?php endif ?>
                                    <?php
                                    echo $qs['fullname']; ?>
                                    <img src="<?=base_url()?>uploads/2.png" width="10" height="10" class="icon-vip">
		                        </a>
							</span>
                                <?php else: ?>
                                    <span><?php echo $qs['fullname']; ?></span>
                                <?php endif ?>
                            </p>
                            <p><strong>Lượt thi: </strong><span class="quiz-viewed"><?php echo $qs['viewed']; ?></span></p>
                            <p><strong>Ngày tạo: </strong><span><?php echo date('H:i:s d/m/Y',strtotime($qs['created'])); ?></span></p>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart"></i> Thông tin thi</h3>
                        </div>
                        <div class="panel-body">
                            <p><strong>Đã làm: </strong><span id="quiz_choosed">0</span></p>
                            <p><strong>Đúng: </strong><span id="quiz_correct">0</span></p>
                            <p><strong>Điểm: </strong><span id="quiz_scores" class="label label-danger">0.00%</span></p>
                        </div>
                        <div class="panel-footer text-center">
                            <script>
                                $fb_url = location.href;
                                $('.fb-like').attr('data-href',$fb_url);
                            </script>
                            <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </div>
                    </div>
                    <div class="banner-quiz-left hidden-xs" style="margin-bottom: 1em;">
                        <?php if ($data_user['vip'] != 1): ?>
                            <?php $this->mcode->get_banner(3); ?>
                        <?php endif ?>

                    </div>
                    <div class="baner-quiz-top-1 hidden-sm hidden-md hidden-lg" style="margin-bottom: 1em;">
                        <?php if ($data_user['vip'] != 1): ?>
                            <?php $this->mcode->get_banner(5); ?>
                        <?php endif ?>
                    </div>
                </div>
                <!--Content-->
                <div class="quiz col-md-6 col-sm-6 col-xs-12" data-url="<?=base_url()?>index/updateView">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center quiz-title"><i class="fa fa-graduation-cap"></i> <?php echo $qs['title']; ?></h3>
                        </div>
                        <div class="panel-body content">
                            <ul id="section_section" class="nav nav-tabs" role="tablist"></ul><br>
                            <div id="question_question"></div>
                        </div>
                        <div class="panel-footer">
                            <div class="control text-center">
                                <button type="submit" class="btn btn-primary" id="btn-prev" onclick="return previousQuestion()">
                                    <i class="fa fa-arrow-left"></i> Trước</button>
                                <button type="submit" class="btn btn-primary" id="btn-next" onclick="return nextQuestion()">
                                    Tiếp <i class="fa fa-arrow-right"></i></button>
                                <button class="btn btn-primary visible-xs btn-reAnswer" onclick="return reAnswer()">Làm lại câu sai</button>
                            </div>
                        </div>
                    </div>
                    <div class="fb-cmt" style="background: #fff; margin-bottom: 15px;max-height: 300px; overflow: auto;">
                        <div class="fb-comments" data-mobile="true" data-href="<?php echo current_url(); ?>" data-numposts="5"></div>
                    </div>
                </div>
                <!--Sidebar rigth-->
                <div class="sidebar-r col-md-3 col-sm-3 hidden-xs">

                    <div class="panel panel-success quiz-span">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-tags"></i> Mục lục câu hỏi</h3>
                        </div>
                        <div class="panel-body">
                            <div id="section_catalog"></div>
                        </div>
                        <div class="panel-footer text-center">
                            <?php if($qs['user_id'] == $data_user['user_id'] || $data_user['permission'] == 2):?>
                            <button class="btn btn-primary" >
                                <a id="edit-quiz" href="<?php echo $this->mcode->getEditQuiz($qs['quiz_id']) ?>">
                                    <i class="fa fa-edit"></i> Chỉnh sửa
                                </a></button>
                            <?php endif; ?>
                            <button class="btn btn-primary" onclick="return reAnswer()"><i class="fa fa-refresh"></i> Làm lại câu sai</button>
                        </div>
                    </div>


                </div>
                <div class="history-quiz col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-history"></i> Lịch sử hoạt động</h3>
                        </div>
                        <div class="panel-body" style="max-height: 280px; overflow: auto;">
                            <div class="table">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width=""></th>
                                        <?php if ($this->agent->is_mobile()): ?>
                                            <th width="100px"></th>
                                        <?php endif ?>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($history as $item): ?>
                                        <tr class="history-item">
                                            <td>
                                                <?php if ($item->vip == 1): ?>
                                                    <span class="meta-user">
	                                                  <a href="#" onclick="InfoUser(<?php echo $item->user_id ?>)">
	                                                    <?php if ($item->avatar): ?>
                                                            <span class="icon-avt"><img class="img-responsive" src="<?=base_url().$item->avatar?>" ></span>
                                                        <?php endif ?>
                                                          <?php echo $item->fullname; ?>
                                                          <img src="<?=base_url()?>uploads/2.png" width="10" height="10" class="icon-vip">
	                                               </a>
	                                              </span>
                                                <?php else: ?>
                                                    <span class="meta-user">
	                                                    <i class="fa fa-user"></i> Thành viên: <?php echo $item->fullname; ?>
	                                                </span>
                                                <?php endif ?>
                                                <span>
	                                                đã làm đề thi này
	                                            </span>
                                                <?php if (!$this->agent->is_mobile()): ?>
                                                    <p style="margin-top: 5px;color: #666666;font-size: 13px;font-style: italic;">
	                                            		<span class="meta-time">
		                                                    <i class="fa fa-clock-o"></i> <?php echo $this->mcode->convertTime($item->created_at); ?>
		                                                </span>
                                                        <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                                    </p>
                                                <?php endif ?>
                                            </td>
                                            <?php if ($this->agent->is_mobile()): ?>
                                                <td style="color: #666666;font-size: 13px;font-style: italic;">
	                                                <span class="meta-time">
	                                                    <?php echo $this->mcode->convertTime($item->created_at); ?>
	                                                </span>
                                                    <?php echo $item->device == 1 ? '<i class="fa fa-desktop" aria-hidden="true"></i>' : '<i class="fa fa-mobile" aria-hidden="true"></i>' ; ?>
                                                </td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>

                                    </tbody>
                                </table>
                            </div>
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
<?php if ($data_user['vip'] != 1): ?>
    <div class="modal fade" id="modal-banner" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <?php $this->mcode->get_banner(9) ?>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('#modal-banner .modal-content img').on('load',function() {
                /* Act on the event */
                $('#modal-banner').modal('show');
            });

        });

    </script>
<?php endif ?>
<?php if ($data_user['permission'] == 2): ?>


<?php endif ?>
<?php if ($data_user['vip'] != 1): ?>
    <?php if ($this->agent->is_mobile()): ?>
        <?php $this->load->view('web/vip/notif_vip'); ?>
        <script>
            var vip_s = 0
            var time_vip = 120	;
            var modal_vip = setInterval(function() {
                time_vip--;
                if (time_vip == -1) {
                    vip_s--;
                }
                if (vip_s == -1) {
                    if(!$('#modalCard').hasClass('in')){
                        $('#modalVip').modal('show');
                        clearInterval(modal_vip);
                    }else {
                        vip_s = 0;
                        time_vip = 60;
                        modal_vip;
                    }
                }
                console.log(time_vip);
            }, 1000);
        </script>
    <?php endif ?>
<?php endif ?>

    <script>
        var quiz_id = <?php echo $qs['quiz_id']; ?>;
        var quiz = <?php echo json_encode($content); //print_r($content);?>;
        $(document).keydown(function(e) {
            if (e.keyCode == '39') {
                $('#btn-next').click();
            }
            if (e.keyCode == '37') {
                $('#btn-prev').click();
            }
        })
        $(function () {
            var mixed = localStorage.getItem('mixed');
            var check = $('#quiz-wrapper').attr('data-mixed');
            if (mixed == '1' && check != '1'){
                href = $('#quiz-wrapper').attr('data-url') + '?mixed=true';
                location.replace(href);
            }else if(mixed == '0' && check == 1){
                href = $('#quiz-wrapper').attr('data-url');
                location.replace(href);
            }
        })
    </script>
    <script type="text/javascript" src="<?=base_url()?>assets/web/js/quiz.js"></script>
<?php $this->load->view('layout_web/include/sound_view'); ?>