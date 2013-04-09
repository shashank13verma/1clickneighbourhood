<?php require_once('././config/constants.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo CLICK ?><?PHP echo NEIGHBOURHOOD ?> | </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>


<script>
$(document).ready(function(){
    $("#subMenuLogout").hover(
        function(){//onmouseover
            $("#subMenuLogout ul").slideDown();
        },
        function(){//onmouseout
            $("#subMenuLogout ul").delay(200).slideUp();
        });
     
});
</script>
<script type="text/javascript" language="javascript">
		function callThis(value)
		{
			 $.ajax({
				type:"POST",
				url : "<?php echo SITE_PATH?>index.php?controller=search&function=fncSearch",
				data : "search="+value,
				success : function(response)
				{
					$("#searchDiv").html(response);
				},
			 });
		}
				
	</script>
</head>
<body>
<div class="main">
	<div id="panel_bar">
	
					
						<span id="barName">
						<span id="barClick"><?PHP echo CLICK; ?></span><small id="barSmall"><?PHP echo NEIGHBOURHOOD ?> </small>
						</span>
						
						
						
						
	<span id="logoutbar">
	<span  id="menulogout">
	<ul style="list-style:none" id="subMenuLogout">
	<li >
	<img src="images/settings.png" height='30px' style="margin-top:-5px;"/>
	<ul style="list-style-type:none;display:none" id="logout">
						<b><a href="index.php?controller=user&function=userPanelController"><li><?php echo SOCIETY_HOME; ?></li></a></b>
						<b><li><a href="index.php?controller=user&function=fncUserProfile"><?php echo MY_PROFILE; ?></a></li></b>
						<b><li><a href="index.php?controller=admin&function=adminPanelController"><?php echo ADMIN_PAGE; ?></a></li></b>
						<b><li><a href="index.php?controller=user&function=fncResponseUser"><?php echo DEACTIVATE; ?></a></li></b>
						<b><li><a href="index.php?controller=login&function=fnclogoutRedirect"><?php echo LOGOUT; ?></a></li></b>
						
						</ul>
						</li>
						</ul>
	
	
	</span>
	
	</span>
	
	</div>
		<div class="header">
			<div class="header_resize">
				
					
						<div class="clr"></div>
						<!-- <input type="text" name="searchbox" id="searchbox" onkeyUp="callThis(this.value)"/>  -->	
						
						
						<span id="username">
							
							
								<img src="images/userpic.gif"
										width="20px" height="20px" vspace="0px" hspace="10px" />  <em>
										<?php echo $_SESSION['firstname']; ?> 
								</em>|<em><?PHP echo $_SESSION['society']; ?> 
								
		
		
								</em>
						
						</span>
				<div class="clr"></div>

			</div>
		</div>
	</div>