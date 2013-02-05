<?php
include "include/init.php";
include 'view/base/header.php';

?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <div class="span11 shadow" > 
      <div id="title" style="padding:20px;">
      	<span style="color: #2C2C2C; font-size: 18px; font-weight: bold;">加入我们</span><br />
      	<span style="color: #7F7F7F; font-weight: bold;">欢迎来到艾墨镇！</span>
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
				<div style="margin:10px 0 0 60px;">
					<input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />
					
				</div>
		</form>
		</div>
		<!-- /编辑区域-->
      </div>
      
      </div>
    </div> <!-- /上方 -->
    <script src="include/reg/validation.js"></script>
	<?php
include 'view/base/footer.php';
?>
