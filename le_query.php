<?php 
	include_once('connect.php');
	if( $_GET['key'] == '')
		$result = $con->query("select l.*,m.name as author from letter l join member m on m.id=l.author ");
	else if($_GET['col'] == 'all')
		$result = $con->query("select l.*,m.name as author from letter l join member m on m.id=l.author where l.id like '%$_GET[key]%' or l.filename like '%$_GET[key]%' or l.title like '%$_GET[key]%' or l.content like '%$_GET[key]%' or l.link like '%$_GET[key]%' or m.name like '%$_GET[key]%' or l.tag like '%$_GET[key]%'");
	else 
		$result = $con->query("select l.*,m.name as author from letter l join member m on m.id=l.author where $_GET[col] like '%$_GET[key]%' ");
	$count = 0;
	@$count = $result->num_rows;
	echo "共計" . $count . "筆資料。";
	echo "<table>
					<tr>      
						<th>編號</th>
						<th>檔名</th>
						<th>標題</th>
						<th>內容</th>
						<th>連結</th>
						<th>作者</th>
						<th>其他</th>
						<th>標籤</th>
					</tr>";
	while(@$row = $result->fetch_assoc()){
		echo "<tr>
						<td>".$row['id']."</td>
						<td>".$row['filename']."</td>
						<td>".$row['title']."</td>
						<td>".$row['content']."</td>
						<td>".$row['link']."</td>
						<td>".$row['author']."</td>
						<td>".$row['others']."</td>
						<td>".$row['tag']."</td>
					</tr>";
	}
	echo "</table>";
?>