<?php 
require_once(PDO_PATH.'/cxpdo.php');
require_once(PDO_PATH.'/mysql.php');


class searchModel
{
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

    function fncsearch()
    {
    	
    	if(isset($_SESSION['uid'])&&($_SESSION['societyid'])){
    		$search=$_POST['search'];
    		//echo $search;
    		$arrUser=array();
    		$data['columns'] = array('first_name','last_name');
    		$data['tables'] = 'user_profile';
    		$data['conditionslike']=array('first_name'=>$search);
    		//print_r($data);die();
    		   //$result = 
    		   print_r($this->_db->select($data));
    		
    	
    		while($row=$result->fetch(PDO::FETCH_ASSOC)){
    			$arrUser[]=$row;
    		}
    		//print_r($arrUser);
    		return $arrUser;
    	}
    }
    
}