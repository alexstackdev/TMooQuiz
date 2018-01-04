<?php $this->load->view('layout_web/include/header'); ?>
<div class="wrapper">
    <header class="main-header">
        <?php $this->load->view('layout_web/include/nav'); ?>
    </header>
    <div class="container">
        <div class="row">
            <div class="title-page text-center col-md-12 col-sm-12 col-xs-12">
                <h1>
                    <span class="t-one">Tạo và</span><span class="t-two">chia sẻ</span><span class="t-three">đề thi trắc nghiệm</span><span class="t-four">trực tuyến</span>
                </h1>
            </div>
            <div class="search-form col-md-offset-2 col-md-8">
                <form action="<?=base_url()?>search.html" method="get" role="search" accept-charset="utf-8">
                    <div class="input-group">
                        <input type="text" class="form-control pull-left " name="s" id="key_word" value="" placeholder="Tìm tên môn học , id môn học"/>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"   id="open_file" ><span class="glyphicon glyphicon-search"></span> Tìm kiếm</button>
                        </span>
                    </div>
                </form>
                <div class="banner-homepage-top" style="margin-top: 1em;">
                    <?php if ($data_user['vip'] != 1): ?>
                        <?php $this->mcode->get_banner(1); ?>
                    <?php endif ?>

                </div>
            </div>
            <section class="section-cat">
                <div class="category col-md-12 col-sm-12 col-xs-12">
                    <h4 class="title"><div class="title-cat-homepage">Danh sách chuyên mục <i class="fa fa-heart"></i></div></h4>
                    <div class="cloud-img"></div>
                    <div class="book"><img src="<?=base_url()?>uploads/book_yellow.png" alt=""></div>
                    <div class="list-category">
                    <?php
                        foreach ($list_category as $key => $item) { ?>
                            <a href="<?=base_url()?>category/<?=$item->cat_slug?>.html" class="cat-link col-md-3 col-sm-4 col-xs-6">
                            <div class="cat-name text-center" id="cat-name-<?php echo $item->category_id;?>">
                                <h4><?php echo $item->category; ?></h4>
                            </div>
                            </a>
                        <?php
                        }
                     ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
	$color = ['#1abc9c','#2ecc71','#3498db','#9b59b6','#f1c40f','#e67e22','#e74c3c','#f39c12','#d35400','#c0392b','#27ae60','#2980b9'];
	$color.sort(function(){ return Math.random()-0.5; });
	$category = $('.cat-name');
	$category.each(function(){
		$(this).css('border-color',$color[0]);
		
		$(this).hover(function() {
			/* Stuff to do when the mouse enters the element */
			$css = $(this).css('border-color');
			$(this).css('background',$css);
		}, function() {
			/* Stuff to do when the mouse leaves the element */
			$(this).css('background','#fff');
		});
		$color.shift();
	})
</script>