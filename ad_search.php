<?php 
    if(!isset($_GET['key'])) return;
    include_once('connect.php');
    $result = $con->query("select LPAD(id-1,3,'0') as userid,member.* from member where id like '%$_GET[key]%' or acc like '%$_GET[key]%' or pwd like '%$_GET[key]%' or name like '%$_GET[key]%'  ");
    echo "
    <table id=usertable>
        <tr>    
            <th>使用者編號</th>
            <th>帳號</th>
            <th>密碼</th>
            <th>姓名</th>
            <th>權限</th>
            <th colspan=2>管理</th>
        </tr>";
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>".$row['userid']."</td>
            <td>".$row['acc']."</td>
            <td>".$row['pwd']."</td>
            <td>". $row['name']."</td>
            <td>". $row['perm']."</td>
            <td><input type=button onclick=edit(". $row['id'].") value=編輯></td>
            <td><input type=button onclick=delete(".$row['id'].") value=刪除></td>
        </tr>";
    };
    echo "</table>";
?>