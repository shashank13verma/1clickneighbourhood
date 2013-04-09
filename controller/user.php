<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');
class userController extends common{
	
	function userPanelController()
	{
		$arrValue1=$this->loadModel('user','checkUser');
		
		//fncCheckImages
		$arrValue5=$this->loadModel('user','fncCheckImages');
		$arrValue2=$this->loadModel('user','checkNotice');
		
		$arrValue3=$this->loadModel('user','checkAdvertisement');
		//$this->loadView("panels/user/body.php",$arrValue2);
		
		$arrValue4=$this->loadModel('user','checkPoll');
		$arrValue=array($arrValue1,$arrValue2,$arrValue3,$arrValue4,$arrValue5);
		//$this->loadView("panels/user/body.php",$arrValue3);
	  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
		$this->loadView("panels/user/body.php",$arrValue);
		$this->loadView("footer.php");
		//$this->loadView("panels/user/body.php");
		
	}
	function fncSocietyDetails(){
		$arrValue=$this->loadModel('user','fncSocietyDetails');
		if($_SESSION['type']==3)
		{
			$this->loadView("panels/panel_header.php");
		}
		else if($_SESSION['type']==2)
		{
			$this->loadView("panels/header_admin.php");
		}
		$this->loadView("panels/user/sidebaruser.php");
		$this->loadView("panels/user/society_details.php",$arrValue);
		$this->loadView("footer.php");
	}
	function fncUserProfile(){
		$arrValue=$this->loadModel('user','checkUser');
	  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
		$this->loadView("panels/user/sidebaruser.php");
		$this->loadView("panels/user/user_profile.php",$arrValue);
		$this->loadView("footer.php");
	}
	function fncAddComplaint(){
		if(isset($_POST['description'])){
			$description=$_POST['description'];
			$arrArgument=array('description'=>$description);
			print_r($arrArgument);
			$arrValue=$this->loadModel('user','fncAddComplaint',$arrArgument);
		if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
			$this->loadView("panels/user/sidebaruser.php");
			$this->loadView("panels/user/addcomplaint.php",$arrValue);
			$this->loadView("footer.php");
		}
		else{
		if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
			$this->loadView("panels/user/sidebaruser.php");
			$this->loadView("panels/user/addcomplaint.php");
			$this->loadView("footer.php");
		}
	
	}
	function fncResponseUser()
	{
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']) && isset($_SESSION['uid']))
		{
			$this->loadView("panels/panel_header.php");
			$response = $this->loadView("panels/user/deactivate/conform.php");
			//die("i am here") ;
	
		}
	}
	
	function fncDeactivateUser()
	{
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']) && isset($_SESSION['uid']))
		{
			$this->loadModel('user','deactivate');
			//echo("returnnnn");
			$this->loadView("panels/user/deactivate/deactivateConform.php");
		  
		}
	
	}
	function fncdestroySession()
	{
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']) && isset($_SESSION['uid']))
		{
			session_destroy();
			$this->loadView("header.php");
			$this->loadView("landingpage/body.php");
			$this->loadView("body.php");
			$this->loadView("footer.php");
		}
	}

function fncEditDetails()
	{
		if(isset($_SESSION['uid'])){
			$value=$this->loadModel('user','fncEditDetails');
			if($_SESSION['type']==3)
			{
				$this->loadView("panels/panel_header.php");
			}
			else if($_SESSION['type']==2)
			{
				$this->loadView("panels/header_admin.php");
			}
			$this->loadView("panels/user/sidebaruser.php");
			$this->loadView("panels/user/edit_details.php",$value);
			$this->loadView("footer.php");
		}
	}
	function fncValidateUser()
	{
		//print_r($_POST);die();
		if(isset($_SESSION['uid']) && isset($_SESSION['societyid'])){
			if($_POST['submit']){
		
				if(isset($_POST['password'])){
					$password=trim($_POST['password']);
				}
				else{
					$password=0;
				}
				if(isset($_POST['conpassword'])){
					$conpass=trim($_POST['conpassword']);
				}
				else{
					$conpass=0;
				}
				if(isset($_POST['first_name'])){
					$first_name=trim($_POST['first_name']);
				}
				else{
					$first_name=0;
				}
				if(isset($_POST['last_name'])){
					$last_name=trim($_POST['last_name']);
				}
				else{
					$last_name=0;
				}
				if(isset($_POST['phone'])){
					$phone=trim($_POST['phone']);
				}
				else{
					$phone=0;
				}
				if(isset($_POST['mobile'])){
					$mobile=trim($_POST['mobile']);
				}
				else{
					$mobile=0;
				}
				if(isset($_POST['occdrp'])){
					$occdrp=trim($_POST['occdrp']);
				}
				else{
					$occdrp=0;
				}
				$arrArgument=array('password'=>$password,'conpassword'=>$conpass,
						'first_name'=>$first_name,'last_name'=>$last_name,
						'phone'=>$phone,'mobile'=>$mobile,'occdrp'=>$occdrp);
				//print_r($arrArgument);die();
				$value=$this->loadModel('user','fncValidateUser',$arrArgument);
				if($value==1){
					
					header('location:index.php?controller=user&function=fncUserProfile');
				}
				else{
					header('location:index.php?controller=user&function=fncUserProfile');
				}
			}
			else{
				header('location:index.php?controller=user&function=fncUserProfile');
			}
		}
	}
	

}
?>
