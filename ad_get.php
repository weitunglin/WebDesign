<?php 
    if(!isset($_GET['id'])) return;
    include_once('connect.php');
    $result = $con->query(" select * from member where id = '$_GET[id]'")->fetch_assoc();
    echo json_encode($result);
?>