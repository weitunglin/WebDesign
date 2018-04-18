<?php
    $con = new mysqli('localhost','root','1234','v6');
    if($con->connect_errno)
        echo "Error : $_con->connect_error";
    $con->query("set names utf8");
?>