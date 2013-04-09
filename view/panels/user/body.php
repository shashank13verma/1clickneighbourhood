<?php include 'sidebaruser.php';?>
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-250.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>

<div id="sidebardiv">
			 
		<div id="society_pics">
		
		<marquee id="picsSocietyPage" onmouseover="this.stop();" onmouseout="this.start();">
		
<?php
if(isset($arrData) && (!empty($arrData))){
	foreach($arrData as $key=>$value){
		if($key==4)
		{
			$i=1;
			foreach($value as $key=>$value){?>
	
		<img src="view/socgallery/images/<?php echo $value['file_name'];?>" style="width:300px;height:300px;padding-right:30px;"/>
		
<?php 
	
			}	
		}	
	}
}
?>
</marquee>
</div>
		
			<div id="noticemid">
		 <span id="notice">
		 <div class="topicsheader">
			<?php echo NOTICE; ?>
		</div>
		<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
<?php 
foreach($arrData as $key=>$value){ 
	if($key==1){
		$i=1;
		foreach($value as $key=>$value){
			if($key==0){							
				echo "<br/><b>DESCRIPTION:</b>";
				echo $value."<br/>";
			}
			else{
				echo "<b>Posted On:</b>";
				echo $value."<br/>";
				echo "<hr/>";
			}
			$i++;
		}	
	}
}?>
		</marquee>
		</span>
		<span id="advertisement">
		<div class="topicsheader">
			<?php echo ADVERTISEMENT; ?>
		</div>
		<a href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncaddAdvertisement">Post Your Advertisement Here</a>
					<?php
					echo "<br/>All Advertisement";
					?>
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
					<?php
					 if(isset($arrData) && (!empty($arrData))){
						foreach($arrData as $key=>$value){					
							if($key==2){
								foreach($value as $key=>$value){
								echo "<b>Category:</b>";
								echo $value['master_code_values']."<br/>";
								echo "<b>First Name:</b>";
								echo $value['first_name']."<br/>";
								echo "<b>Last Name:</b>";
								echo $value['last_name']."<br/>";
								echo "<b>Contact:</b>";
								echo $value['phone']."<br/>";
								echo "<b>Description:</b>";
								echo $value['description']."<br/>";
								echo "<hr/>";
								}	
							}
						}
					}
					?>
					</marquee>
		</span>
		<span id="polls">
		<div class="topicsheader">
			<?php echo POLLS; ?>
		</div>
			<marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();">
		<?php 
	if(isset($arrData) && !empty($arrData)){
		foreach($arrData as $key=>$value){
{
	if($key==3)
	{
		foreach($value as $key=>$data){
			
?>
<div><a href="<?php echo SITE_PATH?>index.php?controller=poll&function=fncPollresults&pollid=<?php echo $data['id']?>"><?php echo $data['topic']; }}}}}?></a></div>
			</marquee>	
		</span>
	
	
	</div>
	<div class="clr"></div>
	<div id="addsdiv">
		<span id="adds">
						<div id="coin-slider">
					<a href="#"> <img src="images/add1.jpeg" width="1125px" height="300"
						alt="" id="events" />
					</a> <a href="#"><img src="images/add2.jpeg" width="960" height="320"
						alt="" />
					</a> <a href="#"><img src="images/add3.jpeg" width="960" height="320"
						alt="" />
					</a> <a href="#"><img src="images/add4.jpg" width="960" height="320"
						alt="" /><
					</a><a href="#"><img src="images/add5.jpg" width="960" height="320"
						alt="" />
					</a>
				</div>

				<div class="clr"></div>
			
		</span>
		
		</div>
	</div>