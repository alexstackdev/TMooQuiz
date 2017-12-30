<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 12/7/17
 * Time: 8:32 PM
 */
?>
<div class="overlay"></div>
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                <i class="fa fa-list-ul"></i> Danh mục
            </a>
        </li>
        <?php
        foreach ($list_category as $id => $item) {
            ?>
            <li class="sidebar-item">
                <a href="<?=base_url()?>category/<?=$item->cat_slug?>.html" title="<?php echo $item->category; ?>">
                    <?php echo $item->category; ?>
                </a>
            </li>
            <?php }
        ?>
    </ul>
</nav>
<div id="page-content-wrapper">
    <button type="button" class="hamburger hidden is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
    </button>
</div>
<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
            $(this).toggleClass('hamburger-toggle');
            $(this).toggleClass('hidden');
        });
    });
</script>
<!-- /#sidebar-wrapper -->