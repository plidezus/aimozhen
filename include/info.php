	<script type="text/javascript" src="/media/jBox/jquery.jBox-2.3.min.js"></script>
	<script type="text/javascript" src="/media/jBox/jquery.jBox-zh-CN.js"></script>
	<link type="text/css" rel="stylesheet" href="/media/jBox/jbox.css"/>
    
<? $url=explode("?",$_SERVER['REQUEST_URI']);$num =(count($url))-1;
//登陆相关
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
//作品相关	
if ($url[$num]=="wrong") {
	echo "<script> $(function(){ $.jBox.tip('您没有权限修改他人的视频~', 'error');}); </script>";}
if ($url[$num]=="delete") {
	echo "<script> $(function(){ $.jBox.tip('你已经成功删除该视频分享！', 'success');}); </script>";}
if ($url[$num]=="repost") {
	echo "<script> $(function(){ $.jBox.tip('哟~ 已经有人抢先一步提交这部作品了！', 'error');}); </script>";}
//注册相关
if ($url[$num]=="reg") {
	echo "<script> $(function(){ $.jBox.tip('恭喜你！注册成功！', 'success');}); </script>";}
if ($url[$num]=="regged") {
	echo "<script> $(function(){ $.jBox.tip('对不起！您已经是注册会员了！', 'error');}); </script>";}
if ($url[$num]=="rereg") {
	echo "<script> $(function(){ $.jBox.tip('你好！您的信息已经成功变更，请你使用新的信息重新登录！', 'success');}); </script>";}
 ?>