<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title><?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta itemprop="name" content="><?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến ">
    <meta property="og:title" content="><?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến" />
    <meta name="revisit-after" content="1 days" />
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="keywords" content="TMoo, TMoo trắc nghiệm , TMoo trac nghiem, TMoo pest, tmoo quiz , tmoo trac nghiem quiz , quiz hubt ,tmoo hubt, trac nghiem tmoo ,pest hubt , on thi hubt , on thi trac nghiem hubt, trac nghiem hubt, pest trac nghiem hubt, phan mem on thi trac nghiem hubt, pesthubt"/>
    <meta name="description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0"/>
    <meta itemprop="description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0">
    <meta property="og:description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0" />
    <meta property="og:title" content="<?php echo $quiz_info['title'];?> | TMooQuiz 2.0"/>
    <meta itemprop="image" content="http://www.pesthubt.com/libs/logo.png">
    <meta property="og:image" content="http://www.pesthubt.com/libs/logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.pesthubt.com/" />
    <meta property="og:site_name" content="PESTHUBT.COM | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến" />
    <link href="favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/web/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
    <?php if (!empty($current_id)): ?>
        <script type="text/javascript">
        $(function(){
            $('footer').css('display', 'none');
        })
        </script>
    <?php endif ?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=151017315247923";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
