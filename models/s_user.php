<?php
	//include_once('database.php');
	include_once('generic.php');

	class S_user extends generic
	  {
		protected  $table_name = 's_users';
		protected $arr_attributes = array('name','street');
		protected $arr_attributes_3dd = array('?','?');

		//protected $arr_attributes_save = array('name = ?','street = ?');
	  	//$arr = array('Hello','World!','Beautiful','Day!');

	}

		
	
?>