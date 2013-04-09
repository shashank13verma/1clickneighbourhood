<?php

class registerController extends common{
    function registerController(){
    }
	
	function loadRegister()
	{
        if(!(isset($_SESSION['uid']))){
        	$this->loadView("header.php");
			$this->loadView("register/registration.php");
			$this->loadView("footer.php");
		}			
	}
	
	function validate()
	{
        if($_POST['submit']){
			if(isset($_POST['email_address'])){
				$email_address=$_POST['email_address'];
			}
			else{
				$email_address=0;
			}
			if(isset($_POST['email_address_check'])){
				$reemail=$_POST['email_address_check'];
			}
			else{
				$reemail=0;
			}
			if(isset($_POST['password'])){
				$password=$_POST['password'];
			}
			else{
				$password=0;
			}
			if(isset($_POST['conpassword'])){
				$conpass=$_POST['conpassword'];
			}
			else{
				$conpass=0;
			}
			if(isset($_POST['socdrp'])){
				$socdrp=$_POST['socdrp'];
			}
			else{
				$socdrp=0;
			}
			if(isset($_POST['blodrp'])){
				$blodrp=$_POST['blodrp'];
			}
			else{
				$blodrp=0;
			}
			if(isset($_POST['towdrp'])){
				$towdrp=$_POST['towdrp'];
			}
			else{
				$towdrp=0;
			}
			if(isset($_POST['flodrp'])){
				$flodrp=$_POST['flodrp'];
			}
			else{
				$flodrp=0;
			}
			if(isset($_POST['fladrp'])){
				$fladrp=$_POST['fladrp'];
			}
			else{
				$fladrp=0;
			}
			if(isset($_POST['first_name'])){
				$first_name=$_POST['first_name'];
			}
			else{
				$first_name=0;
			}
			if(isset($_POST['last_name'])){
				$last_name=$_POST['last_name'];
			}
			else{
				$last_name=0;
			}
			if(isset($_POST['dob']))
			{
				$dob=$_POST['dob'];
			}
			else{
				$dob=0;
			}
			if(isset($_POST['phone'])){
				$phone=$_POST['phone'];
			}
			else{
				$phone=0;
			}
			if(isset($_POST['mobile'])){
				$mobile=$_POST['mobile'];
			}
			else{
				$mobile=0;
			}
			if(isset($_POST['occdrp'])){
				$occdrp=$_POST['occdrp'];
			}
			else{
				$occdrp=0;
			}
			if(isset($_POST['title'])){
				$title=$_POST['title'];
			}
			else{
				$title=0;
			}
			if(isset($_POST['blooddrp'])){
				$blooddrp=$_POST['blooddrp'];
			}
			else{
				$blooddrp=0;
			}
			$arrArgument=array('email_address'=>$email_address,'email_address_check'=>$reemail,
							'password'=>$password,'conpassword'=>$conpass,
							'socdrp'=>$socdrp,'blodrp'=>$blodrp,
							'towdrp'=>$towdrp,'flodrp'=>$flodrp,'fladrp'=>$fladrp,
							'first_name'=>$first_name,'last_name'=>$last_name,
							'phone'=>$phone,'dob'=>$dob,'mobile'=>$mobile,'occdrp'=>$occdrp,'blooddrp'=>$blooddrp,'title'=>$title);
			$value=$this->loadModel('register','fncValidateUser',$arrArgument);
			if($value==1){
				
				$this->loadView("header.php");
				$this->loadView("login/login.php",$value);
				$this->loadView("footer.php");
			}
			else{
				$this->loadView("header.php");
				$this->loadView("register/registration.php",$value);
				$this->loadView("footer.php");
			}
		}
	}
	
	public function fncLoadBlock() {
		$argSocietyId = $_POST["societyId"];
		$value=$this->loadModel('register','fncLoadBlock',$argSocietyId);
		
	}
	
	public function fncLoadTower(){
		$argBlockId= $_POST["blockId"];
		$value=$this->loadModel('register','fncLoadTower',$argBlockId);
	}
	
	public function fncLoadFloor(){
		$argTowerId = $_POST["towerId"];
		$value=$this->loadModel('register','fncLoadFloor',$argTowerId);
	}
	
	public function fncLoadFlat(){
		$argSocietyId = $_POST["societyId"];
		$argBlockId = $_POST["blockId"];
		$argTowerId	= $_POST["towerId"];
		$argFloorId	= $_POST["floorId"];	
		$arrArgument=array('societyId'=>$argSocietyId,'blockId'=>$argBlockId,'towerId'=>$argTowerId,'floorId'=>$argFloorId);
		$value=$this->loadModel('register','fncLoadFlat',$arrArgument);
	}
	
}
?>