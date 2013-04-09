<?php
class indexController extends common{

	function indexController(){

	}

	function fncLandingPage(){
		if(!(isset($_SESSION['uid']))){
			$this->loadView("header.php");
			$this->loadView("landingpage/body.php");
			$this->loadView("footer.php");
		}
		else{
			$this->loadView("panels/panel_header.php");
			$this->loadView("landingpage/body.php");
			$this->loadView("footer.php");
		}
	}

	function fncAboutUs(){
		if(!(isset($_SESSION['uid']))){
		$this->loadView("header.php");
		$this->loadView("aboutus/body.php");
		$this->loadView("footer.php");
		}
		else{
			$this->loadView("panels/panel_header.php");
			$this->loadView("aboutus/body.php");
			$this->loadView("footer.php");		
		}

	}

	function fncProducts()
	{
		if(!(isset($_SESSION['uid']))){
			$this->loadView("header.php");
			$this->loadView("products/body.php");
			$this->loadView("footer.php");
		}
		else{
			$this->loadView("panels/panel_header.php");
			$this->loadView("products/body.php");
			$this->loadView("footer.php");
		}	

	}

	function fncContactUs(){
		if(!(isset($_SESSION['uid']))){
			$this->loadView("header.php");
			$this->loadView("contactus/body.php");
			$this->loadView("footer.php");
		}
		else{
			$this->loadView("panels/panel_header.php");
			$this->loadView("contactus/body.php");
			$this->loadView("footer.php");			
		}
	}

}
?>