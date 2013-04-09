<?php
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

class adminModel
{
    function __construct()
    {
       $config = array();
			$config['user'] = 'root';
			$config['pass'] = 'root';
			$config['name'] = '1clickneighbourhood';
			$config['host'] = 'localhost';
			$config['type'] = 'mysql';
			$config['port'] = null;
			$config['persistent'] = true;
			$this->_db = db::instance($config);

   }
	function fncLoadAdmin()
	{
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$arrUser[]=array();
			
			$data['tables']		= 'user_profile';
			$data['columns']	= array('user_profile.first_name','last_name','society.name');
			$data['conditions']		= array('user_profile.id' => $id);
			$data['joins'][] = array(
					'table' => 'society',
					'type'	=> 'left',
					'conditions' => array('user_profile.society_id' => 'society.id')
			);
			
			$result = $this->_db->select($data);
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
				$_SESSION['firstname']=$row['first_name'];
				$_SESSION['society']=$row['name'];
				$society=$_SESSION['society'];
			}
			
		}
			
	}
	function fncLoadAdminUsers()
	{
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$arrUser=array();
			$data = array();
			$societyid=$_SESSION['societyid'];
						
			$data['tables']		= 'user_profile';
			$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','date_of_birth','phone', 'society.name','block_master.block','tower_master.tower','flat_master.flat','master_codes.master_code_values','validate_user.email_address');
			$data['conditions']		= array('user_profile.society_id' => $societyid,'validate_user.status' => 'Inactive');
			// $data['conditions']		= array('user_profile.status' => 'Inactive');
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
			return $arrUser;
		}
		 
	}
	function fncAuthorizeUser(){
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$email=$_REQUEST['email'];
		
			$data = array('status' => '1');
			$where = array('email_address' => $email);
				
			$result = $this->_db->update('validate_user', $data, $where);
		}
			
			$societyid=$_SESSION['societyid'];
			$data = array();
			
			$data['tables']		= 'user_profile';
			$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','date_of_birth','phone', 'society.name','block_master.block','tower_master.tower','flat_master.flat','master_codes.master_code_values','validate_user.email_address');
			$data['conditions']		= array('user_profile.society_id' => $societyid,'validate_user.status' => 'Inactive');
			// $data['conditions']		= array('user_profile.status' => 'Inactive');
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
			return $arrUser;
	
	}
    function fncViewUsers()
    {
    	if(isset($_SESSION['uid']))
    	{
    		$id=$_SESSION['uid'];
    		//$email=$_SESSION['email'];
    		$arrUser[]=array();
    		$societyid=$_SESSION['societyid'];
 
    		$data = array();
    		
    		$data['tables']		= 'user_profile';
    		$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','date_of_birth','phone', 'society.name','block_master.block','tower_master.tower','flat_master.flat','master_codes.master_code_values','validate_user.email_address');
    		$data['conditions']		= array('user_profile.society_id' => $societyid);
    		$data['conditions']		= array('user_profile.status' => 'Active');
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
    		return $arrUser;
    	
    	}	
    } 
	function fncViewType(){
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			//$email=$_SESSION['email'];
			$arrUser=array();
			$societyid=$_SESSION['societyid'];
			$data = array();
		
			$data['tables']		= 'user_profile';
			$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','user_type.type','validate_user.email_address');
			$data['conditions']		= array('user_profile.society_id' => $societyid,'user_profile.status' => 'Active','validate_user.user_type'=>3);
					
			$data['joins'][] = array(
					'table' => 'society',
					'type'	=> 'left',
					'conditions' => array('user_profile.society_id' => 'society.id')
			);
			
			$data['joins'][] = array(
					'table' => 'validate_user',
					'type'	=> 'left',
					'conditions' => array('user_profile.email_address' => 'validate_user.id')
			);
			$data['joins'][] = array(
					'table' => 'user_type',
					'type'	=> 'left',
					'conditions' => array('user_type.id' => 'validate_user.user_type')
			);
			$result = $this->_db->select($data);
			//print_r($result);die;
			
			//$row=$result->fetch(PDO::FETCH_ASSOC);
			//print_r($row);die;
			
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
			
			}
			return $arrUser;
		}
	}
	function fncMakeRwa(){
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$email=$_REQUEST['email'];
		
			$data = array('user_type' => '2');
			$where = array('email_address' => $email);
			
			$result = $this->_db->update('validate_user', $data, $where);
			}
			
			$societyid=$_SESSION['societyid'];
			
	$id=$_SESSION['uid'];
			//$email=$_SESSION['email'];
			
			$societyid=$_SESSION['societyid'];
			$data = array();
		
			$data['tables']		= 'user_profile';
			$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','user_type.type','validate_user.email_address');
			$data['conditions']		= array('user_profile.society_id' => $societyid,'user_profile.status' => 'Active');
					
			$data['joins'][] = array(
					'table' => 'society',
					'type'	=> 'left',
					'conditions' => array('user_profile.society_id' => 'society.id')
			);
			
			$data['joins'][] = array(
					'table' => 'validate_user',
					'type'	=> 'left',
					'conditions' => array('user_profile.email_address' => 'validate_user.id')
			);
			$data['joins'][] = array(
					'table' => 'user_type',
					'type'	=> 'left',
					'conditions' => array('user_type.id' => 'validate_user.user_type')
			);
			$result = $this->_db->select($data);
			//print_r($result);die;
			
			//$row=$result->fetch(PDO::FETCH_ASSOC);
			//print_r($row);die;
			
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
			
			}
			return $arrUser;
			
		
	}
	function fncAddNotice($arrArgument){
		if(isset($_SESSION['uid']))
		{	
			$id=$_SESSION['uid'];
			$description=$arrArgument['description'];
			$data = array();
			$societyid=$_SESSION['societyid'];
			$data[] = array('society_id' => $societyid,'description' => $description,'status'=>'Active');
			foreach($data as $row){
				$result = $this->_db->insert('notice', $row);
			}
		}
		
	}
	function fncAddBlock($arrArgument){
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$block=$arrArgument['block'];
			$data['columns'] = array('block');
			$data['tables'] = 'block_master';
			$data['conditions']	= array('block' => $block);
			$result = $this->_db->select($data);
			if(!$row=$result->fetch(PDO::FETCH_ASSOC)){
			$data = array();
			$societyid=$_SESSION['societyid'];
			$data[] = array('society_id' => $societyid,'block' => $block,'status'=>'Active');
			foreach($data as $row){
				$result = $this->_db->insert('block_master', $row);
			}
		}
		else 
			return 0;
		}
	}	
	function fncSelectBlock(){
		if(isset($_SESSION['uid']))
		{
				$arrUser=array();
			$id=$_SESSION['uid'];
			$societyid=$_SESSION['societyid'];	
			$data['columns'] = array('block');
			$data['tables'] = 'block_master';
			$data['conditions']	= array('society_id'=>$societyid);
			$result = $this->_db->select($data);
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row['block'];
			}
			return $arrUser;
		}
	}
	
	function fncSelectTower($arrArgument){
	if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$societyid=$_SESSION['societyid'];
			$block=$arrArgument['block'];
			$data['columns'] = array('id');
			$data['tables'] = 'block_master';
			$data['conditions']	= array('block'=>$block);
			$result = $this->_db->select($data);
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$blockid=$row['id'];
			}
			$data['columns'] = array('tower');
			$data['tables'] = 'tower_master';
			$data['conditions']	= array('block_id'=>$blockid);
			$result = $this->_db->select($data);
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row['tower'];
			}
		
			return $arrUser;
		}
	}
	function fncAddTower($arrArgument){
		if(isset($_SESSION['uid']))
		{
			$id=$_SESSION['uid'];
			$tower=$arrArgument['tower'];
			$block=$arrArgument['block'];
			$societyid=$_SESSION['societyid'];

			$data['columns'] = array('id');
			$data['tables'] = 'block_master';
			$data['conditions']	= array('block'=>$block);
			$result = $this->_db->select($data);
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$blockid=$row['id'];
			}
			//echo($blockid);die();
			$data['columns'] = array('tower');
			$data['tables'] = 'tower_master';
			$data['conditions']	= array('tower' => $tower,'block_id'=>$blockid);
			$result = $this->_db->select($data);
			if(!$row=$result->fetch(PDO::FETCH_ASSOC)){
				$data = array();
				$data[] = array('block_id' => $blockid,'tower' => $tower,'status'=>'Active');
				foreach($data as $row){
					$result = $this->_db->insert('tower_master', $row);
				}
			}
			else
				return 0;
		}
	}
	function fncAddFlat($arrArgument){
		if(isset($_SESSION['uid']))
		{
			//print_r($arrArgument);
			$id=$_SESSION['uid'];
			$tower=$arrArgument['tower'];
			$flat=$arrArgument['flat'];
			$block=$arrArgument['block'];
			$floor=$arrArgument['floor'];
			//$societyid=$_SESSION['societyid'];
			$data['columns'] = array('id');
			$data['tables'] = 'block_master';
			$data['conditions']	= array('block'=>$block);
			$result = $this->_db->select($data);
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$blockid=$row['id'];
			}
			
			$data['columns'] = array('id');
			$data['tables'] = 'master_codes';
			$data['conditions']	= array('master_code'=>'FlatFloor','master_code_values'=>$floor);
			$result = $this->_db->select($data);
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$floorid=$row['id'];
			}
			//echo $floorid;
			
			$data['columns'] = array('id');
			$data['tables'] = 'tower_master';
			$data['conditions']	= array('tower'=>$tower);
			$result = $this->_db->select($data);
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$towerid=$row['id'];
			}
			//echo($blockid);die();
			$data['columns'] = array('flat');
			$data['tables'] = 'flat_master';
			$data['conditions']	= array('flat' => $flat,'tower_id'=>$towerid,'block_id'=>$blockid);
			//print_r($data);die();
			$result = $this->_db->select($data);
			
			if(!$row=$result->fetch(PDO::FETCH_ASSOC)){
				$data = array();
				$data[] = array('flat' => $flat,'flat_floor_id'=>$floorid,'tower_id'=>$towerid,'block_id'=>$blockid,'status'=>'Active');
				foreach($data as $row){
					$result = $this->_db->insert('flat_master', $row);
				}
			}
			else
				return 0;
		}
	}
	function fncSocietyGallery($arrArgument)
	{
		$error= array();
		$description=array();
		$hdnLine=$arrArgument['hdnLine'];
		$accept = array('jpg','jpeg','png','gif','bmp');
		$targetPath="view/socgallery/images/";
		$id=$_SESSION['uid'];
		$societyid=$_SESSION['societyid'];
		echo '<pre>';
		print_r($_FILES);
		
		for($i=1;$i<=$hdnLine;$i++)
		{
			if($_FILES["fileUpload".$i]["name"] != ""){
			$extension = substr($_FILES['fileUpload'.$i]['name'],strrpos($_FILES['fileUpload'.$i]['name'],'.')+1);
			if(!in_array($extension,$accept)){
					$error[]='Not a valid file extension';
				}
			else{
					$file_name = uniqid()."_".$_FILES['fileUpload'.$i]['name'];
					$file_size =$_FILES['fileUpload'.$i]['size'];
					$file_tmp =$_FILES['fileUpload'.$i]['tmp_name'];
					$file_type=$_FILES['fileUpload'.$i]['type'];
				
					if($file_size > 2097152){
						$error[]="File size Should be less than 2 MB";
					}
					if(isset($_REQUEST['Description'.$i])){
						$description["Description$i"]= $_REQUEST["Description$i"];
						$desc=$description["Description$i"];
					}
					$target_path = $targetPath.basename($file_name);
					if(empty($errors)){
						$ok = move_uploaded_file($file_tmp, $target_path);
						if($ok) {
							$data1= array('user_id' => $id,'society_id'=>$societyid,
									'file_name'=>$file_name,'file_size'=>$file_size,
									'file_type'=>$file_type,'comments'=>$desc,
									'status'=>'Active');
							
								$result = $this->_db->insert('society_pics', $data1);
							
						}
					}
						
			
			}
			}
			else{
				$error[]='File Name is Mandatory';	
			}
			if(empty($error)){
				echo $_FILES["fileUpload".$i]["name"]."Uploaded<br>";
			}
			else{
				print_r($error);				
			}
		}
		if(empty($error)==true){
			return 1;
		}
	}
	
	function fncDisplayImages(){
		$societyid=$_SESSION['societyid'];
		$id=$_SESSION['uid'];
		
		$arrUser=array();
		
		$data['tables']	= 'society_pics';
		$data['columns'] = array('file_name','comments');
		$data['conditions'] = array('society_id' => $societyid);
		$data['order']='created_at';
		$result = $this->_db->select($data);
		
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$arrUser[]=$row;
		}
		
		return $arrUser;
	}

			function fncDeactivateUser(){
				if(isset($_SESSION['uid']))
				{
					$id=$_SESSION['uid'];
					//$email=$_SESSION['email'];
				
					$societyid=$_SESSION['societyid'];
					$data = array();
						
					$data['tables']		= 'user_profile';
					$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','validate_user.status','validate_user.email_address');
					$data['conditions']		= array('user_profile.society_id' => $societyid,'validate_user.status' => '1');
				
					$data['joins'][] = array(
							'table' => 'society',
							'type'	=> 'left',
							'conditions' => array('user_profile.society_id' => 'society.id')
					);
				
					$data['joins'][] = array(
							'table' => 'validate_user',
							'type'	=> 'left',
							'conditions' => array('user_profile.email_address' => 'validate_user.id')
					);
					$data['joins'][] = array(
							'table' => 'user_type',
							'type'	=> 'left',
							'conditions' => array('user_type.id' => 'validate_user.user_type')
					);
					$result = $this->_db->select($data);
					//print_r($result);die;
				
					//$row=$result->fetch(PDO::FETCH_ASSOC);
					//print_r($row);die;
				
					while($row=$result->fetch(PDO::FETCH_ASSOC)){
						$arrUser[]=$row;
							
					}
					//print_r($arrUser);die();
					return $arrUser;
				}
			}
			function fncDeactivate(){
				if(isset($_SESSION['uid']))
				{
					$id=$_SESSION['uid'];
					$email=$_REQUEST['email'];
						
					$data = array('status' => '0');
					$where = array('email_address' => $email);
				
					$result = $this->_db->update('validate_user', $data, $where);
				}
					
				$societyid=$_SESSION['societyid'];
					
				$id=$_SESSION['uid'];
				//$email=$_SESSION['email'];
					
				$societyid=$_SESSION['societyid'];
				$data = array();
					
				$data['tables']		= 'user_profile';
					$data['columns']	= array('user_profile.id','user_profile.first_name','last_name','mobile','validate_user.status','validate_user.email_address');
					$data['conditions']		= array('user_profile.society_id' => $societyid,'validate_user.status' => '1');
				
					$data['joins'][] = array(
							'table' => 'society',
							'type'	=> 'left',
							'conditions' => array('user_profile.society_id' => 'society.id')
					);
				
					$data['joins'][] = array(
							'table' => 'validate_user',
							'type'	=> 'left',
							'conditions' => array('user_profile.email_address' => 'validate_user.id')
					);
					$data['joins'][] = array(
							'table' => 'user_type',
							'type'	=> 'left',
							'conditions' => array('user_type.id' => 'validate_user.user_type')
					);
					$result = $this->_db->select($data);
					//print_r($result);die;
				
					//$row=$result->fetch(PDO::FETCH_ASSOC);
					//print_r($row);die;
				
					while($row=$result->fetch(PDO::FETCH_ASSOC)){
						$arrUser[]=$row;
							
					}
					//print_r($arrUser);die();
					return $arrUser;
			}
			

	function PopulateSociety($argValue='0')
	{
		$id = $_SESSION['societyid'];
		$data['columns']=array('id','name');
		$data['tables']='society';
		$data['conditions']=array('id' => '$id');
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
	
	
	function viewFlat($towerid)
	{
		$data['columns']=array('id','flat');
		$data['tables']='flat_master';
		$data['conditions']=array('tower_id'=>$towerid);
		$result = $this->_db->select($data);
		if($towerid==0){
				echo "<OPTION VALUE=0>Select:</option>";
			}
		while ($row=$result->fetch(PDO::FETCH_ASSOC)) {
				
			$flatid=$row["id"];
			$flat=$row["flat"];
			$selected = '';
			
			echo "<OPTION VALUE=$flatid>$flat</option>";
		
		}
		
	}
	
	function getMemberBloodgrp($bloodgrp)
	{
	    $host = "localhost";
	    $user = "root";
	    $pass = "root";
	    $con = mysql_connect($host,$user,$pass) or die(mysql_error());
	    $databaseName = "1clickneighbourhood";
	    $dbs = mysql_select_db($databaseName,$con) or die(mysql_error());
	    
	    $sql = "Select first_name, last_name, phone from user_profile";
	    if(isset ($bloodgrp))
		$sql.= " where blood_group like '%".$bloodgrp."%'";
		$result = mysql_query($sql) or die(mysql_error());
		$str = "";
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			$str.="<tr>";
			$str.="<td>".$i ."</td>";
			$str.="<td>".$row['first_name']. "</td>";
			$str.="<td>". $row['last_name']."</td>";
			$str.="<td>".$row['phone']. "</td>";
			$str.="</tr>";
				
				
			$i++;
		
		}
		echo $str;
	}
	function fncResolveComplain($complain_id)
	{
	   if(isset($_SESSION['uid']))
		{
			//$id=$_SESSION['uid'];
			//$email=$_REQUEST['email'];
			$current_time = date("y/m/d h:i:s");
			$data = array('status' => 'Inactive','deleted_at'=>$current_time);
			$where = array('id' => $complain_id);
				
			$result = $this->_db->update('complain', $data, $where);
		} 
	}
	
	function fncPreviousComplains()
	{
	    if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
	    {
    		$id=$_SESSION['societyid'];
		$data['columns'] = array('description','complain.deleted_at','complain.created_at','user_profile.first_name','user_profile.last_name','user_profile.phone');
		$data['tables']		= 'complain';
		$data['conditions']	= array('complain.society_id' => $id,'complain.status'=>'Inactive');
		$data['joins'][] = array(
					'table' => 'user_profile',
					'type'	=> 'left',
					'conditions' => array('complain.member_id' => 'user_profile.email_address')
					);
    		$result = $this->_db->select($data);
    		//print_r($result);die();
    		
    			while($row=$result->fetch(PDO::FETCH_ASSOC)){
						$arrData[]=$row;
							
					}
    		
    		
    		//echo "<pre>";
		//print_r($arrData);die();
		
    		 return $arrData;
    	}
	}
}
?>
