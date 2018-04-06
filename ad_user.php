<?php
	
	if(!isset($_GET['page'])) return json_encode(" 'message' => 'error' ");
	else $page = $_GET['page'];

	include_once('./config/database.php');
	include_once('./objects/member.php');

	$database = new database();
	$db = $database->connect();
	$member = new member($db);

	$member->orderby = 'id';
	$member->dir = 'asc';
	$member->limit = 20;

	$total_rows = $member->read_row()->fetch_assoc()['COUNT(*)'];

	$rows_per_page = $member->limit;

	$total_page = floor($total_rows/$rows_per_page) + 1; 

	$member->offset = ($page - 1) * $rows_per_page;

	if(isset($_GET['key'])){

		if(!$result = $member->search_paging($_GET['key'])) return json_encode(" { 'user':'','paging':'1' } ");

	} else if(isset($_GET['id'])){

		if(!$result = $member->search_id($_GET['id'])) return json_encode(" { 'user':'','paging':'1' }");

	} else {

		$result = $member->read_paging();

	}

	$result = $result->fetch_all();

	$paging = array();

	$arr = array();

	foreach($result as $index => $r){
		foreach($r as $k => $v){
			$arr['user'][$index][$k] = $v;
		}
	}

	for($i=1;$i<=$total_page;$i++){
		$paging['paging'][] = $i;
	}

	echo json_encode(array_merge($paging,$arr),JSON_FORCE_OBJECT);
?>