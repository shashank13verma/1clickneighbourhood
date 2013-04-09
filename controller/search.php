<?php
require_once(MODEL_PATH.'user.php');
require_once(CONTROLLER_PATH.'user.php');
require_once(MODEL_PATH.'admin.php');
require_once(CONTROLLER_PATH.'admin.php');
class searchController extends common{
	
	function fncSearch()
	{
		$search=$_POST['search'];
		//echo $search;
		$arrValue=$this->loadModel('search','fncSearch',$search);
		//print_r($arrValue);die();
		$this->loadView("panels/panel_header.php",$arrValue);
	}
}
