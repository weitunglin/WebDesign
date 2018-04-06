<?php
	if(!isset($_POST['name']) || !isset($_POST['acc']) || !isset($_POST['pwd']) || !isset($_POST['perm']) || !isset($_POST['id']))
		return false;

	include('./config/database.php');
	include('./objects/member.php');

	$database = new database();
	$db = $database->connect();
	$member = new member($db);

	$member->id = $_POST['id'];
	$member->name = $_POST['name'];
	$member->acc = $_POST['acc'];
	$member->pwd = $_POST['pwd'];
	$member->perm = $_POST['perm'];

	if($member->edit())
		return "Success";
	else
		return "Failed";

?>