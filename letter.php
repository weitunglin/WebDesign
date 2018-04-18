<?php session_start(); include_once('connect.php'); ?>
<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<script src=./jquery/jquery.js></script>
	<script src=./jquery/jquery-ui.js></script>
	<link rel=stylesheet href=./jquery/jquery-ui.css>
	<style>
			#selectarea button{
				background-color:white;
				width:60px;
				height:30px;
			}
	</style>
</head>
<body>   
	<?php if(@$_SESSION['userperm'] == 's' || @$_SESSION['userperm'] == 'a') { ?>
	<button onclick=page('browse') >瀏覽電子報</button>
	<button onclick=page('query')>查詢及統計電子報</button>
	<button onclick=create() >新增電子報</button>
	<button onclick=createtemplate()>新增電子報版型</button>
	<button onclick=location.assign('admin.php')>管理專區</button>
	<?php }else if(@$_SESSION['userperm'] == 'c') { ?>
	<button onclick=page('browse') >瀏覽電子報</button>
	<button onclick=page('query')>查詢及統計電子報</button>
	<button onclick=create() >新增電子報</button>
	<button onclick=createtemplate()>新增電子報版型</button>
	<button onclick=location.assign('client.php')>會員專區</button>
	<?php }else { ?>
	<button onclick=page('browse') >瀏覽電子報</button>
	<button onclick=page('query')>查詢及統計電子報</button>
	<button onclick=location.assign('index.php')>首頁</button>
	<?php } ?>
	
	<div id=browse class=content>
		<?php $letter = $con->query("select l.*,m.name as author from letter l join member m on l.author=m.id order by l.time desc"); ?>
		<table id=browsetable>
			<tr>
				<th>編號</th>
				<th>檔名</th>
				<th>作者</th>
				<th>時間</th>
				<?php if(@$_SESSION['userperm'] == 's' || @$_SESSION['userperm'] == 'a') { ?>
				<th colspan=3>管理</th>
				<?php } ?>
			</tr>
			<?php while($row = $letter->fetch_assoc() ) { ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['filename']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['time']; ?></td>
				<?php if(@$_SESSION['userperm'] == 's' || @$_SESSION['userperm'] == 'a') { ?>
				<td><input type=button onclick=edit('<?php echo $row['id']; ?>') value=編輯></td>
				<td><input type=button onclick=delete('<?php echo $row['id']; ?>') value=刪除></td>
				<td><select name=ad_viewtemp><option value=none>原版型</option><option value=classic>classic</option><option value=normal>normal</option><option value=qqqq>qqqq</option></select></td>
				<td><input type=button onclick=ad_view('<?php echo $row['id']?>') value="查看"></td>
				<?php }else { ?>
				<td><input type=button onclick=view('<?php echo $row['id']; ?>') value=查看></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</table>
	</div>
	
	<div id=query class=content>
		<select name=col>       
			<option value=all>全文搜尋</option>
			<option value=l.id>編號</option>
			<option value=l.filename>檔名</option>
			<option value=l.title>標題</option>
			<option value=l.content>內容</option>
			<option value=l.link>連結</option>
			<option value=m.name>作者</option>
			<option value=l.others>其他</option>
			<option value=l.tag>標籤</option>
		</select>
		<input type=text name=key id=key> <input type=button onclick=query() value=搜尋> <br />
		<div id=queryresult>
		<table>
			<tr>      
				<th>編號</th>
				<th>檔名</th>
				<th>標題</th>
				<th>內容</th>
				<th>連結</th>
				<th>作者</th>
				<th>其他</th>
				<th>標籤</th>
			</tr>
		</table>
		</div>
	</div>
	
	<div id=viewdialog class=content></div>
	
	<div id=createdialog class=content>
	<form action=le_create.php method=post enctype=multipart/form-data >
		<label>Filename :　</label><input type=text name=filename id=cfilename><br />
		<label>Title :　</label><input type=text name=title id=ctitle><br />
		<label>Content :　</label><input type=text name=content id=ccontent><br />
		<label>File :　</label><input type=file name=file id=cfile><br />
		<label>Link :　</label><input type=text name=link id=clink><br />
		<label>Tag :　</label><input type=text name=tag id=ctag><br />
		<label>Others : </label><input type=text name=ohters id=cothers><br />
		<label>Style : </label>
		<select name=style>
		<?php $style = $con->query("select * from style"); while($row = $style->fetch_assoc()){ ?>
		<option value=<?php echo $row['name']; ?> ><?php echo $row['name']; ?></option>
		<?php } ?></select><br /><br />
		<input type=submit> <input type=reset >
	</form>
	</div>
	
	<div id=editdialog class=content>
		
	</div>
	
	<div id=createtemplatedialog class=content>
		版型名稱 : <input type=text name=templatename> <br/>
		<select name=area>	 
			<option id=ttitle value=title>title</option>
			<option id=tcontent value=content>content</option>
			<option id=tfile value=file>file</option>
			<option id=tlink value=link>link</option>
			<option id=tfooter value=footer>footer</option>
		</select><br />
		<span>
		區塊間不能分離且是唯一的，錯誤範例 : " title content title "，<br />
		每一欄位都需選擇顯示區塊。<br />
		</span>
		<div id=selectarea >
			<?php 
			for($i=1;$i<=5;$i++){
				for($j=1;$j<=5;$j++){
					echo "<button onclick=select(" . ($j+($i-1)*5) . ") id=" . ($j+($i-1)*5) . ">" . ($j+($i-1)*5) . "</button>";
				}
				echo "<br />";
			}
			?>
		</div><br />
		<input type=submit onclick=new_template()><input type=reset onclick=reset_template()>
	</div>
</body>

<script>
	
	function ad_view(index){
		var temp = $('[name=ad_viewtemp]').val();
		if(temp == 'none'){
			view(index);
		}else {
			$.get('le_ad_view.php?id='+index+'&temp='+temp,
			function(resp){
				$('#viewdialog').html(resp);
				viewdialog.dialog('open');
			});
		}
		
	}
	
	function query(){
		var col = $('[name=col]').val();
		var key = $('#key').val();
		$.get('le_query.php?col='+col+'&key='+key,
			function(resp){
				$('#queryresult').html(resp);
			});
	}
	
	function create(){
		$('#cfilename').val("");
		$('#ctitle').val("");
		$('#ccontent').val("");
		$('#cfile').val("");
		$('#clink').val("");
		$('#ctag').val("");
		$('#cothers').val("");
		createdialog.dialog('open');
	}
	
	function createtemplate(){
		createtemplatedialog.dialog('open');
	}
	
	function select(index){
		var item = $('[name=area]').val();
		$('#'+index).val(item);
		$('#'+index).text(item);
		if(item == 'title')
			$('#'+index).css('background-color','red');
		else if(item == 'content')
			$('#'+index).css('background-color','brown');
		else if(item == 'file')
			$('#'+index).css('background-color','blue');
		else if(item == 'link')
			$('#'+index).css('background-color','green');
		else if(item == 'footer')
			$('#'+index).css('background-color','purple');
	}
	
	function new_template(){
		createtemplatedialog.dialog('close');
		var body = "margin:0 auto;display:grid;grid-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;";
		body += "grid-template-areas:";
		for(i=1;i<=5;i++){
			body += '"';
			for(j=1;j<=5;j++){
				if($('#'+(j+(i-1)*5)).val() == '')
					body += " . ";
				else
					body +=	$('#'+(j+(i-1)*5)).val()+' ';
			}
			body += '"';
		}
		body += ';';
		var name = $('[name=templatename]').val();
		$.post('new_template.php',
					{ name:name , body:body ,} ,
					function(resp){
					});
	}
	
	function reset_template(){
		$('#selectarea button').css('background-color','white');
		$('#selectarea button').val("");
		for(i=1;i<=25;i++){
			$('#'+i).html(i);
		}
	}
	
	function view(id){
		$.get('le_view.php',
			{ id : id },
			function(resp){
				$('#viewdialog').html(resp);
				viewdialog.dialog('open');
			});
	}
	
	function page(str){
		$('.content').hide();
		$('#'+str).fadeIn(500);
	}
	
	$(function(){
		$('.content').hide();
	})
	
	var viewdialog = $('#viewdialog').dialog({
		title:' View Dialog ',
		autoOpen:false,
		width:620,
		height:500,
		modal:true,
	});
	
	var editdialog = $('#editdialog').dialog({
		title:' Edit Dialog ',
		autoOpen:false,
		width:500,
		height:600,
		modal:true,
	});
	
	var createdialog = $('#createdialog').dialog({
		title:' Create Dialog ',
		autoOpen:false,
		width:500,
		height:350,
		modal:true,
	});
	
	var createtemplatedialog = $('#createtemplatedialog').dialog({
		title:"Create Template",
		autoOpen:false,
		width:550,
		height:400,
		modal:true,
	});
</script>

</html>