<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');

/*
 * class advertisementController
 */

class complaintController extends common {
    function __construct() {
    
    }
    
    
    function fncComplaint()
    {
        if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
        	$arrComplaint = $this->loadModel('complaint','fncViewCompliant');
        if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	} 
        	$this->loadView("panels/admin/sidebaradmin.php");
            $this->loadView("panels/complaint.php",$arrComplaint);
            //$this->loadView("footer.php");           
        }
    }
    
}
