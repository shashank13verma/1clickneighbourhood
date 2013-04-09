<html>
<body>
	<div class="main">
					
		<fieldset class="addfieldset">
					
			<legend><?PHP ECHO COMPLAINT ?></legend>
				<a href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncPreviousComplains">View Previous Resolved Complains</a>		
				<?php
					//print_r($arrData);die();
				echo "<br/>Current Complains<hr style='border: 2px dashed #000;'/>";?>
				<div id="complaint">
				
				<?php
				
						
					if(isset($arrData) && (!empty($arrData)))
					{
						
						foreach($arrData as $value){
							echo "<b>DESCRIPTION:</b>";
							echo $value['description']."<br/>";
							echo "<b>Creation Time:</b>";
							echo $value['created_at']."<br/>";
							echo "<b>Created By:</b>";
							echo $value['first_name']."&nbsp";
							
							echo $value['last_name']."<br/>";
							echo "<b>Phone:</b>";
							echo $value['phone']."<br/>";?>
							<input type="button" value="Make it Resolved"  onclick="conformResolved('<?php echo $value['id'];?>')"/>
							<?php echo "<hr/>";
						}
						
					}
				
				?>
					</div>
				</fieldset>
				
				</div>
				
				<div class="clr"></div>
			</div>
		</div>
	</div>
</body>

<script>
	function conformResolved($argValue) {
	$id=$argValue;

	
	$response=confirm("Resolve this Complain");
	
	//alert($arr);
	if($response)
	{
		 $.ajax({
			type:'POST',
			url:"<?php echo SITE_PATH?>index.php?controller=admin&function=resolveComplain",
			  data:'id='+$id,
			  success: function(response){
					window.location.href="<?php echo SITE_PATH?>index.php?controller=complaint&function=fncComplaint";			
				}
		 
		  }); 
	}
	else{
	   window.location.href="<?php echo SITE_PATH?>index.php?controller=complaint&function=fncComplaint";
	}	
	}
</script>

