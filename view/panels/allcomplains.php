<html>
<body>
	<div class="main">
					
		<fieldset class="addfieldset">
					
			<legend>Previous Complains</legend>
						
				<?php
					//print_r($arrData);die();
				echo "<br/>Resolved Complains<hr style='border: 2px dashed #000;'/>";?>
				<div id="complaint">
				
				<?php
				
						
					if(isset($arrData) && (!empty($arrData)))
					{
						
						foreach($arrData as $value){
							echo "<b>DESCRIPTION:</b>";
							echo $value['description']."<br/>";
							echo "<b>Creation Date and Time:</b>";
							echo $value['created_at']."<br/>";
                                                        echo "<b>Closing Date and Time:</b>";
							echo $value['deleted_at']."<br/>";
							echo "<b>Complain Created By:</b>";
							echo $value['first_name']."&nbsp";
							
							echo $value['last_name']."<br/>";
							echo "<b>Phone:</b>";
							echo $value['phone']."<br/>";
							
                                                        echo "<hr/>";
						}
						
					}
				
				?>
					
				</fieldset>
				
			    </div>
				
			    <div class="clr"></div>
			
		
	</div>
</body>
</html>