<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script src="./jquery/jquery.js"></script>
	<script src="./jquery/jquery-ui.js"></script>
	<link rel="stylesheet" href="./jquery/jquery-ui.css">
	<script src="./vue/vue.js"></script>
	<meta charset="utf-8">
	<style>	
		.banner{
			background-color:mediumblue;
			color:white;
			border-radius: 10px;
			border:thin solid black;
			font-size:35px;
			width:350px;
			height:80px;
			line-height:80px;
			display:flex;
			justify-content:center;
			margin: 20px auto;
		}

		.top{
			display:flex;
			justify-content:center;
		}

		.topbutton{
			width:250px;
			height:50px;
			background-color:lightblue;
			border-radius:10px;
			font-size:20px;
		}

		.center{
			margin:0 auto;
			display:flex;
			justify-content:center;
		}

		th,td{
			border:thin solid black;
			border-radius:4px;
			text-align:center;
			width:95px;
		}

		th{
			cursor:pointer;
		}
	</style>
</head>
<body>
	<div id=app>
		<div v-if="user == 's' || user == 'r'" class=banner>管理者專區</div>
		<div v-else class=banner>一般會員專區</div>
		<div v-if="user == 's' || user == 'r'">
			<div class=top>
				<button class=topbutton v-on:click=userdata()>使用者帳號資料</button>
				<button class=topbutton v-on:click=logrecord()>使用者登入登出紀錄</button>
				<button class=topbutton onclick=location.assign('letter.php');>電子報製作精靈</button>
				<button class=topbutton onclick=location.assign('logout.php');>登出</button>
			</div>
			<p>&nbsp;</p>
			<div class=content v-if=user_table>
				<div class=center>
					<label> 查詢關鍵字 : </label>
					<input type=text v-model=key v-on:keyup.enter=search()>
					<input type=button v-on:click=search() value=搜尋>
				</div>
				<br>
				<table class=center>
					<tr>
						<th v-on:click="sort('id')">使用者編號</th>
						<th v-on:click="sort('acc')">帳號</th>
						<th v-on:click="sort('pwd')">密碼</th>
						<th v-on:click="sort('name')">姓名</th>
						<th v-on:click="sort('perm')">權限</th>
						<th colspan=2>管理</th>
					</tr>
					<tr v-for='user in users'>
						<td>{{ user[0] }}</td>
						<td>{{ user[1] }}</td>
						<td>{{ user[2] }}</td>
						<td>{{ user[4] }}</td>
						<td>{{ user[3] }}</td>
						<td><input type=button value=編輯 v-on:click=edit_user(parseInt(user[0])+1)></td>
						<td><input type=button value=刪除 v-on:click=delete_user(parseInt(user[0])+1)></td>
					</tr>
				</table>
				<div class=center> - {{  page_user }} - </div>
				<div class=center>
					<button v-for='paging in paging' v-on:click=pages_user(paging) >{{ paging }}</button>
				</div>
			</div>
			<div class=content v-if=log_table>
				<table class=center>
					<tr>
						<th>流水號</th>
						<th>使用者編號</th>
						<th>帳號</th>
						<th>登入時間</th>
						<th>動作</th>
					</tr>
					<tr v-for='log in logs'>
						<td>{{ log[0] }}</td>
						<td>{{ log[1] }}</td>
						<td>{{ log[2] }}</td>
						<td>{{ log[3] }}</td>
						<td>{{ log[4] }}</td>
					</tr>
				</table>
				<div class=center> - {{ page_log }} - </div>
				<div class=center>
					<button v-for='paging in paging' v-on:click=pages_log(paging) >{{ paging }}</button>
				</div>
			</div>
			<div class=center id=dialog title=編輯使用者>
				<form>
					<fieldset>
						<legend>編輯使用者</legend>
						<input type=hidden v-model=id>
						<label>姓名 : </label><input type=text v-model=name><br>
						<label>帳號 : </label><input type=text v-model=acc><br>
						<label>密碼 : </label><input type=text v-model=pwd><br>
						<label>權限 : </label><br>
						<input type=radio id=s value=s v-model=perm><label for=s>S(特別管理者)</label>
						<input type=radio id=r value=r v-model=perm><label for=r>R(系統管理者)</label>
						<input type=radio id=c value=c v-model=perm><label for=c>C(一般管理者)</label>
						<br>
						<input type=button value=編輯 v-on:click=update_user()><input type=reset value=返回 onclick="dialog.dialog('close')">
					</fieldset>
				</form>
			</div>
		</div>

		<div v-else>
			<div class=top>
				<button class=topbutton onclick=location.assign('letter.php');>電子報製作精靈</button>
				<button class=topbutton onclick=location.assign('logout.php');>登出</button>
			</div>
		</div>
	</div>
</body>

<script>
	
	var app = new Vue({
		el:'#app',
		data:{
			user:'',
			users:null,
			logs:null,
			paging:null,
			page_user:1,
			page_log:1,
			user_table:false,
			log_table:false,
			key:'',
			edit:'',
			name:'allen',
			acc:'allen',
			pwd:'allen2001',
			perm:'c',
			id:null,
			orderdir:'asc'
		},
		methods:{
			userdata:function(){
				
				$.get('ad_user.php?page='+app.page_user,
					function(resp){
						var resp = JSON.parse(resp);
						app.paging  = resp.paging;
						app.users = resp.user;
					});

				app.user_table = true;
				app.log_table = false;
			},
			search:function(){

				$.get('ad_user.php?page=1&key='+app.key,
					function(resp){
						var resp = JSON.parse(resp);
						app.paging  = resp.paging;
						app.users = resp.user;
					});
			},
			logrecord:function(){

				$.get('ad_log.php?page='+app.page_log,
					function(resp){
						var resp = JSON.parse(resp);
						app.paging = resp.paging;
						app.logs = resp.log;
					});

				app.user_table = false;
				app.log_table = true;
			},
			pages_user:function(p){

				app.page_user = p;
				app.userdata();

			},
			pages_log:function(p){

				app.page_log = p;
				app.logrecord();

			},
			edit_user:function(id){

				if(id == 1 && app.user != 's') return alert(" Access Denied ! ( NO PERMISSION )");

				$.get('ad_user.php?page=1&id='+id,
					function(resp){
						var resp = JSON.parse(resp);
						result = resp.user[0];
						app.id = parseInt(result[0])+1;
						app.acc = result[1];
						app.pwd = result[2];
						app.perm = result[3];
						app.name = result[4];
						dialog.dialog("open");
					});
			},
			delete_user:function(id){

				$.ajax({
					url:'ad_user_delete.php',
					method:'post',
					dataType:'text',
					data:{
						id:id
					},
					function(resp){
						console.log(resp);
					}
				})
				
				app.userdata();

				dialog.dialog("close");

			},
			update_user:function(){

				if(app.name == '') {
					return alert("格式錯誤");
				}
				else if(app.acc == ''){
					return alert("格式錯誤");
				} 
				else if(app.pwd == ''){
					return alert("格式錯誤");
				}
				else if(app.perm == 's'){
					return lert(" Access Denied ! ( NO PERMISSION )");
				} 

				$.ajax({
					url:'ad_user_edit.php',
					method:'post',
					dataType:'text',
					data:{
						id:app.id,
						name:app.name, 
						acc:app.acc, 
						pwd:app.pwd, 
						perm:app.perm
					}
				})

				dialog.dialog("close");

				app.userdata();
			},
			sort:function(orderby){

				app.page_user = 1;
				$.get( 'ad_user_order.php?page='+app.page_user+'&orderby='+orderby+'&dir='+app.orderdir,
					function(resp){
						var resp = JSON.parse(resp);
						app.paging = resp.paging;
						app.users = resp.user;
					});
				
				if(app.orderdir == 'asc')
					app.orderdir = 'desc';
				else if (app.orderdir == 'desc')
					app.orderdir = 'asc';

				

			}
		},
		mounted: function(){
			this.user = '<?php echo $_SESSION['perm']; ?>';
		}
	})

	var dialog;

	$(document).ready(function(){

		dialog = $('#dialog').dialog({
	    	autoOpen:false,
	    	height:300,
	    	width:500,
	    	modal:true
	    });
	})

</script>
</html>