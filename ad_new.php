<?php
    if(!isset($_POST['acc']) || !isset($_POST['pwd']) || !isset($_POST['name']) || !isset($_POST['perm'])) return;
    include_once('connect.php');
    $con->query("insert into member (acc,pwd,name,perm) values('$_POST[acc]','$_POST[pwd]','$_POST[name]','$_POST[perm]') ");
    header('refresh:0,admin.php');
?>