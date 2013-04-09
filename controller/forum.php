<?php

require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');

/*
 * class forumController
 */

class forumController extends common {
	
    function __construct() {
	
       
    }
    
    function fncviewForum()
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
            $arrValue=$this->loadModel('forum','checkForumTopic');
            $this->loadView("panels/user/sidebaruser.php");
            $this->loadView("forum/main_forum.php",$arrValue);
            $this->loadView("footer.php");
        }
    }
    
    function fncCreateTopic()
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
            $this->loadView("forum/create_topic.php");
            $this->loadView("footer.php");
        }
    }
    
    function fncPostForum()
    {
    	$datetime =date("d/m/y h:i:s");
    	$topic=$_POST['topic'];
    	//echo $topic;
    	
    	$detail=$_POST['detail'];
    	$name=$_POST['name'];
    	$email=$_SESSION['email'];
    	$arrArgument=array('topic'=>$topic,'detail'=>$detail,'name'=>$name,'email'=>$email,'datetime'=>$datetime);
    	
    	$this->loadModel('forum','addTopic',$arrArgument);
    	
    	//di
    }
    
    function fncViewTopic()
    {	
    	$_SESSION['quesid'] = base64_decode($_GET['id']);
    	$id=$_SESSION['quesid'];
    	$arrArgument =array('id'=>$id);
    	$arrData=$this->loadModel('forum','viewTopic',$arrArgument);
    	if($_SESSION['type']==3)
    	{
    		$this->loadView("panels/panel_header.php");
    	}
    	else if($_SESSION['type']==2)
    	{
    		$this->loadView("panels/header_admin.php");
    	}
    	$this->loadView("panels/user/sidebaruser.php");
    	$this->loadView("forum/view_topic.php",$arrData);
    	$this->loadView("footer.php");
    }
    
    
    function fncPostAnswer()
    {
    	//$id = $_POST['id'];
    	if(isset($_POST['a_name']))
    	{
    	$datetime =date("d/m/y h:i:s");
    	
    	$id=$_SESSION['quesid'];
    	//echo $id;die();
    	$name=$_POST['a_name'];
    	
    	$answer=$_POST['a_answer'];
    	//print_r($_POST);die();
    	$arrArgument =array('question_id'=>$id,'a_name'=>$name,'a_answer'=>$answer,'a_datetime'=>$datetime);
       	
    	$this->loadModel('forum','addAnswer',$arrArgument);
    	}
    	$id=$_SESSION['quesid'];
       	$arrArgument =array('id'=>$id);
       	$arrData=$this->loadModel('forum','viewTopic',$arrArgument);
    if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}       	
        	$this->loadView("panels/user/sidebaruser.php");
        	$this->loadView("forum/view_topic.php",$arrData);
        	$this->loadView("footer.php");
    }
    /*function fncviewAnswer()
    {
	$this->loadView("panels/panel_header.php");
    	$arrData=$this->loadModel('forum','viewAnswer');
    	$this->loadView("forum/view_answer.php",$arrData);
    }*/
}



?>