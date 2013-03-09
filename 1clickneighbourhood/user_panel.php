<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User | Panel</title>
<?php include_once 'constants.php';?>
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
<div class="main subpage">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="user_panel.php">1<span>Click</span><small>Neighbourhood</small></a></h1>
        <a href="user_panel.php"><img src="images/userpic.gif" width="20px" height="20px" vspace="0px" hspace="10px"/></a>
        <em> UserName </em>|<em> <a href="#">Society Name</a></em>
      </div>
      
      <div class="clr"></div>
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="user_panel.php"><span>Home</span></a></li>
          <li><a href="#"><span>Advertise</span></a></li>
          <li ><a href="#"><span>Forum</span></a></li>
          <li><a href="#"><span>Polls</span></a></li>
          <li><a href="#"><span>Complain Box</span></a></li>
          
        </ul>
      </div>
      <div class="clr"></div>
      
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <span id="welcome">Welcome</span><a href="#"><span id="edit_details">Edit Details</span><span ><img src="images/edit1.jpg"  width="20px" id="edit_details-img" height="20px" vspace="0px" hspace="10px"/></span></a>
         <span>
         <p>
          <table width="100%">
           <tr>
            <td width="14%" height="20px"><strong><?php echo NAME;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo EMAIL;?></strong></br></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo FLAT_NO;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%"><strong><?php echo TOWER;?></strong></td>
            <td width="2%">:</td>
            <td width="84%"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo BLOCK;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo SOCIETY_NAME;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo OCCUPATION;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo PHONE;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo MOBILE;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
           <tr>
            <td width="14%" height="20px"><strong><?php echo DATE_OF_BIRTH;?></strong></td>
            <td width="2%" height="20px">:</td>
            <td width="84%" height="20px"></td>
           </tr>
          </table>
          </p>
         </span>
          <div class="clr"></div>
          
         </div> 
           
      </div>  
       
      
      <div class="sidebar">
        <div class="gadget">
          <h2 class="star"><span>Notice</span> Board </h2>
          <div class="clr"></div>
          Notice will displayed in marquee
          <br/><br/><br/>
          <p align="justify"><b>Note: There is not any menu option for update details of user.  It will be displayed on onclick event of user pic on top left corner.</b></p>
          
        </div>
        <div class="gadget">
          <h2 class="star"><span>Governing Body</span></h2>
          In this RWA governing body memebers list will be displayed. 
          <div class="clr"></div>
          
        </div>
        
      </div>
      <div class="clr"></div>
    </div>
  </div>
  
  <div class="footer">
    <div class="footer_resize">
      <p class="lf" align="center">&copy; Copyright </p>
      <p class="rf"></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>