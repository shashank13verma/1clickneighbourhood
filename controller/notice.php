<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');

/*
 * class advertisementController
 */

class noticeController extends common {
    function __construct() {
    
    }
    
    
    function fncNotice()
    {
        if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
        	$arrNotice = $this->loadModel('notice','fncViewNotice');
          if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
        	
        		$this->loadView("panels/user/sidebaruser.php");
        	
            $this->loadView("panels/notice.php",$arrNotice);
           $this->loadView("footer.php");
        }
    }
    
}
