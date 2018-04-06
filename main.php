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
	</style>
</head>
<body>
	<div id=app>
		<div v-if=admin class=banner>管理者專區</div>
		<div v-if=client class=banner>一般會員專區</div>
		<div v-if=admin>
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
						<th>使用者編號</th>
						<th>姓名</th>
						<th>帳號</th>
						<th>密碼</th>
						<th>權限</th>
						<th colspan=2>管理</th>
					</tr>
					<tr v-for='user in users'>
						<td>{{ pad(user[0]-1) }}</td>
						<td>{{ user[1] }}</td>
						<td>{{ user[2] }}</td>
						<td>{{ user[4] }}</td>
						<td>{{ user[3] }}</td>
						<td><input type=button value=編輯 v-on:click=edit_user(user[0])></td>
						<td><input type=button value=刪除 v-on:click=delete_user(user[0])></td>
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
						<th>登入狀態</th>
					</tr>
					<tr v-for='log in logs'>
						<td>{{ log[0] }}</td>
						<td>{{ pad(log[1]-1) }}</td>
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

		<div v-if=client>
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
			message: 'a',
			admin: false,
			client: false,
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
		},
		methods:{
			userdata:function(){
				
				$.get('ad_user.php?page='+app.page_user,
					function(resp){
						var result = resp.split('"~"');
						app.paging  = JSON.parse(result[0])
						app.users = JSON.parse(result[1]);
					});

				app.user_table = true;
				app.log_table = false;
			},
			search:function(){

				$.get('ad_user.php?page=1&key='+app.key,
					function(resp){
						var result = resp.split('"~"');
						app.paging  = JSON.parse(result[0])
						app.users = JSON.parse(result[1]);
					});
			},
			logrecord:function(){

				$.get('ad_log.php?page='+app.page_log,
					function(resp){
						var result = resp.split('"~"');
						app.paging = JSON.parse(result[0]);
						app.logs = JSON.parse(result[1]);
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
						var result = resp.split('"~"');
						result = JSON.parse(result[1]);
						app.id = result[0][0];
						app.acc = result[0][1];
						app.pwd = result[0][2];
						app.perm = result[0][3];
						app.name = result[0][4];
						dialog.dialog("open");
					});
			},
			pad:function(s){
				return String(s).length >= 3 ? String(s) : new Array( 3 - String(s).length  + 1).join('0') + String(s);
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
			}
		},
		mounted: function(){
			this.user = '<?php echo $_SESSION['perm']; ?>';
			if(this.user == 's' || this.user == 'r'){
				this.client = false;
				this.admin = true;
			}
			else if(this.user == 'c'){
				this.admin = false;
				this.client = true;
			}
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