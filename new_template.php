<?php
	if(!isset($_POST['name'])) return;
	include_once('connect.php');
	$result = $con->query("insert into style (name,body) values('$_POST[name]','$_POST[body]')");
	echo $result;
	header('refresh:0,letter.php');
?>