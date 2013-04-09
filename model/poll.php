<?php
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class pollModel extends connection{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function fncAddingPoll($arrArgument)
	{
		if(isset($_SESSION['uid'])&&($_SESSION['societyid'])){
			$ques=$arrArgument['txtQues'];
			$ans1=$arrArgument['txtAns1'];
			$ans2=$arrArgument['txtAns2'];
			$ans3=$arrArgument['txtAns3'];
			$ans4=$arrArgument['txtAns4'];
			
			$data[] = array('topic'=>$ques,'answer1'=>$ans1,'answer2'=>$ans2,
							'answer3'=>$ans3,'answer4'=>$ans4);
			
			foreach($data as $row){
				$result = $this->_db->insert('poll',$row);
				return true;
			}			
						
		}
	
	}
	
	function fncDisplayPoll()
	{
		if(isset($_SESSION['uid'])&&($_SESSION['societyid'])){
			$data['columns'] = array('id','topic','answer1','answer2','answer3','answer4');
			$data['tables'] = 'poll';
			$result = $this->_db->select($data);
			$arrUser=array();
						
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
			}
			return $arrUser;
		}		
	}

	function fncDisplayPollResult($arrArgument)
	{
		$pollid=$arrArgument['pollid'];
		$id=$_SESSION['uid'];
		
		$data['columns'] = array('answer');
		$data['tables'] = 'poll_details';
		$data['conditions']	= array('pollid' => $pollid,'user_id'=>$id);
		$result = $this->_db->select($data);
		if(!$row=$result->fetch(PDO::FETCH_ASSOC)){
			
			$data['columns'] = array('id','topic','answer1','answer2','answer3','answer4');
			$data['tables'] = 'poll';
			$data['conditions']	= array('id' => $pollid);
			$result = $this->_db->select($data);
			$arrUser=array();
		
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				$arrUser[]=$row;
			}
			return $arrUser;	
		}
		else{
			return 0;
		}
	}
	
	function fncCalculateResult($arrArgument)
	{
		if(isset($_SESSION['uid'])&&($_SESSION['societyid'])){
			$id=$_SESSION['uid'];
			$societyid=$_SESSION['societyid'];
			$pollid=$arrArgument['passid'];
			$comment=$arrArgument['txtComment'];
			$answer1=$arrArgument['answer1'];
			$arrUser = array();
		
			$data[] = array('pollid'=>$pollid,'user_id'=>$id,'society_id'=>$societyid,'answer'=>$answer1,'comments'=>$comment);
			foreach($data as $row){
				$result = $this->_db->insert('poll_details',$row);
				$arrUser[]=$row;
			}
// 			$datetime =date("d/m/y h:i:s");
// 			//echo $pollid;die();
// 			$table = 'poll';
// 			$data1[]=array('updated_at'=>$datetime);
// 			$where = array('id' => $pollid);
// 			$result = $this->_db->update($table, $data1, $where);
// 			print_r($result);die();
		}
		return $arrUser;
	}
	
	function fncDisplayResult($arrArgument)
	{
		$pollid=$arrArgument['pollid'];
		$arrUser = array();
		
		$data['columns']=array('poll.id','topic','user_profile.first_name','answer1','answer2','answer3','answer4','answer','comments');
		$data['tables'] = 'poll';
		$data['conditions'] = array('poll.id' => $pollid);
		
		$data['joins'][]=array(
					'table'=>'poll_details',
					'type'=>'INNER',
					'conditions'=> array('poll.id'=>'poll_details.pollid')				
				);
		
		$data['joins'][]=array(
				'table'=>'user_profile',
				'type'=>'INNER',
				'conditions'=> array('poll_details.user_id'=>'user_profile.id')
		);
		
		$result = $this->_db->select($data);
		
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$arrUser[]=$row;
		}
		//echo "<pre/>";
		//print_r($arrUser);
		return $arrUser;
	}
}
?>
