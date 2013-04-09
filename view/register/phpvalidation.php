<?php 
$error = array(
		"name_Err" => "",
		"email_Err" => "",
		"reemail_Err" => "",
		"pass_Err" => "",
		"conpass_Err" => "",
		"soc_Err" => "",
		"blo_Err" => "",
		"tow_Err" => "",
		"flo_Err" => "",
		"fla_Err" => "",
		"fir_Err" => "",
		"las_Err" => "",
		"pho_Err" => "",
		"mob_Err" => "",
		"dob_Err" => "",
		"occ_Err" => ""
		
);

if(isset($_POST['Submit'])){
//check email address
	
	if(empty($_POST['email_address'])){
		$error["email_Err"]= "Email Address Missing";
		
	}
	 
	else{
		$email=$_POST['email_address'];
		if (filter_var($email, FILTER_VALIDATE_EMAIL)== false){
			$error["email_Err"]="Not a Valid Email Address";
			
		}
	
	}

//re check email address
	if(empty($_POST['email_address_check'])){
		$error["reemail_Err"]="Email doesn't match";
	}
	else{
		$reemail=$_POST['email_address_check'];
		if(filter_var($reemail, FILTER_VALIDATE_EMAIL)== false){
			$error["reemail_Err"]="Not a Valid Email address";
		}
		elseif ($reemail!=$email){
			$error["reemail_Err"]="Email Doesn't match";
		}
	}
	
// checking Password
	if(empty($_POST['password'])){
		$error['pass_Err']="Password Missing";
	}	
	else{
		$pass=$_POST['password'];
		if(preg_match("/^[a-zA-Z0-9]+$/",$pass) == false){
			$error["pass_Err"]="Special characters are not allowed";
			
		}
		
	}
	
	//Matching Passoword
	if(empty($_POST['conpassword'])){
		$error["conpass_Err"]="Password Doesn't Match";
	}
	else{
		$conpass=$_POST['conpassword'];
		if(preg_match("/^[a-zA-Z0-9]+$/",$conpass) == false){
			$error["conpass_Err"]="Special characters are not allowed";
			
		}
		elseif ($conpass!=$pass){
			$error["conpass_Err"]="Password Doesn't match";
		}
		
	}
	
	//Society
	if($_POST['socdrp']==0){
		$error["soc_Err"]="Select Society";	
		
	}
	else{
		$society=$_POST['socdrp'];
	}
	
	//block	
	if($_POST['blodrp']==0){
		$error["blo_Err"]="Select Block";
	}
	else{
		$block=$_POST['blorp'];
		
	}
	
	//tower
	if($_POST['towdrp']==0){
		$error["tow_Err"]="Select Tower";
	
	}
	else{
		$tower=$_POST['towdrp'];
	}
	
	//Floor
	if($_POST['flodrp']==0){
		$error["flo_Err"]="Select Floor";
	
	}
	else{
		$floor=$_POST['flodrp'];
	}
	
	//flat
	if($_POST['fladrp']==0){
		$error["fla_Err"]="Select Flat";
	
	}
	else{
		$flat=$_POST['flodrp'];
		
	}
	
	//Check First Name
	if(empty($_POST['first_name'])){
		$error["fir_Err"]="First Name Missing";
	}
	else{
		$first_name=$_POST['first_name'];
		if(preg_match("/^[a-zA-Z]+$/",$first_name) == false){
			$error["fir_Err"]="Only Alphabets are allowed";
		}
	}
	
	//Check Last Name
	if(empty($_POST['last_name'])){
		$error["las_Err"]="Last Name Missing";
	}
	else{
		$last_name=$_POST['last_name'];
		if(preg_match("/^[a-zA-Z]+$/",$last_name) == false){
			$error["las_Err"]="Only Alphabets are allowed";
		}
	}
	
	//Phone
	if(empty($_POST['phone'])){
		$error["pho_Err"]="Phone Missing";
	}
	else{
		$phone=$_POST['phone'];
	}
	
	
	//Mobile
	if(preg_match("/^[0-9]+$/",$_POST['mobile'])== false){
		$error["mob_Err"]="Only Digits";
		
	}
	else{
		$mobile=$_POST['mobile'];
	}
	
	//DATE OF BIRTH
	if(empty($_POST['dobdrp'])){
		$error["dob_Err"]="Select Dob";
	}
	else{
		$dob=$_POST['dobdrp'];	
	}
	
	//Occupation
	if(empty($_POST['occdrp'])){
		$error["occ_Err"]="Select Occupation";
	}
	else{
		$occupation=$_POST['occdrp'];
	}

	

}


?>