<?php 
	session_start();
	if(!isset($_POST['filename'])) return;
	include_once('connect.php');
  $id = ($con->query("select * from letter order by id desc limit 1 ")->fetch_assoc()['id'] )+1;
  if(!$_FILES['file']['error']){
  	$co_name = explode( '/',$_FILES['file']['type'])[1];
  	$name = "file/" . $id . "." .$co_name;
  	move_uploaded_file($_FILES['file']['tmp_name'] , $name);
  }
  if($_POST['link'] != '' && !strpos($_POST['link'] , 'https://'))
  	$_POST['link'] = "https://" . $_POST['link'];
  @$con->query("insert into letter values(null,'$_POST[filename]','$_POST[title]','$_POST[content]','$name','$_POST[link]','$_POST[others]','$_SESSION[userid]',null,'$_POST[style]','$_POST[tag]') ");
  header('refresh:0,letter.php');
?>