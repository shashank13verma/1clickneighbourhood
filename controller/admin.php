<?php
class adminController extends common{
	
	function adminPanelController()
	{
		$arrValue=$this->loadModel('admin','fncLoadAdmin');
		$arrValue=$this->loadModel('admin','fncLoadAdminUsers');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/body.php",$arrValue);
		//$this->loadView("footer.php");
	}
	
	function fncLoadUsers(){
		$arrValue=$this->loadModel('admin','fncViewUsers');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/viewusers.php",$arrValue);
		//$this->loadView("footer.php");
	}
	function fncAddUser(){
		$email=$_REQUEST['email'];
		$arrValue=$this->loadModel('admin','fncAuthorizeUser',$email);
		$arrValue=$this->loadModel('admin','fncLoadAdminUsers');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/body.php",$arrValue);
		//$this->loadView("footer.php");
	}
	function fncLoadType(){
		$arrValue=$this->loadModel('admin','fncViewType');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/addrwamember.php",$arrValue);
		//$this->loadView("footer.php");
	}
	function fncAddRwa(){
		$email=$_REQUEST['email'];
		$arrValue=$this->loadModel('admin','fncMakeRwa',$email);
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/addrwamember.php",$arrValue);
		//$this->loadView("footer.php");
	}
	function fncAddNotice(){
		
		if(isset($_POST['description'])){	
		$description=$_POST['description'];
		$description=strip_tags($description);
		$arrArgument=array('description'=>$description);
		$arrValue=$this->loadModel('admin','fncAddNotice',$arrArgument);
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/addnotice.php",$arrValue);
		//$this->loadView("footer.php");
		}
		else{
			$this->loadView("panels/header_admin.php");
			$this->loadView("panels/admin/sidebaradmin.php");
			$this->loadView("panels/admin/addnotice.php");
			//$this->loadView("footer.php");
		}
		
	}
	
	function fncAddBlock(){
		if(isset($_POST['block'])){
			$block=$_POST['block'];
			$arrArgument=array('block'=>$block);
			$arrValue=$this->loadModel('admin','fncAddBlock',$arrArgument);

			//$this->loadView("panels/panel_header.php");
			//$this->loadView("panels/admin/sidebaradmin.php");
			//$this->loadView("panels/admin/addnotice.php",$arrValue);
		}
	}
	function fncSelectBlock(){
			//$tower=$_POST['tower'];
			//$block=$_POST['block'];
		$arrValue=$this->loadModel('admin','fncSelectBlock');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$arrValue1=$this->loadView("panels/admin/addTower.php",$arrValue);
		//$this->loadView("footer.php");
		
		//$this->loadView("panels/admin/addTower.php",$arrValue1);
			//$arrArgument=array('tower'=>$tower,'block'=>$block);
		//	print_r($tower);die();
			//$arrValue=$this->loadModel('admin','fncAddTower',$arrArgument);
			
			//$this->loadView("panels/panel_header.php");
			//$this->loadView("panels/admin/sidebaradmin.php");
			//$this->loadView("panels/admin/addnotice.php",$arrValue);
		 
	}
	
	function fncAddTower(){
		$tower=$_POST['tower'];
		$block=$_POST['block'];
		$arrArgument=array('tower'=>$tower,'block'=>$block);
		$arrValue=$this->loadModel('admin','fncAddTower',$arrArgument);
	}
	function fncSelectTower(){
		//$tower=$_POST['tower'];
		//$block=$_POST['block'];
		
		$arrValue=$this->loadModel('admin','fncSelectBlock');
		$_SESSION['block']=$_POST['block'];
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/addFlat.php",$arrValue);
		///$this->loadView("footer.php");
		
		
	}
	function fncSelectFlat(){
		
	
				
				$block=$_SESSION['block'];
		//$block=$_POST['block'];
		$arrValue1=array('block'=>$block);
		$arrValue2=$this->loadModel('admin','fncSelectTower',$arrValue1);
		$arrValue3=array($arrValue1,$arrValue2);
		//print_r($arrValue3);
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/insertFlat.php",$arrValue3);
		//$this->loadView("footer.php");
	
	
	}
	
	function fncAddFlat(){
			$block=$_SESSION['block'];
			$tower=$_POST['tower'];
			$flat=$_POST['flat'];
			$floor=$_POST['floor'];
			$arrArgument=array('flat'=>$flat,'tower'=>$tower,'block'=>$block,'floor'=>$floor);
			//print_r($arrArgument);die();
			$arrValue=$this->loadModel('admin','fncAddFlat',$arrArgument);
			//$this->loadView("panels/panel_header.php");
			//$this->loadView("panels/admin/sidebaradmin.php");
			//$this->loadView("panels/panel_header.php");
			//$this->loadView("panels/admin/sidebaradmin.php");
			//$this->loadView("panels/admin/addnotice.php",$arrValue);
		
	}
	function fncLoadGallery(){
		$this->loadView("socgallery/uploadimages1.php");
	}
	
	function fncAddImages(){
		$count=0;
		$arrArgument=array();
		if(isset($_POST["hdnLine"])){
			$hdnLine=$_POST["hdnLine"];
			for($i=1;$i<=(int)$hdnLine;$i++){
					
				if(isset($_FILES['fileUpload'.$i])){
					$count++;	
					}
			}
			$i=$i-1;
			if($count==$i){
				$arrArgument=array('hdnLine'=>$hdnLine);
				$value=$this->loadModel('admin','fncSocietyGallery',$arrArgument);
				if($value==1){
					$this->loadView("socgallery/redirect.php");
				}
			}
	
		}
	}	

	function fncDisplayImages(){
		$value1=$this->loadModel('admin','fncdisplayImages');
		
		$this->loadView("socgallery/displayimages.php",$value1);
	}
	
	
	
	
	
	function fncDeactivateUser()
	{
		//print_r($_REQUEST);die();
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']) && isset($_SESSION['uid']))
		{
		
		$arrValue=$this->loadModel('admin','fncDeactivateUser');
		
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/deactivate.php",$arrValue);
		//$this->loadView("footer.php");
		}
	
	}
	function fncDeactivate()
	{
		//print_r($_REQUEST);die();
		if(isset($_SESSION['firstname']) && isset($_SESSION['society']) && isset($_SESSION['uid']))
		{
			$email=$_REQUEST['email'];
			//echo $email;die();
		$arrValue=$this->loadModel('admin','fncDeactivate',$email);
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/deactivate.php",$arrValue);
		//$this->loadView("footer.php");
		}
	}
	function fncviewBlock()
	{
		//print_r($_POST);
		$arrValue = $this->loadModel('admin','fncSelectBlock');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/viewTower.php",$arrValue);
	}
	function fncBlooodgrp()
	{
		
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/admin/viewBloodgrp.php");
	}

	function fncLoadFlat(){
		$argTowerId= $_POST["towerId"];
		echo $argTowerId;
		$value=$this->loadModel('admin','viewFlat',$argTowerId);
	}
	function fncgetMemberBloodgrp()
	{
		$bloodgrp = $_POST['bloodgrp'];
		$this->loadModel('admin','getMemberBloodgrp','$bloodgrp');
		
	}
	function resolveComplain()
	{
		$complain_id=$_REQUEST['id'];
		$this->loadModel('admin','fncResolveComplain',$complain_id);
		//$this->loadView("panels/header_admin.php");
		//$this->loadView("panels/admin/sidebaradmin.php");
		//$this->loadView("panels/complaint.php",$arrValue);	
	}
	function fncPreviousComplains()
	{
		$arrValue = $this->loadModel('admin','fncPreviousComplains');
		$this->loadView("panels/header_admin.php");
		$this->loadView("panels/admin/sidebaradmin.php");
		$this->loadView("panels/allcomplains.php",$arrValue);
	}
}
?>
