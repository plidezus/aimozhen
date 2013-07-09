<?php
include "include/init.php";

if (isset($_GET['v']))
	{ 
	$user = new User($_GET['id']);
	if (($user->validate)!=($_GET['v'])) header("LOCATION:/?repasserr");
	if ((!$user->validate)||($user->validate==0)) header("LOCATION:/?repasserr");
	include 'view/base/header.php'; ?>
	
			<div class="container" style="margin:30px auto 20px auto">
	
		  <div class="row">
		  <div class="span11 shadow" style="width:990px"> 
		  <div id="title" style="padding:20px;">
			<span style="color: #2C2C2C; font-size: 18px; font-weight: bold;">找回密码</span><br />
			<span style="color: #7F7F7F; font-weight: bold;">请重新设置你的密码</span>
			<div class="hr2"></div>
            <span style="color: #7F7F7F; font-weight: bold;">你好 <?=$user->username?></span>
		  </div>
		  <!-- 编辑区域--> 
		  <div class="span6" style="margin-left:0;padding:0 0 0 20px;"> 

		 <form class="form-horizontal" id="password" action="/ajax/forget/password.php" method="POST">
                  <input type="hidden" id="id" name="id" value="<?=$_GET['id']?>" />
                            <div class="control-group" id="pass1group">
                                <label class="control-label2" for="pass1">密码 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" type="password" id="pass1" name="pass1" />
                                    <span class="help-inline" id="pass1Info"></span>
                                </div>
                            </div>
                            <div class="control-group" id="pass2group">
                                <label class="control-label2" for="pass2">重复 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" type="password" id="pass2" name='pass2' />
                                    <span class="help-inline" id="pass2Info"></span>
                                </div>
                            </div>
                            
                            <div style="margin:10px 0 0 60px;">
                                <input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />
                                
                            </div>
                    </form>
			</div>
			<!-- /编辑区域-->
		  </div>
		  
		  </div>
		</div> <!-- /上方 -->
		<script src="/include/validation/edit_user/password.js"></script>


<? } else {	

	$exists_user = new User();
	$exists_user->email = $_GET['email'];
	if ($exists_user->count()){
		header('LOCATION:/?reemail');
	} else {
		if ($visitor->id)
		  {header("LOCATION:/?regged");}
		elseif ($_GET['s'] != md5($_GET['email'] . 'check'))
		  {header("LOCATION:/?regwrong");}
		else 
		  {include 'view/base/header.php';}
	}
	?>
		<div class="container" style="margin:30px auto 20px auto">
	
		  <div class="row">
		  <div class="span11 shadow" style="width:990px"> 
		  <div id="title" style="padding:20px;">
			<span style="color: #2C2C2C; font-size: 18px; font-weight: bold;">欢迎来到<?=$sitename?>！</span><br />
			<span style="color: #7F7F7F;">填写居住证，永久有效无需暂住^_^</span><br />
			<div class="hr2"></div>
		  </div>
		  <!-- 编辑区域--> 
		  <div class="span6" style="margin-left:0;padding:0 0 0 20px;"> 
		  
	
		  <form class="form-horizontal" id="reg" action="ajax/add_user.php" method="POST">
		  <input type="hidden" value="<?=$_GET['s']?>" />
					<div class="control-group" id="namegroup">
						<label class="control-label2" for="name">昵称 </label>
						<div class="controls2">
							<input type="text" class="input-xlarge" id="name" name="name" placeholder="好名字是好生活的开始~">
							 <span class="help-inline" id="nameInfo"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label2" for="input01">Email </label>
						<div class="controls2">
							<input class="input-xlarge" id="email" name="email" type="text" readonly value="<?=$_GET['email']?>" />
						</div>
					</div>
					<div class="control-group" id="pass1group">
						<label class="control-label2" for="pass1">密码 </label>
						<div class="controls2">
							<input class="input-xlarge" type="password" id="pass1" name="pass1" />
							<span class="help-inline" id="pass1Info"></span>
						</div>
					</div>
					<div class="control-group" id="pass2group">
						<label class="control-label2" for="pass2">重复 </label>
						<div class="controls2">
							<input class="input-xlarge" type="password" id="pass2" name='pass2' />
							<span class="help-inline" id="pass2Info"></span>
						</div>
					</div>
				   
		  <div id="title" style=" padding-bottom:20px;">
			<span style="color: #7F7F7F; font-weight: bold;">如果有邀请码请填写在下方（选填）</span>
			<div class="hr2"></div>
		  </div>
					<div class="control-group">
						<label class="control-label2" for="input01">邀请 </label>
						<div class="controls2">
							<input class="input-xlarge" id="invitecode" name="invitecode" type="text" />
						</div>
					</div> 
				  <!-- <div class="control-group">
						<label class="control-label2" for="input01" >微博 </label>
						<div class="controls2">
							<input placeholder="http://weibo.com/你的名字" class="input-xlarge" id="exterweibo" name="exterweibo" type="text" />
						</div>
					</div>
					<div class="control-group">
						<label class="control-label2" for="input01">博客 </label>
						<div class="controls2">
							<input class="input-xlarge" id="exterblog" name="exterblog" type="text" />
						</div>
					</div>-->
					
					<div style="margin:10px 0 0 60px;">
						<input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />
						
					</div>
			</form>
			</div>
			<!-- /编辑区域-->
		  </div>
		  
		  </div>
		</div> <!-- /上方 -->
		<script src="include/validation/reg.js"></script>	

<?php
	}
	include 'view/base/footer.php';
?>
