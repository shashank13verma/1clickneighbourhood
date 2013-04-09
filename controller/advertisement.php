<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');

/*
 * class advertisementController
 */

class advertisementController extends common {
    function __construct() {
    
    }
    function fncLoadAdds(){
    	$arrValue=$this->loadModel('advertisement','LoadAdvertisement');
    	$this->loadView("panels/header_admin.php");
    	$this->loadView("panels/admin/sidebaradmin.php");
    	$this->loadView("panels/admin/authorizeAdds.php",$arrValue);
    	$this->loadView("footer.php");
    }
    function fncAuthorizeAdds()
    {
		//print_r($_REQUEST);die();   

		$id=$_REQUEST['id'];
		$arrValue=$this->loadModel('advertisement','fncAuthorizeAdds',$id);
		
    }
    function fncadvertisement()
    {
        if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
        	$arrAdd = $this->loadModel('advertisement','viewAdvertisement');
          if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
        	
        		$this->loadView("panels/user/sidebaruser.php");
        	
            $this->loadView("panels/viewAdvertise.php",$arrAdd);
            $this->loadView("footer.php");
        }
    }
    function fncaddAdvertisement()
    {
    	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
          if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}
        		$this->loadView("panels/user/sidebaruser.php");
        	
        	
            $this->loadView("panels/advertise.php");
            $this->loadView("footer.php");
        }
       
        
    }
    function fncpostAdvertisement()
    {		//die("hello");
    		$id = $_POST['id'];
    		$interestedin=$_POST['interestedin'];
    		$description=strip_tags($_POST['description']);
    		$arrArgument=array('interestedin'=>$interestedin,'description'=>$description);
    		//print_r($arrArgument);
    		
    		$arrValue = $this->loadModel('advertisement','addAdvertisement',$arrArgument);
      if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}
        	
        		$this->loadView("panels/user/sidebaruser.php");
        	
        		$this->loadView("panels/admin/sidebaradmin.php");
        	   
    		$this->loadView("panels/advertise.php",$arrValue);
    		$this->loadView("footer.php");
    		
    
    	
    	
    }
    
}
