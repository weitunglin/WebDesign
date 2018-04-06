<?php
	if(!isset($_POST['id'])) return false;

	include_once("./config/database.php");
	include_once("./objects/member.php");

	$database = new database();
	$db = $database->connect();
	$member = new member($db);

	$member->id = $_POST['id'];

	if($member->delete())
		return true;
	else
		return false;

?>