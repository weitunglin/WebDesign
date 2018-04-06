<?php
	
	if(!isset($_GET['page'])) return json_encode(" 'message' => 'error' ");
	else $page = $_GET['page'];

	include_once('./config/database.php');
	include_once('./objects/log.php');

	$database = new database();
	$db = $database->connect();
	$log = new log($db);

	$log->orderby = 'id';
	$log->dir = 'asc';
	$log->limit = 20;

	$total_rows = $log->read_row()->fetch_assoc()['COUNT(*)'];

	$rows_per_page = $log->limit;

	$total_pages = floor($total_rows/$rows_per_page)+1;

	$log->offset = ($page-1)*$rows_per_page;

	$result = $log->read_paging();

	$result = $result->fetch_all();
	
	$arr = array();

	foreach($result as $index => $r){
		foreach($r as $k => $v){
			$arr['log'][$index][$k] = $v;
			if($k == 4)
				$arr['log'][$index][$k] = $v ? '登入' : '登出';
		}
	}

	$paping = array();

	for($i=1;$i<=$total_pages;$i++){
		$paging['paging'][] = $i;
	}

	echo json_encode(array_merge($paging,$arr),JSON_FORCE_OBJECT);

?>