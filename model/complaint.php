<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');

class complaintModel
{
    private $memebr_id;
    private $interested_in_id;
    function __construct()
    {
       $config = array();
			$config['user'] = 'root';
			$config['pass'] = 'root';
			$config['name'] = '1clickneighbourhood';
			$config['host'] = 'localhost';
			$config['type'] = 'mysql';
			$config['port'] = null;
			$config['persistent'] = true;
			$this->_db = db::instance($config);

   }
    
    function fncViewCompliant()
    {
    	if(isset($_SESSION['firstname']) && isset($_SESSION['society']))
    	{
    		$id=$_SESSION['societyid'];
		//echo $id;die();
		
    		
    		/*$arrData=array();    		
				$data['columns'] = array('society_id');
				$data['tables'] = 'user_profile';
				$data['conditions'] = array('id'=> $id);
				$result = $this->_db->select($data);
				if($row=$result->fetch(PDO::FETCH_ASSOC)){
					$societyid=$row['society_id'];
				}*/
			$data['columns']	= array('complain.id','description','complain.created_at','user_profile.first_name','user_profile.last_name','user_profile.phone');
			$data['tables']		= 'complain';
			$data['conditions']	= array('complain.society_id' => $id,'complain.status'=>'Active');
			$data['joins'][] = array(
							'table' => 'user_profile',
							'type'	=> 'left',
							'conditions' => array('complain.member_id' => 'user_profile.email_address')
					);
    		$result = $this->_db->select($data);
    		//print_r($result);die;
    		
    			while($row=$result->fetch(PDO::FETCH_ASSOC)){
						$arrData[]=$row;
							
					}
    		
    		
    		//echo "<pre>";
		//print_r($arrData);die();
		
    		 return $arrData;
    	}
    }
    
}
   
  