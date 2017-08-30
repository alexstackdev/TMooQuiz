<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title><?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta itemprop="name" content="<?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến ">
    <meta name="revisit-after" content="1 days" />
    <meta name="author" content="pesthubt.com">
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="keywords" content="TMoo, TMoo trắc nghiệm , TMoo trac nghiem, TMoo pest, tmoo quiz , tmoo trac nghiem quiz , quiz hubt ,tmoo hubt, trac nghiem tmoo ,pest hubt , on thi hubt , on thi trac nghiem hubt, trac nghiem hubt, pest trac nghiem hubt, phan mem on thi trac nghiem hubt, pesthubt"/>
    <meta name="description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0"/>
    <meta itemprop="description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0">
    <meta property="og:description" content="<?php echo $quiz_info['description']; ?> | TMooQuiz 2.0" />
    <meta property="og:title" content="<?php echo $quiz_info['title'];?> | Ứng dụng tạo và chia sẻ đề thi trắc nghiệm trực tuyến"/>
    <meta itemprop="image" content="<?=base_url()?>uploads/logo.png">
    <meta property="og:image" content="<?=base_url()?>uploads/logo.png" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo $quiz_info['url'];?>" />
    <link rel="canonical" href="<?php echo $quiz_info['url']; ?>" />
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
            $('footer').html('');
        })
        </script>
    <?php endif ?>
    <?php if ($data_user['vip'] != 1): ?>
      <!-- Popunder Code-->
      <script type="text/javascript" data-cfasync="false">
      /*<![CDATA[/* */
        var _pop = _pop || [];
        _pop.push(['siteId', 2073430]);
        _pop.push(['minBid', 0]);
        _pop.push(['popundersPerIP', 50]);
        _pop.push(['delayBetween', 1800]);
        _pop.push(['default', false]);
        _pop.push(['defaultPerDay', 0]);
        _pop.push(['topmostLayer', false]);
        (function() {
          var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
          var s = document.getElementsByTagName('script')[0]; 
          pa.src = '//c1.popads.net/pop.js';
          pa.onerror = function() {
            var sa = document.createElement('script'); sa.type = 'text/javascript'; sa.async = true;
            sa.src = '//c2.popads.net/pop.js';
            s.parentNode.insertBefore(sa, s);
          };
          s.parentNode.insertBefore(pa, s);
        })();
      /*]]>/* */
      </script>
      <!-- PopAds.net Popunder Code End -->
    <?php endif ?>
    
</head>
<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-88817147-1', 'auto');
  ga('send', 'pageview');
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=151017315247923";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
