<?php
	session_start();
	if(!$_GET['q']) return;

	$im = imagecreatetruecolor(25,25);
	$text_color = imagecolorallocate($im,122,122,122);

	$code = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	$code = $code[rand(0,strlen($code)-1)];

	imagestring($im,10,5,5,$code,$text_color);

	header('Content-Type: image/jpeg');
	imagejpeg($im);

	imagedestroy($im);

	$_SESSION['auth'.$_GET['q']] = $code;
?>