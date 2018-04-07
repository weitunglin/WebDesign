<?php
	session_start();
	$acc='';$pwd='';$authtext='';$authimg='';$authresult='';

	if(!isset($_POST['acc'])) { error(); return; }
	else if(!isset($_POST['pwd'])) { error(); return; }
	else if(!isset($_POST['authtext']) && !isset($_POST['authimg'])) { error(); return; }

	$authcode = array(ord($_SESSION['auth1']),ord($_SESSION['auth2']),ord($_SESSION['auth3']),ord($_SESSION['auth4']));

	asort($authcode);

	foreach($authcode as $key => $val){
		$authresult .= ($key+1);
	}

	include_once("./config/database.php");
	include_once("./objects/member.php");

	$database = new database();
	$db = $database->connect();

	$member = new member($db);

	$member->acc = $_POST['acc'];

	if(!$member->read_member() || $_POST['acc'] != $member->acc){

		echo "帳號錯誤";
		error();

	}else if($_POST['pwd'] != $member->pwd){
		
		echo "密碼錯誤";
		error();

	}else if($_POST['authtext'] != $_SESSION['auth1'].$_SESSION['auth2'].$_SESSION['auth3'].$_SESSION['auth4'] && $_POST['authimg'] != $authresult){
		
		echo $_POST['authimg']." ".$authresult;
		echo "驗證碼錯誤";
		error();

	}else{

		include_once('./objects/log.php');

		$log = new log($db);

		$log->userid = ($member->id + 1);    //userid to id
		$log->status = '1';

		if(!$log->create())
			return;

		$_SESSION['perm'] = $member->perm;
		$_SESSION['id'] = $member->id;

		echo "登入成功";
		$_SESSION['error'] = '0';
		
		header('refresh:0,main.php');

	}

	function error(){
	
		$errortimes = '';
		$errortimes = $_SESSION['error'];
		$errortimes++;


		if($errortimes >= 3){
			$_SESSION['error'] = $errortimes;
			echo "<h1>輸入錯誤已經".$errortimes."次</h1>";
			header("refresh:2,logerr.php");
		}else{
			$_SESSION['error'] = $errortimes;
			echo "<h1>輸入錯誤已經".$errortimes."次</h1>";
			header("refresh:1,member.php");
		}
	}
?>