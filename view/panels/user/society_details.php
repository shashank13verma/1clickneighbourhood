<form>
				<fieldset class="addfieldset">
					
					<legend><?PHP echo SOCIETY_DETAILS; ?></legend>
					
					<?php
					//print_r($arrData);die();
					//echo "<b><br/>All Notices<br/></b>";
					?><div id="societydetailspage">
					<?php 
					//$i=1;
					if(isset($arrData) && (!empty($arrData)))
					{
						
						foreach($arrData as $value){
							//if(($i%2)!=0){
							echo "<br/><b>Society Name: </b>";
							echo $value['name']."<br/>";
							
							echo "<br/><b>Company Name: </b>";
							echo $value['company_name']."<br/>";
							
							echo "<br/><b>Owner Name: </b>";
							echo $value['owner_name']."<br/>";
							
							echo "<br/><b>Office Address: </b>";
							echo $value['office_address']."<br/>";
							
							echo "<br/><b>City: </b>";
							echo $value['city']."<br/>";
							
							echo "<br/><b>Pincode: </b>";
							echo $value['pincode']."<br/>";
							}
							
							//$i++;
						
						
					}
					?>
					</div>
				</fieldset>
				</form>
				
				
				<div class="clr"></div>
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>