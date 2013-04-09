<div id="viewUsers" >
						<form method="post">
							<table id="viewUsersTable">
								<tr>
								<th></th>
									<th class="viewUsersColumn"><?php echo NAME; ?></th>
									<th class="viewUsersColumn"><?php echo STATUS; ?></th>
									<th class="viewUsersColumn"><?php echo MOBILE; ?></th>
									<th class="viewUsersColumn"><?php echo EMAIL; ?></th>
									
								</tr>
								<?php 
								if(isset($arrData) && (!empty($arrData))){
							foreach($arrData as $value){
						?>
								<tr id="usersType">
									<td><input type="button" value="<?php echo DEACTIVATE_USER; ?>" onclick="confirmuser('<?php echo $value['email_address']?>')" /></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['first_name'])){
								echo $value['first_name']." ".$value['last_name'];
							}
							?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['status'])){
							echo $value['status'] ;
						}
						?></td>		
									
									
									<td class="viewUsersColumn"><?php 
									if(isset($value['mobile'])){
								echo $value['mobile'] ;
						}
						?></td>
								
									
									<td class="viewUsersColumn" id="email"><?php 
									if(isset($value['email_address'])){
							echo $value['email_address'] ;
						}
						?></td>	
								
							</tr>
							<?php }}
						?>
						
							</table>
						</form>
						</div>
					
		<div class="clr"></div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<script>
function confirmuser($arr){
	
	$email=$arr;

	
	$response=confirm("Are you sure you want to deactivate this User's Account");
	
	//alert($arr);
	 if($response)
	 {
		 $.ajax({
			type:'POST',
			url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncDeactivate",
			  data:'email='+$email,
			  success: function(response){
					window.location.href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncDeactivateUser";			
				}
		  }); 
		 
	  }
	  else{
	   window.location.href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncDeactivateUser";
	  }
	  
	
	
}
</script>