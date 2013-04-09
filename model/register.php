<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class registerModel extends connection
{
	function __construct()
	{
		parent::__construct();	
	}	
	
	function fncValidateUser($arrArgument)
	{
		$check=array();
		$email_address=strip_tags($arrArgument['email_address']);
		$reemail=strip_tags($arrArgument['email_address_check']);
		$pass=strip_tags($arrArgument['password']);
		$conpass=strip_tags($arrArgument['conpassword']);
		$socdrp=strip_tags($arrArgument['socdrp']);
		$blodrp=strip_tags($arrArgument['blodrp']);
		$towdrp=strip_tags($arrArgument['towdrp']);
		$flodrp=strip_tags($arrArgument['flodrp']);
		$fladrp=strip_tags($arrArgument['fladrp']);
		$first_name=strip_tags($arrArgument['first_name']);
		$last_name=strip_tags($arrArgument['last_name']);
		$dob=strip_tags($arrArgument['dob']);
		$phone=strip_tags($arrArgument['phone']);
		$mobile=strip_tags($arrArgument['mobile']);
		$occdrp=strip_tags($arrArgument['occdrp']);
		$blooddrp=strip_tags($arrArgument['blooddrp']);
		$title=strip_tags($arrArgument['title']);
		
		
		if(empty($email_address)){
			$check["email_Err"]= "Required";
		}
		
		else{
			if (filter_var($email_address, FILTER_VALIDATE_EMAIL)== false){
				$check["email_Err"]="Invalid";
			}
			else{
				$check['email']=$email_address;
						
			}
		}
		if(empty($reemail)){
			$check["reemail_Err"]="Required";
		}
		else{
			if(filter_var($reemail, FILTER_VALIDATE_EMAIL)== false){
				$check["reemail_Err"]="Invalid";
			
			}
			elseif ($reemail!=$email_address){
				$check["reemail_Err"]="Email Doesn't match";
			
			}
			else{
				$check['reemail']=$reemail;
			}
		}
		if(empty($pass)){
			$check['pass_Err']="Required";
		}
		else{
			if(preg_match("/^[a-zA-Z0-9]+$/",$pass) == false){
				$check["pass_Err"]="No special characters";
					
			}
			else{
				$check['password']=$pass;
			}
		
		}
		if(empty($conpass)){
			$check["conpass_Err"]="Required";
		}
		else{
			if(preg_match("/^[a-zA-Z0-9]+$/",$conpass) == false){
				$check["conpass_Err"]="No special characters";
					
			}
			elseif ($conpass!=$pass){
				$check["conpass_Err"]="Password Doesn't match";
			}
			else{
				$check['conpass']=$conpass;
			}
		
		}
		if($socdrp==0){
			$check["soc_Err"]="Required";
		}
		else{
			$check['socdrp']=$socdrp;
		}
		if($blodrp==0){
			$check["blo_Err"]="Required";
		}
		else{
			$check['blodrp']=$blodrp;
		
		}
		//tower
		if($towdrp==0){
			$check["tow_Err"]="Required";
		
		}
		else{
			$check['towdrp']=$towdrp;
		}
		//Floor
		if($flodrp==0){
			$check["flo_Err"]="Required";
		}
		else{
			$check['flodrp']=$flodrp;
		}
		if($fladrp==0){
			$check["fla_Err"]="Required";
		}
		else{
			$check['fladrp']=$fladrp;
		}
		if(empty($first_name)){
			$check["flr_Err"]="Required";
		}
		else{
			if(preg_match("/^[a-zA-Z]+$/",$first_name) == false){
				$check["flr_Err"]="Only Alphabets";
			}
			else{
				$check['first_name']=$first_name;
			}
		}
		//Check Last Name
		if(empty($last_name)){
			$check["las_Err"]="Required";
		}
		else{
			if(preg_match("/^[a-zA-Z]+$/",$last_name) == false){
				$check["las_Err"]="Only Alphabets";
			}
			else{
				$check['last_name']=$last_name;
			}

		}
		//dob
		if(empty($dob)){
			$check["dob_Err"]="Required";
		}
		else{
			$check['dob']=$dob;
		}
		//Phone
		if(empty($phone)){
			$check["pho_Err"]="Required";
		}
		elseif(preg_match("/^[0-9]+$/",$_POST['mobile'])== false){
			$check["mob_Err"]="Only Digits";
		}
		else{
			$check["phone1"]=$phone;
		}
		
		
		//Mobile
		if(empty($mobile)){
			$check["mob_Err"]="Required";
		}
		elseif(preg_match("/^[0-9]+$/",$_POST['mobile'])== false){
			$check["mob_Err"]="Only Digits";
		}
		else{
			$check['mobile']=$mobile;
		}
		
		//Occupation
		if($occdrp==0){
			$check["occ_Err"]="Required";
		}
		else{
			$check['occdrp']=$occdrp;
		}
		
		if(!((empty($check['email'])) || (empty($check['reemail'])) || (empty($check['password'])) || (empty($check['socdrp'])) || (empty($check['blodrp'])) 
			|| (empty($check['flodrp'])) || (empty($check['towdrp'])) || (empty($check['fladrp'])) || (empty($check['first_name'])) || 
				(empty($check['last_name'])) || (empty($check["phone1"])) || (empty($check['dob']))
			|| (empty($check['mobile'])) || (empty($check['occdrp'])))){
				if(!($socdrp==0 || $blodrp==0 || $towdrp ==0 || $flodrp==0 || $fladrp==0)){

				$data['columns']=array('id','email_address');
				$data['tables']='validate_user';
				$data['conditions'] = array('email_address'=>$email_address);
				$result = $this->_db->select($data);
				if(!($row=$result->fetch(PDO::FETCH_ASSOC))){
					$data1[] = array('user_type'=>3,'email_address'=>$email_address,
											'password'=>$pass,'status'=>0);
					foreach ($data1 as $row1){
						$result = $this->_db->insert('validate_user',$row1);
				}
				$data2['columns'] = array('id');
				$data2['tables'] = 'validate_user';
				$data2['conditions'] = array('email_address'=>$email_address);
				$result = $this->_db->select($data2);
				if($row2=$result->fetch(PDO::FETCH_ASSOC)){
					$emailid=$row2['id'];
				}
				$data3[] = array('first_name'=>$first_name,'last_name'=>$last_name,
						'email_address'=>$emailid,'flat_no_id'=>$fladrp,'tower_id'=>$towdrp,
						'block_id'=>$blodrp,'society_id'=>$socdrp,'occupation_id'=>$occdrp,
						'phone'=>$phone,'title'=>$title,'date_of_birth'=>$dob,'mobile'=>$mobile,'status'=>'Active');
				foreach($data3 as $row3){
					$result = $this->_db->insert('user_profile', $row3);
				}
			
			}
			
		}	
		return 1;
		}
		else{
			return $check;
		}
	}
	
	function fncPopulateSocietyDropDown($argValue='0')
	{
		
		$data['columns']=array('id','name');
		$data['tables']='society';		
		$result = $this->_db->select($data);
		
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
		
			$socid=$row["id"];
			$socname=$row["name"];
			$selected = '';
			if($argValue==$socid) {
				$selected = 'selected';
			}
			echo "<OPTION VALUE=$socid".$selected.">$socname</option>";
		}
		
	}
	
	function fncPopulateBlockDropDown($argValue='0')
	{
		
		$data['columns']=array('id','block');
		$data['tables']='block_master';
		$result = $this->_db->select($data);
		
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
			
			$blockid=$row["id"];
			$blockname=$row["block"];
			/*if($argValue==$blockid){
				$selected = 'selected';
			}*/
		
			echo "<OPTION VALUE=$blockid>$blockname</option>";
		}
		
		
		
	}
	
	function fncPopulateTowerDropDown($argvalue='0')
	{
		$data['columns']=array('id','tower');
		$data['tables']='tower_master';
		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				
			$towerid=$row["id"];
			$towername=$row["tower"];
			/*if($argValue==$towerid){
				$selected = 'selected';
			}*/
		
			echo "<OPTION VALUE=$towerid>$towername</option>";
		}
		
	}
	
	function fncPopulateFloorDropDown($argvalue='0')
	{
		$data['columns']=array('id','master_code_values');
		$data['tables']='master_codes';
		$data['conditions']=array('master_code'=>'FlatFloor');
		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				
			$floorid=$row["id"];
			$floorname=$row["master_code_values"];
			
			echo "<OPTION VALUE=$floorid>$floorname</option>";
		}
		
	}
	
	function fncPopulateFlatDropDown()
	{
		$data['columns']=array('id','flat');
		$data['tables']='flat_master';
		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
	
			$flatid=$row["id"];
			$flatname=$row["flat"];
				
			echo "<OPTION VALUE=$flatid>$flatname</option>";
		}
	
	}
	
	function fncPopulateOccupationDropDown()
	{
		$data['columns']=array('id','master_code_values');
		$data['tables']='master_codes';
		$data['conditions']=array('master_code'=>Occupation);
		
		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
		
			$occid=$row["id"];
			$occname=$row["master_code_values"];
		
			echo "<OPTION VALUE=$occid>$occname</option>";
		}
		
		
	}
	
	function fncPopulateBloodDropDown()
	{
		$data['columns']=array('id','master_code_values');
		$data['tables']='master_codes';
		$data['conditions']=array('master_code'=>BloodGroup);
		
		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
		
			$bloodid=$row["id"];
			$bloodname=$row["master_code_values"];
			/*if($argValue==$floordid){
				$selected = 'selected';
			}*/
		
			echo "<OPTION VALUE=$bloodid>$bloodname</option>";
		}
	}
	
	function fncLoadBlock($societyId)
	{
		$data['columns']=array('id','block');
		$data['tables']='block_master';		
		$data['conditions']=array('society_id'=>$societyId);
		$result = $this->_db->select($data);
		if($societyId==0){
			echo "<OPTION VALUE=0>Select:</option>";
		}
		else{
			while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				$socid=$row["id"];
				$socname=$row["block"];
				$selected = '';
				/*if($societyId==$socid) {
					$selected = 'selected';
				}*/
				echo "<OPTION VALUE=$socid>$socname</option>";
			}
		}
	}
	function fncLoadTower($blockId)
	{
		$data['columns']=array('id','tower');
		$data['tables']='tower_master';
		$data['conditions']=array('block_id'=>$blockId);
		$result = $this->_db->select($data);
		/*if($blockId==0){
			echo "<OPTION VALUE=0>Select:</option>";
		}*/
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				
			$towerid=$row["id"];
			$towername=$row["tower"];
			$selected = '';
			/*if($blockId==$towerid) {
				$selected = 'selected';
			}*/
			echo "<OPTION VALUE=$towerid>$towername</option>";
		
		}
	}
	function fncLoadFloor($floorId)
	{
		$data['columns']=array('id','master_code_values');
		$data['tables']='master_codes';
		$data['conditions']=array('master_code'=>'FlatFloor');
		$result = $this->_db->select($data);
		if($floorId==0){
			echo "<OPTION VALUE=0>Select:</option>";
		}
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				
			$floorid=$row["id"];
			$floorname=$row["master_code_values"];
			/*if($towerId==$floorid) {
				$selected = 'selected';
			}*/
			
			echo "<OPTION VALUE=$floorid>$floorname</option>";
			
		}
	}
	function fncLoadFlat($arrArgument)
	{
			$societyId=$arrArgument['societyId'];
			$blockId=$arrArgument['blockId'];
			$towerId=$arrArgument['towerId'];
			$floorId=$arrArgument['floorId'];
			$data['columns'] = array('id','flat');
			$data['tables'] = 'flat_master';
			$data['conditions']	= array('flat_floor_id'=>$floorId,'tower_id'=>$towerId,'block_id'=>$blockId);
			$result = $this->_db->select($data);
			if($floorId==0){
				echo "<OPTION VALUE=0>Select:</option>";
			}
			while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
			
				$flatid=$row["id"];
				$flatname=$row["flat"];
			/*	if($floorId==$floorid) {
				 $selected = 'selected';
				}*/
					
				echo "<OPTION VALUE=$flatid>$flatname</option>";
					
			}
			
				
	}
}
?>