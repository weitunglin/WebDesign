<?php 
    include_once('connect.php');
    $result = $con->query(" update member set acc='$_POST[acc]',pwd='$_POST[pwd]',name='$_POST[name]',perm='$_POST[perm]' where id= '$_POST[id]' ");
    echo "console.log(".$result==1?'成功':'失敗'.");";
    header('refresh:0,admin.php');
?>