<?php class connection{

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

}
