<?php 
include_once(MODEL_PATH.'/register.php');
$obj = new registerModel;
?>
<link rel="stylesheet" href="cs/jquery-ui.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/reg_validation1.js"></script>

<style type="text/css">
#main-container{
	width:  1024px;
	height: 768px;
	
	
}
#blank{
	width:15px;
	height:665px;
	float:left;
	
}
#div-register{
	
	width: 800px;
	height: 800px;
	float:left;
	
}
#div-header{
	width:600px;
	height: 25px;
	background-color: #fc6400;
	text-indent: 8px;
	color: white;
	
	
}
#div-reg{
	
		background-color: #ededed;
}
#tb1{
	padding-top:15px;
	text-indent: 8px;
}

#tb2{
	
	padding-top: 15px;
	text-indent: 8px; 
	padding-bottom: 15px;
	
}
#tb3{
	padding-top:15px;
	text-indent: 8px;
	
}
#tb4{
	padding-top: 15px;
	text-indent: 8px; 
	padding-bottom: 15px;
	
}
#div-soc{
		background-color: #ededed;
}
#tb5{
	padding-top:15px;
	text-indent: 8px;
	
}
#tb6{
	padding-top: 15px;
	text-indent: 8px; 
	padding-bottom: 15px;
}
#tb7{
	text-indent: 8px;
	padding-bottom: 20px;
}
#div-per{
	
		background-color: #ededed;
}
#div-terms{
	
		background-color: #ededed;
}
#head{
	color:#464646;
		font: normal 24px "Liberations sans", Arial, Helvetica, sans-serif;
}
p{
	color:#464646;
	font: normal 14px/1.5em "Liberations sans", Arial, Helvetica, sans-serif;
	
}
.mandatory{
	color:#fc6400;

}
td{
	width:300px;
	padding-top:10px;
}
</style>
<script type="text/javascript" src="reg_validation.js">
	
</script>
<div class="addfieldset">
<form method="post" name="userRegister" id="userRegister" action="<?php echo SITE_PATH?>index.php?controller=user&function=fncValidateUser">
		
		<div id="main-container">
		
			<div id="blank">
			<?php foreach($arrData as $value)
			{?>
			</div>			
			<div id="div-register">
				<label>
							Email Address:<?php 
												echo $value['email_address'];
							}?>
				</label>
				<div id="div-header">
					<label><b>PassWord Information</b></label>
				</div>
				<div id="div-reg">
				<table id="tb2">
					<tr>
						<td>
							<label>Password</label>
							
							<small id="err3" style="color:red;"><?php if(isset($arrData["pass_Err"]))
																		{echo $arrData["pass_Err"]; }?></small>
						</td>
						<td>
							<label>Confirm Password</label>
							
							<small id="err4" style="color:red;"><?php if(isset($arrData["conpass_Err"]))
																		{echo $arrData["conpass_Err"]; }?></small>
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="password" id="password" onblur="fncPassValidate()"/>
						</td>
						<td >
							<input type="password" name="conpassword" id="conpassword" onblur="fncRePassValidate()"/>
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
				
					
					<td>First Name
						
						<small id="err10" style="color:red;"><?php if(isset($arrData['flr_Err']))
																{echo $arrData["flr_Err"];}?>
						</small>
					</td>
					<td>Last Name
						
						<small id="err11" style="color:red;"><?php if(isset($arrData['las_Err']))
																{echo $arrData["las_Err"];}?>
						</small>
				</tr>
				<tr>
					
					<td><input type="text" name="first_name" id="first_name" onblur="fncFirstValidate()" value="<?php echo $value['first_name'];?>"/>
					</td>
					<td><input type="text" name="last_name" id="last_name" onblur="fncLastValidate()" value="<?php echo $value['last_name'];?>"/>
					</td> 
					
				</tr>
				</table>
				<table id="tb6">
				<tr>
					<td>Phone
					
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
					<td><input type="text" name="phone" id="phone" onblur="fncPhoneValidate()" value="<?php echo $value['phone'];?>"/>
					</td>
					<td><input type="text" name="mobile" id="mobile" maxlength=10 onblur="fncMobileValidate()" value="<?php echo $value['mobile'];?>"/>
					</td> 
				</tr>
				</table>
				<table id="tb7">
				<tr>
					
					
					<td>
						Occupation
					</td>
					
				</tr>
				<tr>
					
					<td>
						<select style="width: 160px;" id="occdrp" name="occdrp" onblur="fncOccValidation()" value="<?php echo $value['master_code_value'];?>">
							<option value="0">Select:</option>				
							<?php
								$obj->fncPopulateOccupationDropDown();
							?>
						</select>
					</td>
					<td>
					
						
					</td>
				</tr>
				</table>
				</div>
					<input name="submit" type="submit" id="register1" value="Update" onclick="fncTermsValidation()" style="margin-top: 10px;border-radius: 5px;" >
					<input name="cancel" value="cancel" type="submit" onclick="fncredirect()"/>
					
				</div>
				<div class="clr"></div>	
				
					
			</div>
			</form>	
			</div>	
<script>
function fncredirect(){
	window.location.href="<?php echo SITE_PATH?>index.php?controller=user&function=fncUserProfile";
}

</script>