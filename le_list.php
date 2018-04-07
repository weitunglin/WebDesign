<?php
    session_start();

    if(!isset($_GET['page'])) return false;

    include_once("./config/database.php");
    include_once("./objects/letter.php");

    $database = new database();
    $db = $database->connect();
    $letter = new letter($db);

    $letter->orderby = 'time';
    $letter->dir = 'desc';
    $letter->limit = '20';

    $total_rows = $letter->read_row()->fetch_assoc()['count(*)'];

    $total_pages = floor($total_rows/$letter->limit) + 1;

    $letter->offset = ($_GET['page']-1) * $letter->limit;

    $result = $letter->read_all();

    $result = $result->fetch_all();

    $paging = array();

    $arr = array();

    for($i=1;$i<=$total_pages;$i++)
        $paging['paging'][] = $i;
    
    foreach($result as $index => $r){
        foreach($r as $k => $v){
            $arr['letter'][$index][$k] = $v;
        }
    }

    echo json_encode(array_merge($arr,$paging),JSON_FORCE_OBJECT);
?>