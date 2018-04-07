<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8>
	<script src="./vue/vue.js"></script>
	<script src=./jquery/jquery.js></script>
	<style>
		.top{
			display: flex;
			justify-content:center;
		}

		.topbutton{
			width:300px;
			height:60px;
			background-color:lightblue;
			border:thin solid black;
			border-radius:8px;
			font-size:30px;
		}

		.content{
			width:650px;
			height:450px;
			margin:0 auto;
			border:thin solid black;
			border-radius:10px;
			text-align:center;
		}

		.header{
			background-color:mediumblue;
			color:white;
			width:650px;
			height:30px;
			line-height:30px;
			border-radius:10px;
		}

		label{
			display:inline-flex;
			justify-content:center;
			width:100px;
			height:20px;
			background-color:yellow;
			line-height:20px;
			border:thin solid black;
			border-radius:6px;
			margin:15px;
		}

		#authshow{
			width:110px;
			height:30px;
			border:thin solid black;
			border-radius:6px;
			margin:0 auto;
		}

		span{
			font-size:14px;
		}
	</style>
</head>
<body>
	<br>
	<div class=top>
		<button class=topbutton onclick=location.assign('member.php')>會員登入</button>
		<button class=topbutton onclick=location.assign('letter.php')>電子報製作精靈</button>
	</div>
	<br>
</body>
</html>