<?php
	//传入邮箱地址
	$s1 = $_GET["n1"];
	//md5转码
	$mdmd5 = md5(strtolower(trim($s1)));
	$qqnum = str_replace('@qq.com', '', $s1);
	if (strstr($s1,"qq.com") && is_numeric($qqnum) && strlen($qqnum) > 4 && strlen($qqnum) < 12) {
		$avatar = 'https://q.qlogo.cn/g?b=qq&nk='.$qqnum.'&s=100';
	}else {
		$avatar = 'https://cdn.v2ex.com/gravatar/' . $mdmd5 . '?s=80';
	}
	//输出头像
	echo "<img style='width:80px;height:80px;' src='".$avatar."'>";
?>