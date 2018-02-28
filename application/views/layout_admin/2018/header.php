<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 2/2/18
 * Time: 10:59 PM
 */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Quiz Admin 2.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="<?=base_url()?>favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style2.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/js/card.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/2018/dist/css/custom.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/2018/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/2018/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/2018/dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php if (!empty($current_id)): ?>
        <script type="text/javascript">
            $(function(){
                $('footer').html('');
            })
        </script>
    <?php endif ?>

</head>
<body class="hold-transition skin-blue fixed">
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-88817147-1', 'auto');
    ga('send', 'pageview');
</script>
