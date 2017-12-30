<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>2048</title>

  <link href="<?=base_url()?>assets/web/game/2048/style/main.css" rel="stylesheet" type="text/css">
  <link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
  <link rel="apple-touch-icon" href="<?=base_url()?>assets/web/game/2048/meta/apple-touch-icon.png">
  <link rel="apple-touch-startup-image" href="<?=base_url()?>assets/web/game/2048/meta/apple-touch-startup-image-640x1096.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone 5+ -->
  <link rel="apple-touch-startup-image" href="<?=base_url()?>assets/web/game/2048/meta/apple-touch-startup-image-640x920.png"  media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)"> <!-- iPhone, retina -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1.0, maximum-scale=1, user-scalable=no, minimal-ui">
  <link href="favicon.ico" rel=”shortcut icon” />
    <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/web/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/fonts/font-awesome.min.css" rel="stylesheet">
</head>
<body>
  <header>
    <?php $this->load->view('layout_web/include/nav_quiz_view');?>
</header>
  <div class="container">
    <div class="header-g col-md-5">
      <div class="heading">
        <h1 class="title">2048</h1>
        <div class="scores-container">
          <div class="score-container" style="height: 60px;">0</div>
          <div class="best-container" style="height: 60px;">0</div>
          <div class="clearfix"></div>
        </div>

      </div>

      <div class="above-game">
        <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>
        <a class="restart-button">New Game</a>
      </div>
    </div>
    
    <div class="game-content col-md-7">
      <div class="game-container" style="margin-top: 0;margin-bottom: 20px;">
      <div class="game-message">
        <p></p>
        <div class="lower">
          <a class="keep-playing-button">Keep going</a>
          <a class="retry-button">Try again</a>
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>

      <div class="tile-container">

      </div>
    </div>
    </div>
    
  </div>

  <script src="<?=base_url()?>assets/web/game/2048/js/bind_polyfill.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/classlist_polyfill.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/animframe_polyfill.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/keyboard_input_manager.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/html_actuator.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/grid.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/tile.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/local_storage_manager.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/game_manager.js"></script>
  <script src="<?=base_url()?>assets/web/game/2048/js/application.js"></script>
