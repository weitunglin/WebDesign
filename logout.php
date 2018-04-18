<?php
    session_start();
    include_once('connect.php');
    $con->query(" insert into log (userid,status) values ( '$_SESSION[userid]' , '0')");
    $_SESSION['userid'] = '';
    $_SESSION['username'] = '';
    $_SESSION['userperm'] = '';
    header('refresh:0,index.php');
?>