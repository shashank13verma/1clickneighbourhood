<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');
require_once(MODEL_PATH.'db_connect.php');

class noticeModel extends connection
{
    
    function __construct()
    {
      parent::__construct();

   }
    
    function fncViewNotice()
    {
    	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
    	{
    		$id=$_SESSION['uid'];
    		
    		
    	$data['columns'] = array('society_id');
				$data['tables'] = 'user_profile';
				$data['conditions'] = array('id'=> $id);
				$result = $this->_db->select($data);
				if($row=$result->fetch(PDO::FETCH_ASSOC)){
					$societyid=$row['society_id'];
				}
			$data['columns']	= array('description','created_at');
    		$data['tables']		= 'notice';
    		$data['conditions']		= array('society_id' => $societyid);
    		$result = $this->_db->select($data);
    		//print_r($result);die;
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrData[]=$row['description'];
    			$arrData[]=$row['created_at'];
    		
    		}
    		//echo "<pre>"
    		 return $arrData;
    	}
    }
    
}
   
  