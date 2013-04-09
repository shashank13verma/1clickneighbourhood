<div id="viewUsers">
							<table id="viewUsersTable">
								<tr>
									<th class="viewUsersColumn"><?php echo NAME; ?></th>
									<th class="viewUsersColumn"><?php echo FLAT; ?></th>
									<th class="viewUsersColumn"><?php echo TOWER; ?></th>
									<th class="viewUsersColumn"><?php echo BLOCK; ?></th>
									<th class="viewUsersColumn"><?php echo SOCIETY_NAME; ?></th>
									<th class="viewUsersColumn"><?php echo OCCUPATION; ?></th>
									<th class="viewUsersColumn"><?php echo PHONE; ?></th>
									<th class="viewUsersColumn"><?php echo MOBILE; ?></th>
									<th class="viewUsersColumn"><?php echo DATE_OF_BIRTH; ?></th>
								</tr>
								<?php
								if(isset($arrData) && (!empty($arrData))){
							foreach($arrData as $value){
						?>
								<tr>
									<td class="viewUsersColumn"><?php 
									if(isset($value['first_name'])){
								echo $value['first_name']." ".$value['last_name'];
							}
							?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['flat'])){
								echo $value['flat'];
								}
								?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['tower'])){
								echo $value['tower'];
								}
								?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['block'])){
								echo $value['block'] ;
									}
									?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['name'])){
							echo $value['name'] ;
								}
								?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['master_code_values'])){
							echo $value['master_code_values'] ;
							}
							?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['phone'])){
							echo $value['phone'] ;
								}
								?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['mobile'])){
							echo $value['mobile'] ;
						}
						?></td>
									<td class="viewUsersColumn"><?php 
									if(isset($value['date_of_birth'])){
						echo $value['date_of_birth'] ;
							}
							?></td>
								</tr>
								<?php 
									
							}
								
							}
						?>
							</table>
						</div>
				<div class="clr"></div>
				<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>