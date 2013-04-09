<?php 
include_once(MODEL_PATH.'/register.php');
$obj = new registerModel;
?>
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

</head>
<body>
<a href="" id="selectorTest"></a>
<form method="post" name="userRegister" id="userRegister" action="<?php echo SITE_PATH?>index.php?controller=register&function=validate">
<p><h3 id="head">Create a Free Account</h3></p>
		<p>Complete The Form below to create your account.
		<br/><b>Please note</b>:Your personal information is protected by our <u><b>Privacy Policy.</b></u></p>
		<p>Fields with (*) are required.</p>
		<div id="main-container">
		
			<div id="blank">
			
			</div>			
			<div id="div-register">
				<div id="div-header">
					<label><b>Registration Information</b></label>
				</div>
				<div id="div-reg">
				<table id="tb1">
					<tr>
						<td>Email Address
						<small class="mandatory">*</small>
						<small id="err1" style="color:red;"><?php if(isset($arrData["email_Err"]))
																	{echo $arrData["email_Err"];}?>
						</small>
						</td>
						<td>Retype Email Address
						<small class="mandatory">*</small>
						<small id="err2" style="color:red;"><?php if(isset($arrData["reemail_Err"])){
																	echo $arrData["reemail_Err"];}?>
						</small>
						</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="email_address" id="email_address" onblur="fncEmailValidate()" value="<?php if(isset($arrData['email'])){echo $arrData['email'];}?>"/>
						</td>
						<td >
							<input type="text" name="email_address_check" id="email_address_check" onblur="fncReEmailValidate()" value="<?php if(isset($arrData['reemail'])){echo $arrData['reemail'];}?>"/>
						</td> 
					</tr>
				</table>
				<table id="tb2">
					<tr>
						<td>
							<label>Password</label>
							<small class="mandatory">*</small>
							<small id="err3" style="color:red;"><?php if(isset($arrData["pass_Err"]))
																		{echo $arrData["pass_Err"]; }?></small>
						</td>
						<td>
							<label>Confirm Password</label>
							<small class="mandatory">*</small>
							<small id="err4" style="color:red;"><?php if(isset($arrData["conpass_Err"]))
																		{echo $arrData["conpass_Err"]; }?></small>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" id="password" onblur="fncPassValidate()" />
						</td>
						<td >
							<input type="password" name="conpassword" id="conpassword" onblur="fncRePassValidate()"/>
						</td>
					</tr>
				</table>
				</div>
				<div id="div-header">
					<label><b>Society Information</b></label>
				</div>
				<div id="div-soc">
				<table id="tb3">
					<tr>
					<td>
						<label>Society</label>
						<small class="mandatory">*</small>
						<small id="err5" style="color:red;"><?php if(isset($arrData['soc_Err']))
																{echo $arrData["soc_Err"];} ?></small>
					</td>
					<td>
						<label>Block</label>
						<small class="mandatory">*</small>
						<small id="err6" style="color:red;"><?php if(isset($arrData['blo_Err']))
															{echo $arrData["blo_Err"]; }?></small>
					</td>
					</tr>
					<tr>
					<td>
						<?php 
						$nSociety = 0;
							if(isset($arrData['socdrp'])){
								$nSociety = $arrData['socdrp'];
							}
						 ?>
						<select name="socdrp" id="socdrp" style="width: 150px;" onBlur="fncSocValidate(this.value)">
							<option value="0" <?php if($nSociety=="0") echo "selected";?>>Select:</option>
							<?php
								$obj->fncPopulateSocietyDropDown($nSociety);
							?>
						</select>
					</td>
					<td>
					<?php 
						$nblock = 0;
						if(isset($arrData['blodrp'])){
							$nblock = $arrData['blodrp'];
						} 
					?>
						<select style="width: 110px;" id="blodrp" name="blodrp" onBlur="fncBlockValidate(this.value)">
							<option value="0" <?php if($nblock=="0") echo "selected";?>>Select:</option>
							<?php
							//	$obj->fncPopulateBlockDropDown($nblock);
							?>																							
						</select>
					</td>
					</tr>
				</table>
				<table id="tb4">
					<tr>
						<td>Tower
						<small class="mandatory">*</small>
						<small id="err7" style="color:red;"><?php if(isset($arrData['tow_Err'])){
																	echo $arrData["tow_Err"]; 
						}?></small>
						</td>
						<td>Floor
						<small class="mandatory">*</span>
						<small id="err8" style="color:red;"><?php if(isset($arrData['flo_Err'])){
																	echo $arrData["flo_Err"]; 
						}?></small>
						</td>
						<td>Flat No
						<small class="mandatory">*</small>
						<small id="err9" style="color:red;"><?php  if(isset($arrData['fla_Err'])){
																	echo $arrData["fla_Err"]; 
						}?></small>
						</td>
					</tr>
					<tr>
						<td>
						<?php 
						$ntower = 0;
						if(isset($arrData['towdrp'])) {
							$ntower = $arrData['towdrp'];
						} ?>
						<select style="width: 115px;" id="towdrp" name="towdrp" onBlur="fncTowerValidate(this.value)">
							<option value="0" <?php if($ntower=="0") echo "selected";?>>Select:</option>																						{echo $arrData['towdrp']; }?>">
						<?php 
					//	$obj->fncPopulateTowerDropDown();
						?>
						</select>
						</td>
						<td>
						<?php 
						$nfloor = 0;
						if(isset($arrData['flodrp'])){
							$nfloor = $arrData['flodrp'];
						} 
						?>
						<select style="width: 115px;" id="flodrp" name="flodrp" onblur="fncFloorValidate(this.value)">
							<option value="0" <?php if($nfloor==0) echo "selected";?>>Select:</option>
							<?php 
						//	$obj->fncPopulateFloorDropDown();
							
							?>
						</select>
						</td>
						<td>
						<?php 
						$nflat = 0;
						if(isset($arrData['fladrp'])){
							$nflat = $arrData['fladrp'];
						} 
						?>
						<select style="width: 120px;" id="fladrp" name="fladrp" onblur="fncFlatValidate()">
		
							<option value="0" <?php if($nflat==0) echo "selected";?>>Select:</option>
							<?php
						//		$obj->fncPopulateFlatDropDown();
							?>
						</select>
						</td>
					</tr>
				</table>
				</div>
				<div id="div-header">
					<label><b>Personal Information</b></label>
				</div>
				<div id="div-per">
				<table id="tb5">
				<tr>
				</td>
					<td>
						Title
					</td>
					<td>First Name
						<small class="mandatory">*</small>
						<small id="err10" style="color:red;"><?php if(isset($arrData['flr_Err']))
																{echo $arrData["flr_Err"];}?>
						</small>
					</td>
					<td>Last Name
						<small class="mandatory">*</small>
						<small id="err11" style="color:red;"><?php if(isset($arrData['las_Err']))
																{echo $arrData["las_Err"];}?>
						</small>
				</tr>
				<tr>
					<td>
						<select style="width: 50px;" name="title">
							<option value="0">Select:</option>
							<option value="1">Mr.</option>
							<option value="2">Ms.</option>
							<option value="3">Mrs.</option>
						</select>
					</td>
					<td><input type="text" name="first_name" id="first_name" onblur="fncFirstValidate()" value="<?php if(isset($arrData['first_name']))
																												{echo $arrData['first_name'];}?>"/>
					</td>
					<td><input type="text" name="last_name" id="last_name" onblur="fncLastValidate()" value="<?php if(isset($arrData['last_name']))
																												{echo $arrData['last_name'];}?>"/>
					</td> 
					
				</tr>
				</table>
				<table id="tb6">
				<tr>
					<td>Phone
					<small class="mandatory">*</small>
					<small id="err12" style="color:red;"><?php if(isset($arrData['pho_Err']))
																{echo $arrData['pho_Err'];}?>
					</small>
					</td>
					<td><label>Mobile</label>
						<small id="err15" style="color:red;"><?php if(isset($arrData["mob_Err"]))
																		{echo $arrData['mob_Err'];}?>
						</small>
					
					</td>
					
				</tr>
				<tr>
					<td><input type="text" name="phone" id="phone" onblur="fncPhoneValidate()" value="<?php if(isset($arrData["phone1"]))
																			
						{echo $arrData["phone1"];}?>"/>
					</td>
					<td><input type="text" name="mobile" id="mobile" maxlength=10 onblur="fncMobileValidate()" value="<?php if(isset($arrData['mobile']))
																													{echo $arrData["mobile"];}?>"/>
					</td> 
				</tr>
				<tr>
					<td>dob
					</td>
					<td><input type="text" name="dob" id="dob"/></td> 
				</tr>
				
				</table>
				<table id="tb7">
				<tr>
					
					<td>
						Occupation
						<small class="mandatory">*</small>
						<small id="err14" style="color:red;"><?php if(isset($arrData['occ_Err']))
															{echo $arrData["occ_Err"];}?></small>
					</td>
					<td>
						Blood Group
					</td>
				</tr>
				<tr>
				
					<td>
						<select style="width: 160px;" id="occdrp" name="occdrp" onblur="fncOccValidation()" value="<?php if(isset($arrData['occdrp']))
											{echo $arrData['occdrp'];}?>">
							<option value="0">Select:</option>				
							<?php
								$obj->fncPopulateOccupationDropDown();
							?>
						</select>
					</td>
					<td>
					
						<select style="width: 120px;" name="blooddrp" id="Blodrp">
							
							<?php 
								$obj->fncPopulateBloodDropDown();
							
							?>
						</select>
					</td>
				</tr>
				</table>
				</div>
				<div id="div-header">
					<label><b>Terms of Use</b></label>
				</div>
				<div id="div-terms">
					<table>
						<tr>
							<label>By clicking Sign Up, you agree to 1CLICKNEIGHBOURHOOD<a href="javascript:void(0)" onclick="fncOpenLogin('view/privacy.html','selectorTest')">Terms of Use & Privacy Policy</a></label></tr>
					</table>
				</div>
					<input name="submit" type="submit" id="register" value="Sign Up" onclick="fncTermsValidation()" style="margin-top: 10px;border-radius: 5px;" >
					
				</div>
			</form>						
			</div>
</body>
</html>
<script>
function fncOpenLogin(url,argSelector){
	alert(url);
    $("#"+argSelector).attr("href",url);
	$("#"+argSelector).trigger("click");   
}

$(document).ready(function() {
    $("#selectorTest").fancybox({
        'width'			: '60%',
        'height'		: '70%',
        'autoScale'		: false,
        'transitionIn'		: 'none',
        'transitionOut'		: 'none',
        'type'			: 'iframe'
    });

    $("#dob").datepicker({
        
        
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date('1960-01-01'),
        maxDate: new Date('2000-01-01')
    });
    
});
</script>