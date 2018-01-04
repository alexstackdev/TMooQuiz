<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 12/31/17
 * Time: 12:13 AM
 */
?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">

            <!-- /.control-sidebar-menu -->


            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane active" id="control-sidebar-settings-tab">
            <h4 class="control-sidebar-heading">Settings</h4>
            <div class="functions form-group">
                <span>Thời gian chuyển câu : </span>
                <select id="time_next" style="color: #000;">
                    <option value="-1">Tắt</option>
                    <option value="1">1</option>
                    <option value="2" selected="selected">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="functions form-group">
                <span>Tắt âm thanh : </span> <input type="checkbox"  id="muted"  />
            </div>
            <div class="functions form-group">
                <span>Đảo câu hỏi :</span> <input type="checkbox" onclick="mixed()"  id="mixed"  />
            </div>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<script>
    function mixed() {
        $mixed = $('.functions #mixed').prop('checked');
        if ($mixed == '1'){
            localStorage.setItem('mixed','1');
            $('.quiz-item a.quiz-title').each(function () {
                $url = $(this).attr('href') + '?mixed=true';
                $(this).attr('href',$url);
            })
            if($('#quiz-wrapper').hasClass('quiz-view')){
                href = $('#quiz-wrapper').attr('data-url') + '?mixed=true';
                location.replace(href);
            }
        }
        else {
            localStorage.setItem('mixed','0');
            $('.quiz-item').each(function () {
                $url = $(this).attr('data-url');
                $(this).children('.quiz-title').attr('href',$url);
            })
            if($('#quiz-wrapper').hasClass('quiz-view')){
                href = $('#quiz-wrapper').attr('data-url');
                location.replace(href);
            }
        }
    }
</script>