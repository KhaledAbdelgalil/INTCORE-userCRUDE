<?php
	//include_once('database.php');
	include_once('generic.php');

	class User extends generic
	  {
		function __construct($id) 
		{
			$this->table_name='users';
			$data_base= new Database();
			$sql = "SELECT * FROM ".$this->table_name. " WHERE id = $id;";
			//$statement = Database::$db->prepare($sql);
			$statement=$data_base->db->prepare($sql);
			$statement->execute();
			$data = $statement->fetch(PDO::FETCH_ASSOC);
			if(empty($data)){return;}
			foreach ($data as $key => $value) {
				$this->{$key} = $value;
			}
		} 
		
	}

		
	
?>