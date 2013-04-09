<?php if(empty($arrData)) 
							{
							echo "<br/><b>".NO_NEW_ADDS."</b>";
							?><div class="clr"></div>
							<?php }
							else{
		
		?>			
												
						<div id="viewUsers" >
						<form method="post">
							<table id="viewUsersTable">
								<tr>
								<th></th>
									<th class="viewUsersColumn"><?php echo NAME; ?></th>
									<th class="viewUsersColumn"><?php echo DESCRIPTION; ?></th>
									<th class="viewUsersColumn"><?php echo INTERESTED_IN; ?></th>
									<th class="viewUsersColumn"><?php echo PHONE; ?></th>
									
								</tr>
								<?php 
								if(isset($arrData) && (!empty($arrData))){
							foreach($arrData as $value){
						?>
								<tr id="usersType">
									<td><input type="button" value="<?php echo AUTHORIZE_ADDS?>"  onclick="confirmuser('<?php echo $value['id']?>')"/></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['first_name'])){
								echo $value['first_name']." ".$value['last_name'];
							}
							?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['description'])){
								echo $value['description'];
						}
						?></td>		
									
									
									<td class="viewUsersColumn"><?php 
									if(isset($value['master_code_values'])){
								echo $value['master_code_values'] ;
						}
						?></td>
								
									
									<td class="viewUsersColumn" id="email"><?php 
									if(isset($value['phone'])){
							echo $value['phone'] ;
						}
						?></td>	
								
							</tr>
							<?php }}
						?>
						
							</table>
						</form>
						</div>
					</div>
		<div class="clr"></div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php }?>
		<script>
			function confirmuser($arr){
	
	$id=$arr;

	
	$response=confirm("Authorize this Add");
	
	//alert($id);
	 if($response)
	 {
		 $.ajax({
			type:'POST',
			url:"<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncAuthorizeAdds",
			  data:'id='+$id,
			  success: function(response){
					window.location.href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncLoadAdds";			
				}
		  }); 
		 
	  }
	  else{
	   window.location.href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncLoadAdds";
	  }
	  
	
	
}
</script>