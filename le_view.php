<?php 
	if(!isset($_GET['id'])) return;
	include_once('connect.php');
	$letter = $con->query(" select l.*,m.name as author from letter l join member m on l.author=m.id where l.id='$_GET[id]' ")->fetch_assoc();
	$style = $con->query("select * from style where name='$letter[style]' ")->fetch_assoc();
	echo "<div id=view>
					<div id=viewtitle>".$letter['title']."</div>
					<div id=viewcontent>".$letter['content']."</div>
					<div id=viewfile><img src=".$letter['file']." style='width:200px;'></div>
					<div id=viewlink><a href=".$letter['link'].">".$letter['link']."</a></div>
					<div id=viewfooter>Made By ".$letter['author']."</div>
				</div>";
	echo "<style scoped>
				#view{ ".$style['body']." }
				#viewtitle{ ".$style['title']." } 
				#viewcontent{ ".$style['content']." }
				#viewfile{ ".$style['file']." }
				#viewlink{ ".$style['link']." }
				#viewfooter{ ".$style['footer']." }
				</style>";

?>
