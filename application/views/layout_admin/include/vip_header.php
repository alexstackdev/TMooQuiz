<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Quiz Admin 2.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="<?=base_url()?>favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style2.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
    <link rel="manifest" href="<?=base_url()?>manifest.json">
    <!-- MetisMenu CSS -->
    <link href="<?=base_url()?>assets/metisMenu/metisMenu.min.css" rel="stylesheet">
     <!-- DataTables CSS -->
    <link href="<?=base_url()?>assets/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/js/card.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url()?>assets/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/js/card.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<div id="wrapper">
<header id="header-admin">
    <?php $this->load->view('layout_admin/include/vip_nav_admin'); ?>
</header><!-- /header-admin -->