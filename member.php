<?php
	include_once('index.php');
?>
<div class=content id=content>
	<div class=header> 汽車共乘網站 -- 登入 </div><br>
	<form action=login.php method=post id=logform>
		<label>帳號</label><input type=text name=acc><br>
		<label>密碼</label><input type=password name=pwd><br>
		<label>圖形驗證碼</label><input type=text name=authtext><br>
		<div id=auth ondragover=dragover(event) ondragstart=dragstart(event) >
			<img src=./img.php?q=1 name=1 id=1 draggable=true>
			<img src=./img.php?q=2 name=2 id=2 draggable=true>
			<img src=./img.php?q=3 name=3 id=3 draggable=true>
			<img src=./img.php?q=4 name=4 id=4 draggable=true>
		</div>
		<input type=button onclick='return reload();' value=驗證碼重新產生><br><br>
		<span>請將上方圖形驗證碼依照ASCII碼由小至大拖曳至下方方框( 0-9 -> A-Z -> a-z )<br>若有相同則以左邊優先</span>
		<div id=authshow ondragover=dragover(event) ondrop=drop(event)>
			<input type=hidden name=authimg id=authimg>
		</div><br>
		<input type=submit><input type=reset onclick="return formreset();">

	</form>
</div>

<script>

	function dragstart(event){
		event.dataTransfer.setData('text',event.srcElement.id);
	}

	function dragover(event){
		event.preventDefault();
	}

	function drop(event){
		var id = event.dataTransfer.getData('text');
		$('#authimg').val($('#authimg').val()+id);
		$('#authshow').append($('#'+id));
	}

	function reload(event){
		$('#auth').html("");
		$('#auth').append("<img src=./img.php?q=1 id=1>");
		$('#auth').append("<img src=./img.php?q=2 id=2>");
		$('#auth').append("<img src=./img.php?q=3 id=3>");
		$('#auth').append("<img src=./img.php?q=4 id=4>");
	}

	function formreset(){
		$('#authshow').html("<input type=hidden name=authimg id=authimg>");
		$('#authimg').val("");
		reload();
	}

</script>