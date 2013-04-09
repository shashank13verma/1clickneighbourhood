				<form>
				<fieldset class="addfieldset">
					
					<legend><?PHP echo NOTICE; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ALL_NOTICE."<br/></b>";
					?><div id="noticepage">
					<?php 
					$i=1;
					if(isset($arrData) && (!empty($arrData)))
					{
						
						foreach($arrData as $key=>$value){
							if(($i%2)!=0){
							echo "<br/><b>".DESCRIPTION." </b>";
							echo $value."<br/>";
							}
							else{
							echo "<b>".POSTED_ON." </b>";
							echo $value."<br/>";
							echo "<hr/>";
							}
							$i++;
						}
						
					}
					?>
					</div>
				</fieldset>
				</form>
				
				
				<div class="clr"></div>
