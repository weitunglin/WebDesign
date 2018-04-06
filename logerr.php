<?php session_start(); ?>
<h1>您已輸入錯誤<?php echo $_SESSION['error']; ?>次，請確認好帳號密碼再輸入</h1>
<button onclick=location.assign('index.php')>確定</button>