<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');

class loginController extends common{
    function loginController()
	{
		
	}
	
	function checklogin()
	{
		if((isset($_POST['email']))&&(isset($_POST['password']))){
			$email=$_POST['email'];
			$password=$_POST['password'];
			$arrArgument=array('email'=>$email,'password'=>$password);
			$value=$this->loadModel('login','checkUserLogin',$arrArgument);
			if($value)
			{
				echo "$value";
			}	
			else{
				echo "no";
			}
			
		}
		
	}
	
	function loadLogin()
	{
		if(!(isset($_SESSION['uid']))){
			$this->loadView("header.php");
			$this->loadView("login/login.php");
			$this->loadView("footer.php");
		}
		else {
			if($_SESSION['type']==3)
			{
				//die("i am inside loadlogin");
				$userObj = new userController();
				$userObj->userPanelController();
			}
			else if($_SESSION['type']==2)
			{		
				$adminObj = new adminController();
				$adminObj->adminPanelController();
			}
		}
	
	}
	function fnclogoutRedirect()
	{
		
		$this->loadModel('login','userLogout');
		if(isset($_SESSION['id'])){
			$this->loadView("panels/panel_header.php");
			$this->loadView("landingpage/body.php");
			$this->loadView("footer.php");
			
		}
		else{
			//$this->loadView("header.php");
			//$this->loadView("landingpage/body.php");
			//$this->loadView("footer.php");
			header('location:index.php');
		}
	
	
	}
	
	


		
}

?>
