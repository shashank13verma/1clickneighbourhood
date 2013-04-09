<html>
<head>
<?php require_once 'config/constants.php'; ?>
<title><?php echo CLICK; ?><?PHP echo NEIGHBOURHOOD; ?> | </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-250.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
<div class="header">
    <div class="header_resize">
      <div class="logo">
                <h1><span>
                <img src="images/logo.jpg" id="logo"/></span>
                
                <span id="name"><?php echo CLICK; ?><small><?php echo NEIGHBOURHOOD; ?></small></span>
		<span id="registerSpan"><a href="<?php echo SITE_PATH?>index.php?controller=register&function=loadRegister"><img src="images/register3.png" id="register"/></a></span>
		<span id="loginSpan">
		<a href="<?php echo SITE_PATH?>index.php?controller=login&function=loadLogin" ><img src="images/login1.jpg" id="login"/></a>
		</span>
		</h1>
          <div><span id="loginTxt"><?php echo LOGIN; ?></span><span id="registerTxt"><?php echo REGISTER; ?></span></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
