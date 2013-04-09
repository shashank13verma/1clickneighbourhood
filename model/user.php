<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class userModel extends connection
{
    function __construct()
    {
       parent::__construct();

   }

    function checkUser()
    {
    	if(isset($_SESSION['uid']))
    	{
    		$id=$_SESSION['uid'];
    		$arrUser[]=array();
    	   		
    		$data = array();
    		
    		$data['tables']		= 'user_profile';
    		$data['columns']	= array('user_profile.first_name','last_name','mobile','date_of_birth','phone', 'society.name','block_master.block','tower_master.tower','flat_master.flat','master_codes.master_code_values','validate_user.email_address');
    		$data['conditions']		= array('user_profile.id' => $id);
    		$data['joins'][] = array(
    				'table' => 'society',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.society_id' => 'society.id')
    		);
    		$data['joins'][] = array(
    				'table' => 'block_master',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.block_id' => 'block_master.id')
    		);
    		$data['joins'][] = array(
    				'table' => 'tower_master',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.tower_id' => 'tower_master.id')
    		);
    		$data['joins'][] = array(
    				'table' => 'flat_master',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.flat_no_id' => 'flat_master.id')
    		);
    		$data['joins'][] = array(
    				'table' => 'master_codes',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.occupation_id' => 'master_codes.id')
    		);
    		$data['joins'][] = array(
    				'table' => 'validate_user',
    				'type'	=> 'left',
    				'conditions' => array('user_profile.email_address' => 'validate_user.id')
    		);
    		$result = $this->_db->select($data);
    		//print_r($result);die;
    		
    		//$row=$result->fetch(PDO::FETCH_ASSOC);
    		//print_r($row);die;
    		
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrUser[]=$row;
    				
    		}
    		$result = $this->_db->select($data);
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$_SESSION['firstname']=$row['first_name'];
    			//print_r($_SESSION);
    			$_SESSION['society']=$row['name'];
    			$_SESSION['email']=$row['email_address'];
    		}
    		
    		/*
    		$data['columns'] = array('email_address');
    		$data['tables'] = 'validate_user';
    		$data['conditions'] = array('id'=> $id);
    		$result = $this->_db->select($data);
    		if($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrUser[]=$row;
    		}
			$data['columns'] = array('first_name','last_name','flat_no_id','tower_id','block_id','society_id','occupation_id','phone','mobile','date_of_birth');
					$data['tables'] = 'user_profile';
					$data['conditions'] = array('id'=> $id);	   
				    $result = $this->_db->select($data);
	
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
							
			}
			
			*/
			
			
			return $arrUser;
			
    	}
    	
    
}
	function fncSocietyDetails(){
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
		{
			$id=$_SESSION['uid'];
			
			$societyid=$_SESSION['societyid'];
			
			$data['columns']	= array('society.name','builder_details.company_name','builder_details.owner_name','builder_details.office_address','builder_details.city','pincode');
			$data['tables']		= 'society';
			$data['conditions']		= array('society.id' => $societyid);
			$data['joins'][] = array(
					'table' => 'builder_details',
					'type'	=> 'left',
					'conditions' => array('society.builder_id'=>'builder_details.id')
			);
			/*$data['joins'][] = array(
					'table' => 'states',
					'type'	=> 'left',
					'conditions' => array( 'society.state_id'=>'states.id')
			);
			$data['joins'][] = array(
					'table' => 'country',
					'type'	=> 'left',
					'conditions' => array( 'society.country_id'=>'country.id')
			); */
			
			//echo "<pre>";
			//print_r($data);die();
			$result = $this->_db->select($data);
			//print_r($result);die;
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				//echo "<pre>";
				//print_r($row);die();
				
				$arrData[]=$row;
			}
			//echo "<pre>";
			//print_r($arrData);
			return $arrData;
		}
	}
function fncCheckImages(){
	$societyid=$_SESSION['societyid'];
	$id=$_SESSION['uid'];

	$arrUser=array();

	$data['tables']	= 'society_pics';
	$data['columns'] = array('file_name','file_type','comments');
	$data['conditions'] = array('society_id' => $societyid);
	$data['order']= 'created_at';
	$data['limit']=20;
	$result = $this->_db->select($data);

	while($row=$result->fetch(PDO::FETCH_ASSOC)){
		$arrUser[]=$row;
	}

	return $arrUser;
}
function checkNotice(){
	
	
	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
	{
		$id=$_SESSION['uid'];
	
	
		$data['columns'] = array('society_id');
		$data['tables'] = 'user_profile';
		$data['conditions'] = array('id'=> $id);
		$result = $this->_db->select($data);
		if($row=$result->fetch(PDO::FETCH_ASSOC)){
			$societyid=$row['society_id'];
		}
		$data['columns']	= array('description','created_at');
		$data['tables']		= 'notice';
		$data['conditions']		= array('society_id' => $societyid);
		$data['order']= 'created_at';
		$data['limit']=5;
		$result = $this->_db->select($data);
		//print_r($result);die;
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$arrData[]=$row['description'];
			$arrData[]=$row['created_at'];
	
		}
		//echo "<pre>"
		//print_r($arrData);die();
		return $arrData;
	}
	
	
		
}
	function checkAdvertisement(){
    	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
    	{
    		//print_r($_SESSION);
    		$societyid=$_SESSION['societyid'];
    		$data = array();
    		$data['tables']		= 'add_details';
    		$data['columns']	= array('user_profile.society_id','user_profile.first_name','user_profile.last_name','user_profile.phone','add_details.description','master_codes.master_code_values');
    		$data['order']= 'add_details.created_at';
    		$data['limit']='5';
    		$data['conditions']	=	array('add_details.status'=>'Active','user_profile.society_id'=>$societyid);
    		$data['joins'][] = array(
    				'table' => 'user_profile',
    				'type'	=> 'left',
    				'conditions' => array('add_details.member_id' => 'user_profile.email_address')
    		);
    		
    		$data['joins'][] = array(
    				'table' => 'master_codes',
    				'type'	=> 'left',
    				'conditions' => array('add_details.interested_in_id' => 'master_codes.id')
    		);
    		$result = $this->_db->select($data);
    		//print_r($result);die;
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrAdd[]=$row;
    		
    		}
    		//echo "<pre>";
    		//print_r($arrAdd);die;
    		 return $arrAdd;
    	}
    
	}
	function checkPoll(){
		if(isset($_SESSION['uid'])&&($_SESSION['societyid'])){
			$data['columns'] = array('id','topic','answer1','answer2','answer3','answer4');
			$data['tables'] = 'poll';
			$data['order']= 'created_at';
			$data['limit']=5;
			$result = $this->_db->select($data);
			$arrUser=array();
		
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
			}
			//print_r($arrUser);
			return $arrUser;
		}
	}
function fncAddComplaint($arrArgument){
	if(isset($_SESSION['uid']))
	{
		$id=$_SESSION['uid'];
		$description=$arrArgument['description'];
		$data = array();
		$data['columns'] = array('society_id');
		$data['tables'] = 'user_profile';
		$data['conditions'] = array('id'=> $id);
		$result = $this->_db->select($data);
		if($row=$result->fetch(PDO::FETCH_ASSOC)){
			$societyid=$row['society_id'];
				
				
		}
		$data1[] = array('member_id'=>$id,'society_id' => $societyid,'description' => $description,'status'=>'Active');
		foreach($data1 as $row1){
			$result = $this->_db->insert('complain', $row1);
		}
	}
	//die($result);
		
		

}
function deactivate()
{
	if(isset($_SESSION['uid'])){
		$datetime =date("d/m/y h:i:s");
		$id=$_SESSION['uid'];
		//echo $datetime;die();
		
		$table = 'user_profile';
		$data = array('status' => 'Inactive','deleted_at'=>$datetime);
		$where = array('id' => $id);
		$result = $this->_db->update($table, $data, $where);
		$table = 'validate_user';
		$data = array('status' => '0','deleted_at'=>$datetime);
		$where = array('id' => $id);
		$result = $this->_db->update($table, $data, $where);
		
		return true;

	}
}
function fncEditDetails(){
	$arrData = array();
	if(isset($_SESSION['uid']) && isset($_SESSION['societyid'])){
		$id=$_SESSION['uid'];
		$data['columns']=array('validate_user.email_address','validate_user.password','user_profile.first_name','user_profile.last_name','user_profile.phone','user_profile.mobile','master_codes.master_code_values');
			
		$data['tables']='validate_user';
		$data['conditions']=array('validate_user.id'=>$id);
			
		$data['joins'][]=array(
				'table'=>'user_profile',
				'type'=>'INNER',
				'conditions'=>array('validate_user.id'=>'user_profile.email_address')
		);
		$data['joins'][] = array(
				'table' => 'master_codes',
				'type'	=> 'left',
				'conditions' => array('user_profile.occupation_id' => 'master_codes.id')
		);


		$result = $this->_db->select($data);

		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$arrData[]=$row;

		}
		//print_r($arrData);die();
		return $arrData;

	}
}

function fncValidateUser($arrArgument)
{
	$check=array();
	//print_r($arrArgument);die();
	$pass=strip_tags($arrArgument['password']);
	$conpass=strip_tags($arrArgument['conpassword']);

	$first_name=strip_tags($arrArgument['first_name']);
	$last_name=strip_tags($arrArgument['last_name']);
	$phone=strip_tags($arrArgument['phone']);
	$mobile=strip_tags($arrArgument['mobile']);
	$occdrp=strip_tags($arrArgument['occdrp']);


	$pass=md5($pass);
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
	//Phone
	if(empty($phone)){
		$check["pho_Err"]="Required";
	}
	elseif(preg_match("/^[0-9]+$/",$_POST['mobile'])== false){
		$check["pho_Err"]="Only Digits";
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

	//$data['columns']=array('email_address');
	//$data['tables']='validate_user';
	//$data['conditions']=array('validate_user.id'=>$id);
	//$result = $this->_db->select($data);
	//if($row=$result->fetch(PDO::FETCH_ASSOC)){
	//print_r($check);die();
	if(!((empty($check['password']))
			|| (empty($check['first_name'])) || (empty($check['last_name'])) || (empty($check["phone1"]))
			|| (empty($check['mobile'])) || (empty($check['occdrp'])))){


		$id=$_SESSION['uid'];

		$data['columns']=array('email_address');
		$data['tables']='validate_user';
		$data['conditions']=array('validate_user.id'=>$id);
		$result = $this->_db->select($data);
			
		if($row=$result->fetch(PDO::FETCH_ASSOC)){
			$data1 = array('password' => $pass);
			$where=array('email_address'=>$_SESSION['email']);
			$result2 = $this->_db->update('validate_user',$data1,$where);

		}
		$result = $this->_db->select($data);
		if($row=$result->fetch(PDO::FETCH_ASSOC)){
			$data2=array('first_name'=>$first_name,
					'last_name'=>$last_name,
					'occupation_id'=>$occdrp,'phone'=>$phone,'mobile'=>$mobile,'user_profile.status'=>'Active');
			$where = array('user_profile.email_address'=>$id);
			$result3 = $this->_db->update('user_profile',$data2,$where);
			print_r($result3);
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

		/*function fncPopulateBloodDropDown()
		{
		$data['columns']=array('id','master_code_values');
		$data['tables']='master_codes';
		$data['conditions']=array('master_code'=>BloodGroup);

		$result = $this->_db->select($data);
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {

		$bloodid=$row["id"];
		$bloodname=$row["master_code_values"];
		if($argValue==$floordid){
		$selected = 'selected';
		}

 echo "<OPTION VALUE=$bloodid>$bloodname</option>";
  }
 }*/

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
