	<script type="text/javascript" src="http://amzstatic.b0.upaiyun.com/media/messenger/js/underscore-min.js"></script>
    <script type="text/javascript" src="http://amzstatic.b0.upaiyun.com/media/messenger/js/backbone-min.js"></script>
	<script type="text/javascript" src="http://amzstatic.b0.upaiyun.com/media/messenger/js/messenger.min.js"></script>
    <script type="text/javascript" src="http://amzstatic.b0.upaiyun.com/media/messenger/js/messenger-theme-future.js"></script>
    
	<link type="text/css" rel="stylesheet" href="http://amzstatic.b0.upaiyun.com/media/messenger/css/messenger.css"/>
    <link type="text/css" rel="stylesheet" href="http://amzstatic.b0.upaiyun.com/media/messenger/css/messenger-theme-future.css"/>
    <script type="text/javascript"> $(function(){ 


<? $url=explode("?",$_SERVER['REQUEST_URI']);$num =(count($url))-1;
//登陆相关
if ($url[$num]=="welcome") { 
	if ($visitor->id) {
		echo "$.globalMessenger().post({ message: '欢迎回来！别忘记分享几部好作品哟！',showCloseButton: true });";} 
		$duoshuoinfo = DuoShuo::syncUser($visitor->id);
		} 
if ($url[$num]=="err") {
	echo "$.globalMessenger().post({ message: '登录失败！电子邮件或密码错误！',type: 'error',showCloseButton: true });";}
if ($url[$num]=="login") {
	echo "$.globalMessenger().post({ message: '请您先登录！',type: 'error',showCloseButton: true });";}
if ($url[$num]=="bye") {
	echo "$.globalMessenger().post({ message: '记得有空常来哦！',showCloseButton: true });";}
//作品相关	
if ($url[$num]=="wrong") {
	echo "$.globalMessenger().post({ message: '您没有权限修改他人的视频~',type: 'error',showCloseButton: true });";}
if ($url[$num]=="delete") {
	echo "$.globalMessenger().post({ message: '你已经成功删除该视频分享！',type: 'success',showCloseButton: true });";}
if ($url[$num]=="repost") {
	echo "$.globalMessenger().post({ message: '哟~ 已经有人抢先一步提交这部作品了！',type: 'error',showCloseButton: true });";}
//注册相关
if ($url[$num]=="reg") {
	echo "$.globalMessenger().post({ message: '恭喜你！注册成功！',type: 'success',showCloseButton: true });";}
if ($url[$num]=="regged") {
	echo "$.globalMessenger().post({ message: '对不起！您已经是注册会员了！',type: 'error',showCloseButton: true });";}
if ($url[$num]=="reemail") {
	echo "$.globalMessenger().post({ message: '对不起！这个电子邮件已经被注册过！',type: 'error',showCloseButton: true });";}
if ($url[$num]=="regwrong") {
	echo "$.globalMessenger().post({ message: '对不起！验证地址有误，请核实后再注册！',type: error',showCloseButton: true });";}
if ($url[$num]=="rereg") {
	echo "$.globalMessenger().post({ message: '你好！您的信息已经成功变更！',type: 'success',showCloseButton: true });";}
if ($url[$num]=="noemail") {
	echo "$.globalMessenger().post({ message: '对不起，您没有填写邮件地址哦亲~',type: 'error',showCloseButton: true });";}
//找回密码结果
if ($url[$num]=="repasserr") {
	echo "$.globalMessenger().post({ message: '对不起 网址验证失败 请重新申请~',type: 'error',showCloseButton: true });";}
//Email相关
if ($url[$num]=="mailok") {
	echo "$.globalMessenger().post({ message: '申请发送成功！请查收邮件！',type: 'success',showCloseButton: true });";}
if ($url[$num]=="mailerr") {
	echo "$.globalMessenger().post({ message: '对不起 申请发送失败！ 请重试',type: 'error',showCloseButton: true });";}
 ?>
   }); </script>
