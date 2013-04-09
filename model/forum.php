<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class forumModel extends connection
{
	//private $id;
    function __construct()
    {
      parent::__construct();
   }
   function checkForumTopic()
   {
        if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
        	
            $arrUser[]=array();
            $data = array();
            //$email=$_SESSION['email'];
            $data['tables']	= 'forum_question';
            $data['columns']	= array('forum_question.id','topic','validate_user.email_address','datetime','detail');
            $data['joins'][] = array(
            		'table' => 'validate_user',
            		'type'	=> 'left',
            		'conditions' => array('forum_question.member_id'=>'validate_user.id')
            );
            $result = $this->_db->select($data);
            
        	while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrUser[]=$row;
    				
    		}
               // print_r($arrUser);die();
            return $arrUser;
        }
   }
   
   function addTopic($arrArgument)
   {
   		if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
   		{
   			//print_r($arrArgument);
   			$uid=$_SESSION['uid'];
   			$topic=strip_tags($arrArgument['topic']);
   			$detail=strip_tags($arrArgument['detail']);
   			$name=$arrArgument['name'];
   			$email=$arrArgument['email'];
   			$datetime=$arrArgument['datetime'];
   	
   			$data1[] = array('topic'=> $topic,'detail'=>$detail,'name'=>$name,'member_id' => $uid,'datetime'=>$datetime);
   			
   			foreach($data1 as $row1){
   				//die("in model");
   				$result = $this->_db->insert('forum_question', $row1);
   			}
   		
   			//return  true;
   		}
   }
   function viewTopic($arrArgument)
   {
   	 if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
   	{
   		$arrUser=array();
   		$id = $_SESSION['quesid'];
   		$data['columns'] = array('question_id','a_id','a_name','a_member_id','validate_user.email_address','a_datetime','a_answer');
   		$data['tables'] = 'forum_answer';
   		$data['conditions'] = array('question_id'=> $id);
   		$data['order'] = 'a_datetime';
   		$data['joins'][] = array(
   				'table' => 'validate_user',
   				'type'	=> 'left',
   				'conditions' => array('forum_answer.a_member_id'=>'validate_user.id')
   		);
   		
   		//print_r($data);die();
   		$result = $this->_db->select($data);
   		while($row=$result->fetch(PDO::FETCH_ASSOC)){
   			//print_r($row);
   			$arrUser[]=$row;
   		
   		}
   		return $arrUser;
   		
   	}
   }
   function addAnswer($arrArgument)
   {
   	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
   	{
	 $id = $_SESSION['quesid'];
	 $name=$arrArgument['a_name'];
	 $memberid=$_SESSION['uid'];
	 $answer=strip_tags($arrArgument['a_answer']);
	 $datetime=$arrArgument['a_datetime'];
	 $data1[] = array('question_id'=> $id,'a_name'=>$name,'a_member_id'=>$memberid,'a_answer' => $answer,'a_datetime'=>$datetime);
	// print_r($data1);die();
	 foreach($data1 as $row1){
    		//die("in model");
    		$result = $this->_db->insert('forum_answer', $row1);
	 }
   	}
   }
   /*
   function viewAnswer()
   {
   	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
   	{
   		$arrUser=array();
   		$id = $_SESSION['quesid'];
   		$data['columns'] = array('a_id','a_name','a_email','a_datetime','a_answer');
   		$data['tables'] = 'forum_answer';		
   		$data['conditions'] = array('question_id'=> $id);
   		$data['order'] = 'a_datetime';
   		//print_r($data);die();
   		$result =print_r($this->_db->select($data));
   		while($row=$result->fetch(PDO::FETCH_ASSOC)){
   			$arrUser[]=$row;
   		
   		}
   		return $arrUser;
   		
   	}
   }*/
}
