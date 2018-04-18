<?php session_start(); ?>
<h2>你已經輸入錯誤<?php echo $_SESSION['error']; ?>次</h2>
<button onclick=location.assign('index.php')>確認</button>