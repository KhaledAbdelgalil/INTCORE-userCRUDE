<?php
	//include_once('database.php');
	include_once('generic.php');

	class Hosipital extends generic
	  {
		protected  $table_name = 'hos';
		protected $arr_attributes = array('name','phone');
		protected $arr_attributes_3dd = array('?','?');

		//protected $arr_attributes_save = array('name = ?','street = ?');
	  	//$arr = array('Hello','World!','Beautiful','Day!');

	}

		
	
?>