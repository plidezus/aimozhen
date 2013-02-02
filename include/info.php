	<script type="text/javascript" src="/media/jBox/jquery.jBox-2.3.min.js"></script>
	<script type="text/javascript" src="/media/jBox/jquery.jBox-zh-CN.js"></script>
	<link type="text/css" rel="stylesheet" href="/media/jBox/jbox.css"/>
    
<? $url=explode("?",$_SERVER['REQUEST_URI']);$num =(count($url))-1;
if ($url[$num]=="welcome") { 
	if ($visitor->id) {
		echo "<script> $(function(){ $.jBox.tip('欢迎回来！别忘记分享几部好作品哟！', 'success');}); </script>";} 
		} 
if ($url[$num]=="err") {
	echo "<script> $(function(){ $.jBox.tip('登录失败！用户名或密码错误！', 'error');}); </script>";}
if ($url[$num]=="login") {
	echo "<script> $(function(){ $.jBox.tip('请您先登录！', 'error');}); </script>";}
if ($url[$num]=="bye") {
	echo "<script> $(function(){ $.jBox.tip('记得有空常来哦！', 'success');}); </script>";}
if ($url[$num]=="wrong") {
	echo "<script> $(function(){ $.jBox.tip('您没有权限修改他人的视频~', 'success');}); </script>";}
if ($url[$num]=="reg") {
	echo "<script> $(function(){ $.jBox.tip('恭喜你！注册成功！', 'success');}); </script>";}
 ?>