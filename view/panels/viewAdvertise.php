<form>
				<fieldset class="addfieldset">
					
					<legend><?PHP echo ADVERTISEMENT; ?></legend>
					<a href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncaddAdvertisement"><b><?php echo POST_ADD_HERE; ?><br/></b></a>
					<?php
					echo "<b><br/>".ALL_ADDS."</b>";
					?> <div id="advertismentpage">
					<?php if(isset($arrData) && (!empty($arrData)))
					{
						
						foreach($arrData as $value){
							echo "<br/>";
							echo "<b>".CATEGORY." </b>";
							echo $value['master_code_values']."<br/>";
							echo "<b>".FIRST_NAME." </b>";
							echo $value['first_name']."<br/>";
							echo "<b>".LAST_NAME." </b>";
							echo $value['last_name']."<br/>";
							echo "<b>".PHONE." </b>";
							echo $value['phone']."<br/>";
							echo "<b>".DESCRIPTION." </b>";
							echo $value['description']."<br/>";
							
							echo "<hr/>";
						}
						
					}
					?>
					</div>
				</fieldset>
				</form>
				<div class="clr"></div>