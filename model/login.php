<?php
require_once(PDO_PATH.'mysql.php');
require_once(PDO_PATH.'cxpdo.php');
require_once(MODEL_PATH.'db_connect.php');

class loginModel extends connection
{
    function __construct()
    {
       parent::__construct();
   	}

    function checkUserLogin($arrArgument)
    {
		$email=strip_tags(mysql_real_escape_string($arrArgument['email']));
		
		$password=strip_tags($arrArgument['password']);
		$password = md5($password);
			
			$data['columns'] = array('id','user_type','email_address');
			$data['tables'] = 'validate_user';
			$data['conditions'] = array('email_address'=> $email,'password'=>$password,'status'=>'1');	   
				    $result = $this->_db->select($data);
			
			if($row=$result->fetch(PDO::FETCH_ASSOC)){
				$_SESSION['uid']=$row['id'];
				$_SESSION['type']=$row['user_type'];
				$_SESSION['email']=$row['email_address'];
				$id=$_SESSION['uid'];
				$data['columns'] = array('society_id');
				$data['tables'] = 'user_profile';
				$data['conditions'] = array('id'=> $id);
				$result = $this->_db->select($data);
				if($row=$result->fetch(PDO::FETCH_ASSOC)){
					$_SESSION['societyid']=$row['society_id'];
				}
				return true;
				
			}
			else{
				return false;
			}
    }
		
	function getSession()
	{
		return $_SESSION['uid'];
	}
	
	function getFullName($arrArgument)
	{
		$uid=$arrArgument['uid'];
		$result = mysql_query("SELECT name FROM users WHERE uid = $uid");
		$user_data = mysql_fetch_array($result);
		$arrName=array();
		$arrName=$user_data;
		return $arrName;
	}
	
	function userLogout()
	{
		session_destroy();
	}
	
}









?>
