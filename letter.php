<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <script src=./jquery/jquery.js></script>
    <script src=./jquery/jquery-ui.js></script>
    <script src=./vue/vue.js></script>
    <link rel=stylesheet href=./jquery/jquery-ui.css>
    <style>

        .banner{
            background-color:mediumblue;
            font-size:30px;
            color:white;
            width:350px;
            height:80px;
            margin:20px auto;
            text-align:center;
            line-height:80px;
            border-radius:10px;
            border:thin solid black;
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

        table{
            margin:20px auto;
            display:flex;
            justify-content:center;
            text-align:center;
        }
    
        th,td{
            border:thin solid black;
            border-radius:5px;
            width:100px;
        }

        .center{
            display:flex;
            justify-content:center;
        }

    </style>
</head>
<body>
    <div id=app>
        <div class=banner>電子報製作精靈</div>
        <div class=top>
            <button class=topbutton v-on:click=browse() >瀏覽電子報</button>
            <button class=topbutton v-on:click=query() >查詢及統計電子報</button>
            <button class=topbutton v-if=" user == 'r' || user == 's' " onclick=location.assign('main.php') >返回管理專區</button>
            <button class=topbutton v-else-if="user == 'c' " onclick=location.assign('main.php') >返回會員專區</button>
            <button class=topbutton v-else onclick=location.assign('index.php') >返回首頁</button>
        </div>

        <div>
            <label>查詢關鍵字 : </label>
            <input type=text v-model=key v-on:keyup.enter=search()>
            <input type=button v-on:click=search() value=搜尋>
            <button v-on:click=create() >新增電子報</button>
        </div>

        <div v-if=letter_table>
            <table>
                <tr>
                    <th>流水號</th>
                    <th>檔名</th>
                    <th>標題</th>
                    <th>內容</th>
                    <th>檔案</th>
                    <th>連結</th>
                    <th>作者</th>
                    <th>建立時間</th>
                    <th>管理</th>
                </tr>
                <tr v-for='letter in letters'>
                    <td>{{ letter[0] }}</td>
                    <td>{{ letter[1] }}</td>
                    <td>{{ letter[2] }}</td>
                    <td>{{ letter[3] }}</td>
                    <td>{{ letter[4] }}</td>
                    <td>{{ letter[5] }}</td>
                    <td>{{ letter[6] }}</td>
                    <td>{{ letter[7] }}</td>
                    <td><button v-on:click=edit(letter.id)>編輯</button></td>
                </tr>
            </table>
        </div>

        <div v-if=query_table>

        </div>
    </div>
</body>

<script>

    var app = new Vue ({
        el:'#app',
        data:{
            user:null,
            letter_table: false,
            query_table: false,
            paging:null,
            letters:null,
            le_page:1,
            le_title:'',
            le_content:'',
            le_file:'',
            le_link:'',
        },
        methods:{
            create:function(){

                

            },
            edit:function(id){

            },
            browse:function(){

                $.get('le_list.php?page='+app.le_page,
                        function(resp){
                            var resp = JSON.parse(resp);
                            console.log(resp);
                            app.paging = resp.paging;
                            app.letters = resp.letter;
                        })

                app.letter_table = true;
                app.query_table = false;

            },
            query:function(){

                app.broletter_tablewse = false;
                app.query_table = true;
                
            }
        },
        mounted:function(){
            this.user = '<?php echo $_SESSION['perm']; ?>';
        }


    })

    var dialog = $('#dialog-create').dialog({

        autoOpen:false,
        width:300,
        height:300,

    })

</script>
</html>