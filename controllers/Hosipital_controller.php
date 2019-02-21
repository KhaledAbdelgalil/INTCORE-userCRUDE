<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../controllers/common.php");
	include_once("../models/Hosipital.php");
	
	class Hosipital_control 
{

	public function delete_hosipital()
	{
		$user=new Hosipital();
		$user->get_by_id($_GET['id']);
		$user->delete();
		echo json_encode(['status'=>1]);
	}
	public function add_hosipital()
	{
			$name = safeGet("name");
			$phone=safeGet("phone");
			$user=new Hosipital();
			$arr_fields=[];
			$arr_fields[]=$name;
			$arr_fields[]=$phone;
			$user->add($arr_fields);
	}

	public function edit_hosipital()
	{

			$id = safeGet("id", 0);
			$user=new Hosipital();
			$user->get_by_id($id);
			$user->name = safeGet("name");
			$user->phone=safeGet("phone");
			$arr_field=[];
			$arr_field[]=$user->name;
			$arr_field[]=$user->phone;
			$arr_field[]=$user->id;
			$n=2;
			$user->save($arr_field,$n);
	}
}

	$delete=$_GET['do'];
	
	
	
	if ($delete=="delete") 
	{
		Hosipital_control::delete_hosipital();
	
	}
	else
		{
		$id = safeGet("id", 0);
		if($id==0) //here id =0 new user is added
		{

			Hosipital_control::add_hosipital();

		} 
		else 
		{
			Hosipital_control::edit_hosipital();
		}
		header('Location: ../hosiptals.php');
		}
?>