<?php
	//传入邮箱地址
	$s1 = $_GET["n1"];
	//md5转码
	$mdmd5 = md5(strtolower(trim($s1)));
	//获取头像地址
	$avatar = 'https://secure.gravatar.com/avatar/' . $mdmd5 . '?s=80';
	//输出头像
	echo "<img src='".$avatar."'>";
?>