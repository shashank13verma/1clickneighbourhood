<html>
<head>

</head>
<body>
	<div class="main">

		<div class="content">
			<div class="content_resize">
				<div class="mainbar">
					<div class="article">
						<div class="sidebarLeft">
							<div class="gadget">
								<h2 class="star">
									<span> <?php echo ADMIN_ROLES ?>
									</span>
								</h2>
								<div class="clr"></div>
								
								<ul class="sb_menu">
									<li><a
										href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncLoadUsers"><?PHP ECHO VIEW_USERS ?>
									</a>
									</li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncLoadType"><?PHP ECHO ADD__RWA_MEMBER ?> </a>
									</li>
									<li><a href="" onclick="addBlock()"><?PHP ECHO ADD_BLOCK ?> </a>
									</li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncLoadAdds"><?PHP ECHO "Authorize Adds" ?> </a>
									</li>
									<li><a
										href="<?php echo SITE_PATH?>index.php?controller=complaint&function=fncComplaint"><?PHP ECHO COMPLAINT ?> </a>
									</li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncSelectBlock"><?PHP ECHO ADD_TOWER ?> </a>
									</li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncSelectTower" ><?PHP ECHO ADD_FLAT ?> </a>
									</li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncAddNotice"><?PHP ECHO ADD_NOTICE ?> </a>
									</li>
									
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncLoadGallery">Add Images</a></li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncDeactivateUser">Deactivate User</a></li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncviewBlock">View</a></li>
									<li><a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncBlooodgrp">Sort Member by Blood Group</a></li>
								</ul>
								
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
							</div>
							</body>
							<script>
function addBlock()
{
	$block=prompt("Enter Block Name");
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncAddBlock",
		data:"block="+$block,
		success: function(response){
			
		}
	

	});
			
}
function addFlat()
{
	$flat=prompt("Enter Flat Name");
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncAddFlat",
		data:"flat="+$flat,
		success: function(response){
			
		}
	

	});
			
}
							</script>
							</html>
