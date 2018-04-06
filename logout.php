<?php
	session_start();

	include_once('./config/database.php');
	include_once('./objects/log.php');

	$database = new database();
	$db = $database->connect();
	$log = new log($db);

	$log->login = 0;
	$log->userid = $_SESSION['id'];

	if(!$log->update_logout()) return;

	$_SESSION['id'] = '';
	$_SESSION['perm'] = '';

	header('refresh:0,index.php');

?>