<?php 
class pollController extends common{
	
	function fncLoadPoll()
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
        	
        	
		$this->loadView("poll/managepoll.php");
		$this->loadView("footer.php");
	}
	
	function fncAddPoll()
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
	 	   
		$this->loadView("poll/addpoll.php");
	
		$this->loadView("footer.php");
		if(isset($_POST['txtQues'])&&($_POST['txtAns1'])&&($_POST['txtAns2'])){
			
			$ques=strip_tags($_POST['txtQues']);
			$ans1=strip_tags($_POST['txtAns1']);
			$ans2=strip_tags($_POST['txtAns2']);
			$ans3=strip_tags($_POST['txtAns3']);
			$ans4=strip_tags($_POST['txtAns4']);
			$arrArgument=array('txtQues'=>$ques,'txtAns1'=>$ans1,
											'txtAns2'=>$ans2,'txtAns3'=>$ans3,'txtAns4'=>$ans4);
			//print_r($arrArgument);
			$value=$this->loadModel('poll','fncAddingPoll',$arrArgument);
			if($value){
				
			}
		}		
	}
	
	function fncViewPoll()
	{
		$value=$this->loadModel('poll','fncDisplayPoll');
	 //die("hello");
	  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}
        	
		
        		$this->loadView("panels/user/sidebaruser.php");
        	
        	
        	   
		$this->loadView('poll/viewpoll.php',$value);
		$this->loadView("footer.php");
	}
	
	function fncPollresults()
	{
		$pollid=$_REQUEST['pollid'];
		$arrArgument=array('pollid'=>$pollid);
		$value=$this->loadModel('poll','fncDisplayPollResult',$arrArgument);
		if($value){
		  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	}   
        	
		
        		$this->loadView("panels/user/sidebaruser.php");
        	
        	
        	
			$this->loadView('poll/displaypoll.php',$value);
			$this->loadView("footer.php");
		}
		else{
			$this->fncFinalDisplayResults();
			$this->loadView("footer.php");
		}
		
	}
	
	function fncCalculateResults()
	{
		$pollid=$_REQUEST['passid'];
		$commentid=strip_tags($_REQUEST['txtComment']);
		$answer=$_REQUEST['answer1'];
		$arrArgument=array('passid'=>$pollid,'txtComment'=>$commentid,'answer1'=>$answer);
		//print_r($arrArgument);die();
		$value=$this->loadModel('poll','fncCalculateResult',$arrArgument);
	  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	} 
        	
        		$this->loadView("panels/user/sidebaruser.php");
        	
        	  
		$this->loadView('poll/pollresults.php',$value);
		$this->loadView("footer.php");
	}
	
	function fncFinalDisplayResults()
	{
		$pollid=$_REQUEST['pollid'];
		$arrArgument=array('pollid'=>$pollid);
		$value=$this->loadModel('poll','fncDisplayResult',$arrArgument);
	  if($_SESSION['type']==3)
        	{
            $this->loadView("panels/panel_header.php");
        	}
        	else if($_SESSION['type']==2)
        	{
        		$this->loadView("panels/header_admin.php");
        	} 
        	
        		$this->loadView("panels/user/sidebaruser.php");
        	
        	  
		$this->loadView('poll/pollresults.php',$value);		
		$this->loadView("footer.php");
	}
}
?>