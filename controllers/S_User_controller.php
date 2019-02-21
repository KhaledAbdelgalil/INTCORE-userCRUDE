<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../controllers/common.php");
	include_once("../models/s_user.php");
	
	
	class S_user_controller_model 
	{
		
		public function S_user_delete()
		{
		$user=new S_user();
		$user->get_by_id($_GET['id']);
		$user->delete();
		echo json_encode(['status'=>1]);
		}
		public function S_user_add()
		{
			
			$name = safeGet("name");
			$street=safeGet("street");
			$user=new S_user();
			$arr_fields=[];
			$arr_fields[]=$name;
			$arr_fields[]=$street;
			$user->add($arr_fields);

		}
		public function S_user_edit()
		{
			$id = safeGet("id", 0);
			$user=new S_user();
			$user->get_by_id($id);
			$user->name = safeGet("name");
			$user->street=safeGet("street");
			$arr_field=[];
			$arr_field[]=$user->name;
			$arr_field[]=$user->street;
			$arr_field[]=$user->id;
			$n=2;
			$user->save($arr_field,$n);
		}

	}

	
	$function=$_GET['do'];
	
	
	if ($function=="delete") 
	{
		S_user_controller_model::S_user_delete();
	}
	else
		{
		$id = safeGet("id", 0);
		if($id==0) 
		{
			S_user_controller_model::S_user_add();
			
		} 
		else 
		{
			S_user_controller_model::S_user_edit();
		}
	header('Location: ../s_users.php');
		}
?>