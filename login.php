<?php
    if(!isset($_POST['acc']) || !isset($_POST['pwd']) || (!isset($_POST['authtext']) && !isset($_POST['authimg']))) return;
    session_start();
    include_once('connect.php');
    $result = $con->query("select * from member where acc='$_POST[acc]'");
    @$row = $result->fetch_assoc();
    $r_authtext = $_SESSION['auth1'].$_SESSION['auth2'].$_SESSION['auth3'].$_SESSION['auth4'];
    $arr = array(ord($_SESSION['auth1']),ord($_SESSION['auth2']),ord($_SESSION['auth3']),ord($_SESSION['auth4']));
    $r_authimg='';
    asort($arr);
    foreach($arr as $k => $v){
        $r_authimg .= ($k+1);
    }
    if(!$row || $row['acc'] != $_POST['acc']){
        error('帳號');
    }else if($row['pwd'] != $_POST['pwd']){
        error('密碼');
    }else if($_POST['authimg'] != $r_authimg && $_POST['authtext'] != $r_authtext){
        echo $r_authimg;
        echo $_POST['authimg'];
        error('驗證碼');
    }else {
        echo "登入成功";
        $con->query("insert into log(userid,status) values('$row[id]','1')");
        $_SESSION['error'] = 0;
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = $row['name'];
        $_SESSION['userperm'] = $row['perm'];
        if($_SESSION['userperm'] == 's' || $_SESSION['userperm'] == 'a')
            header('refresh:0,admin.php');
        else 
            header('refresh:0,client.php');
            
    }

    function error($str){
        echo $str."錯誤";
        $_SESSION['error'] = $_SESSION['error']+1;
        if($_SESSION['error'] >= 3){
            header('refresh:1,logerr.php');
        }else
            header('refresh:1,member.php');
    }


?>