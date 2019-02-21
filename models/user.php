<?php
	//include_once('database.php');
	include_once('generic.php');

	class User extends generic
	  {
		protected  $table_name='users';
	  	protected $arr_attributes =array('name');
	  	protected $arr_attributes_3dd = array('?');

	  }

		
	
?>