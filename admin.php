<?php session_start(); include_once('connect.php'); ?>
<!doctype html>
<html>
<head>
    <meta charset=utf-8>
    <script src=./jquery/jquery.js></script>
    <script src=./jquery/jquery-ui.js></script>
    <link rel=stylesheet href=./jquery/jquery-ui.css>
</head>
<body>
    <button onclick=page('user')>使用者帳號資料</button>
    <button onclick=page('log')>使用者登入登出紀錄</button>
    <button onclick=location.assign('letter.php')>電子報製作精靈</button>
    <button onclick=location.assign('logout.php')>登出</button> 
    <br /><br />
    
    <div class=content id=user>
        <?php $member = $con->query(" select LPAD(id-1,3,'0') as userid,member.* from member"); ?>
        查詢關鍵字 : <input type=text name=key id=key ><input type=button onclick=search() value=搜尋><input type=button onclick=create() value=新增使用者>
        <table id=usertable>
            <tr>    
                <th>使用者編號</th>
                <th>帳號</th>
                <th>密碼</th>
                <th>姓名</th>
                <th>權限</th>
                <th colspan=2>管理</th>
            </tr>
            <?php while($row = $member->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['acc']; ?></td>
                <td><?php echo $row['pwd']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['perm']; ?></td>
                <td><input type=button onclick=edit('<?php echo $row['id']; ?>') value=編輯></td>
                <td><input type=button onclick=delete('<?php echo $row['id']; ?>') value=刪除></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class=content id=log>
        <?php $log = $con->query("select log.id,LPAD(log.userid-1,3,'0') as userid,member.acc,log.time,log.status from log join member on log.userid=member.id "); ?>
        <table>
            <tr>    
                <th>流水號</th>
                <th>使用者編號</th>
                <th>帳號</th>
                <th>時間</th>
                <th>動作</th>
            </tr>
            <?php while($row = $log->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['userid']; ?></td>
                <td><?php echo $row['acc']; ?></td>
                <td><?php echo $row['time']; ?></td/>
                <td><?php echo $row['status'] == 1 ? '登入' : '登出' ; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div id="editdialog">
    <form action=ad_edit.php method=post>
        <input type=hidden name=id>
        帳號 : <input type=text name=acc><br /><br />
        密碼 : <input type=text name=pwd><br /><br />
        姓名 : <input type=text name=name><br /><br />
        使用者權限 :  
        <input type=radio name=perm id=a1 value=a><label for=a1>系統管理員</label>
        <input type=radio name=perm id=c1 value=c><label for=c1>一般使用者</label><br /><br />
        <input type=submit><input type=reset>
    </form>
    </div>

    <div id=createdialog>
    <form action=ad_new.php method=post>
        帳號 : <input type=text name=acc><br /><br />
        密碼 : <input type=text name=pwd><br /><br />
        姓名 : <input type=text name=name><br /><br />
        使用者權限 :  
        <input type=radio name=perm id=a2 value=a><label for=a2>系統管理員</label>
        <input type=radio name=perm id=c2 value=c><label for=c2>一般使用者</label><br /><br />
        <input type=submit><input type=reset>
    <form>
    </div>

</body>

<script>

    function create(){
        $('[name=acc]').val("");
        $('[name=pwd]').val("");
        $('[name=name]').val("");
        $('[name=perm2]').val("");
        createdialog.dialog('open');
    }

    function edit(id){
        if(id == 1) return alert('Access Denied ! (no permission) ');
        $.get('ad_get.php',
            { id:id },
            function(resp){
                var resp = JSON.parse(resp);
                $('[name=id]').val(id);
                $('[name=acc]').val(resp.acc);
                $('[name=pwd]').val(resp.pwd);
                $('[name=name]').val(resp.name);
                $('[value='+resp.perm+']').prop('checked','checked');
                editdialog.dialog('open');
                
            });
    }

    function search(){
        var key = $('#key').val();
        $.get('ad_search.php?key='+key,
            function(resp){
                $('#usertable').html(resp);
            });
    }

    function page(str){
        $('.content').hide();
        $('#'+str).fadeIn(500);
    }

    $(document).ready(function(){
        $('.content').hide();
    })

    function sort(n){
        var table = document.getElementById('usertable');
        var switching = true;
        var dir = 'asc';
        var switchcount = 0;
        while(switching){
            switching = false;
            var rows = table.getElementsByTagName("TR");
            for(i=1;i< (rows.length-1) ;i++){
                var x = rows[i].getElementsByTagName("TD");
                var y = rows[i+1].getElementsByTagName("TD");
                if(dir == 'asc'){
                    if(x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()){
                        shouldswitch = true;
                        break;
                    }
                }else if (dir == 'desc' ){
                    if(x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()){
                        shouldswitch = true;
                        break;
                    }
                }
            }
            if(shouldswitch){
                rows[i].parentNode.insertBefore(rows[i+1],rows[i]);
                switching=true;
                switchcount++;
            }else if(dir == 'asc' && switchcount == 0){
                switching=true;
                dir='desc';
            }
        }
    }

    var editdialog = $('#editdialog').dialog({
        title:"Edit user",
        autoOpen:false,
        width:400,
        height:300,
        modal:true,
    });

    var createdialog = $('#createdialog').dialog({
        title:"Create user",
        autoOpen:false,
        width:400,
        height:300,
        modal:true,
    });

</script>

</html>