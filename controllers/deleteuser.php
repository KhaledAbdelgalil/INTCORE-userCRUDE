<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/user.php");
	//Database::connect('intcore(hello-world)', 'root', '');
	$user = new user($_GET['id']);
	$user->delete();
	echo json_encode(['status'=>1]);
?>