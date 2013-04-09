<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class advertisementModel extends connection
{
    function __construct()
    {
      parent::__construct();
   }
   function LoadAdvertisement(){
   	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
   	{
   		//print_r($_SESSION);
   		$societyid=$_SESSION['societyid'];
   		$data = array();
   		$arrAdd=array();
   		$data['tables']		= 'add_details';
   		$data['columns']	= array('add_details.id','user_profile.society_id','user_profile.first_name','user_profile.last_name','user_profile.phone','add_details.description','master_codes.master_code_values');
   	
   		$data['conditions']	=	array('add_details.status'=>'Inactive','user_profile.society_id'=>$societyid);
   		$data['joins'][] = array(
   				'table' => 'user_profile',
   				'type'	=> 'left',
   				'conditions' => array('add_details.member_id' => 'user_profile.email_address')
   		);
   	
   		$data['joins'][] = array(
   				'table' => 'master_codes',
   				'type'	=> 'left',
   				'conditions' => array('add_details.interested_in_id' => 'master_codes.id')
   		);
   		$result = $this->_db->select($data);
   		//print_r($result);die;
   		while($row=$result->fetch(PDO::FETCH_ASSOC)){
   			$arrAdd[]=$row;
   	
   		}
   		//echo "<pre>";
   		//print_r($arrAdd);die;
   		return $arrAdd;
   	}
   	
   }
   function fncAuthorizeAdds(){
		   	if(isset($_SESSION['uid']))
		   	{
		   		$id=$_SESSION['uid'];
		   		$aid=$_REQUEST['id'];
		   	
		   		$data = array('status' => 'Active');
		   		$where = array('id' => $aid);
		   			
		   		$result = $this->_db->update('add_details', $data, $where);
		   	}
		   		
		   
   	}
   		
   
    function addAdvertisement($arrArgument)
    {	//die("hello");
        if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
        {
        		$id=$_SESSION['uid'];
        		$interestedin=$arrArgument['interestedin'];
        		$description=strip_tags($arrArgument['description']);
        		//die($description);
        		$data = array();
        		$data['columns'] = array('user_profile.society_id');
        		$data['tables'] = 'user_profile';
        		$data['conditions'] = array('user_profile.id'=> $id);
        		$result = $this->_db->select($data);
        		if($row=$result->fetch(PDO::FETCH_ASSOC)){
        			$societyid=$row['society_id'];
        		}
        		$data['columns'] = array('id');
        		$data['tables'] = 'master_codes';
        		$data['conditions'] = array('master_code_values'=> $interestedin);
        		$result = $this->_db->select($data);
        		if($row=$result->fetch(PDO::FETCH_ASSOC)){
        			$interestedid=$row['id'];
        		}
        		
        		//die ($interestedid);        		
        		$data1[] = array('member_id'=> $id,'society_id'=>$societyid,'interested_in_id'=>$interestedid,'description' => $description,'status'=>'Inactive');
        		foreach($data1 as $row1){
        			$result = $this->_db->insert('add_details', $row1);
        		}
        		
        		die($result);
        			
        			
        		
        		
        }
        
    }
    
    function viewAdvertisement()
    {
    	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
    	{
    		//print_r($_SESSION);
    		$societyid=$_SESSION['societyid'];
    		$data = array();
    		$data['tables']		= 'add_details';
    		$data['columns']	= array('user_profile.society_id','user_profile.first_name','user_profile.last_name','user_profile.phone','add_details.description','master_codes.master_code_values');
    		$data['order']	=	'add_details.created_at';
    		$data['conditions']	=	array('add_details.status'=>'Active','user_profile.society_id'=>$societyid);
    		$data['joins'][] = array(
    				'table' => 'user_profile',
    				'type'	=> 'left',
    				'conditions' => array('add_details.member_id' => 'user_profile.email_address')
    		);
    		
    		$data['joins'][] = array(
    				'table' => 'master_codes',
    				'type'	=> 'left',
    				'conditions' => array('add_details.interested_in_id' => 'master_codes.id')
    		);
    		$result = $this->_db->select($data);
    		//print_r($result);die;
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrAdd[]=$row;
    		
    		}
    		//echo "<pre>";
    		//print_r($arrAdd);die;
    		 return $arrAdd;
    	}
    }
    
}
   
  