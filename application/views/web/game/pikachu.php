<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28/08/2017
 * Time: 9:04 CH
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <title>Pikachu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base href=""/>
    <script type="text/javascript" src="<?=base_url()?>assets/web/game/pikachu/js/pikachu1.js"></script>
    <link type="text/css" rel="Stylesheet" href="<?=base_url()?>assets/web/game/pikachu/css/pikachu.css">
    <link href="favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/web/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">
        var oStaticURL='<?= base_url().'assets/web/game/pikachu/'?>';
        jh.ready(
            function(){
                jh("#maintable").attr("class","mt"+Math.round(Math.random(4)+1));
                var el;
                loadImage();
            }
        );
    </script>
    <script>
        function addEvent(obj, eventName, func) {
            if (obj.attachEvent){
                obj.attachEvent("on" + eventName, func);}
            else if(obj.addEventListener){
                obj.addEventListener(eventName, func, true);}
            else{
                obj["on" + eventName] = func;}
        }

    </script>
    <link type="text/css" rel="Stylesheet" href="<?=base_url()?>assets/web/game/pikachu/css/pikachu2.css">
</head>

<body>
<header>
    <?php $this->load->view('layout_web/include/nav_quiz_view');?>
</header>
<div class="container-fluid">
    <div class="row">
<div id="loading" class="style11" align="center">
    <table id="maintable" width="956" align="center" style="visibility: visible; border: 1px dashed rgb(255, 255, 255);" class="mt2">
        <tbody><tr>
            <td class="status">
                <div align="center">
                    <span id="level">1</span>
                    <span id="blood">10</span>
                    <span id="score">0</span>
                </div>
            </td>
            <td id="board" class="playing"></td>
            <td class="timebar" valign="bottom">
                <div id="timebar" style="height: 375px;"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" id="change_sound" name="Button" class="soundOn" value="Tắt âm thanh" onclick="el.changesound()">
                <input type="button" name="Button" id="change_block" value="Đổi vị trí" onclick="change_block()">
                <input type="button" id="gReplay" name="Button" value="Chơi lại" onclick="el.disp_confirm()">
            </td>
        </tr>
        </tbody></table>
</div>
<script type="text/javascript" src="<?=base_url()?>assets/web/game/pikachu/js/pikachu2.js"></script>
<audio id="audiosound2" __idm_id__="139265"><source src="<?=base_url()?>assets/web/game/pikachu/sound/sound2.mp3"><source src="sound/sound2.ogg"></audio>
<audio id="audiosound1"><source src="<?=base_url()?>assets/web/game/pikachu/sound/sound1.mp3"><source src="sound/sound1.ogg"></audio>
<audio id="audiosound4"><source src="<?=base_url()?>assets/web/game/pikachu/sound/sound4.mp3"><source src="sound/sound4.ogg"></audio>
    </div>
</div>
