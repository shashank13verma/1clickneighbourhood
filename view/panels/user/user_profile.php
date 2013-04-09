<div id="userDivMain">
						<span id="userDivDetails">
						<span id="welcome"><?PHP echo WELCOME; ?> </span><a href="<?php echo SITE_PATH?>index.php?controller=user&function=fncEditDetails"><span
							id="edit_details"><?PHP echo EDIT_DETAILS; ?></a> </span><span><img
								src="images/edit1.jpg" width="20px" id="edit_details-img"
								height="20px" vspace="0px" hspace="10px" /> </span>
								
								<table id="userTable">
						
							<table id=userLeft>
							<tr><td><label class="userLeftClass"><?php echo EMAIL;?> </label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo NAME;?></label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo FLAT_NO;?> </label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo TOWER;?> </label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo BLOCK;?></label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo SOCIETY_NAME;?></label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo OCCUPATION;?></label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo PHONE;?> </label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo MOBILE;?> </label></td></tr>
							<tr><td><label class="userLeftClass"><?php echo DATE_OF_BIRTH;?></label></td></tr>
							</table>
							
							
							<table id="userRight">
							<?php 
							if(isset($arrData) && (!empty($arrData))){
								foreach($arrData as $value){?>
								<tr><td class="userDiv" id="emailDiv"><?php 
							if(isset($value['email_address'])){
									echo $value['email_address']."<br/>";
								}
								?>
								</td></tr>
								<tr><td class="userDiv"><?php 
							 if(isset($value['first_name'])){
								echo $value['first_name']." ".$value['last_name']."<br/>";
							}	
							?>
															</td></tr>
								
							<tr><td class="userDiv"><?php
									 if(isset($value['flat'])){
										echo $value['flat']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['tower'])){
										echo $value['tower']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['block'])){
										echo $value['block']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['name'])){
										echo $value['name']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['master_code_values'])){
										echo $value['master_code_values']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['phone'])){
										echo $value['phone']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['mobile'])){
										echo $value['mobile']."<br/>";
									}?>
								</td></tr>
									<tr><td class="userDiv"><?php
									if(isset($value['date_of_birth'])){
										echo $value['date_of_birth']."<br/>";
									}?>
								</td></tr>
									<?php 
								}
								}?>
								
								</table>
								
							</table>
						</span>
						<span id="addsDiv">
							<marquee direction="up" height=500px;>
					<img src="images/add1.jpeg" width="400" height="250"
						alt="" class="adds"/>
					<img src="images/add2.jpeg" width="400" height="250"
						alt=""  class="adds"  />
					<img src="images/add3.jpeg" width="400" height="250"
						alt=""  class="adds" />
					<img src="images/add4.jpg" width="400" height="250"
						alt=""  class="adds" />
					<img src="images/add5.jpg" width="400" height="250"
						alt=""  class="adds" />
					
							
							
							</marquee>
						</span>
						</div>
					
					


				
				
				<div class="clr"></div>
				<br/><br/>