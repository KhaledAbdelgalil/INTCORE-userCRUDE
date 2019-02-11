<?php
	include_once("../controllers/common.php");
	include_once("../models/user.php");
	//Database::connect('intcore(hello-world)', 'root', '');
	$id = safeGet("id", 0);
	if($id==0) {

		$name = safeGet("name");
		User::add($name);
	} else {
		$user = new User($id);
		$user->name = safeGet("name");
		$user->save();
	}
	header('Location: ../users.php');
?>