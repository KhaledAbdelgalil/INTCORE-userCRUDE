<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../controllers/common.php");
	include_once("../models/user.php");
	
	class User_controller
	{
		public function User_delete()
		{
		$user=new User();
		$user->get_by_id($_GET['id']);
		$user->delete();
		echo json_encode(['status'=>1]);
		}
		public function User_add()
		{
			//$id = safeGet("id", 0);
			$name = safeGet("name");
			$user=new User();
			$arr_fields=[];
			$arr_fields[]=$name;
			//$user->get_by_id($id);
			$user->add($arr_fields);
		}
		public function User_edit()
		{
			$id = safeGet("id", 0);
			$user=new User();
			$user->get_by_id($id);
			$user->name = safeGet("name");
			$arr_field=[];
			$arr_field[]=$user->name;
			$arr_field[]=$user->id;
			$user->save($arr_field,1);
		}
	}

	
	$function=$_GET['do'];
	
	
	if ($function=="delete") 
	{
		User_controller::User_delete();
	}
	else
		{
		$id = safeGet("id", 0);
		if($id==0) 
		{
			User_controller::User_add();
		} 
		else 
		{
			User_controller::User_edit();
		}
		header('Location: ../users.php');
		}
?>