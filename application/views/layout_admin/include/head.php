<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Quiz Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
</head>
<body>
<div id="wrapper">
<header id="header-admin">
    <?php $this->load->view('layout_admin/include/nav_admin'); ?>
</header><!-- /header-admin -->