<?php
include 'view/base/header.php';
if ($visitor->id || $_GET['s'] != md5($_GET['email'] . 'check')
	) header("LOCATION:index.php");
?>
<div class="container">
	<div class="row">
		<div class="span3">
			 <?
				//include 'view/base/sidebar.php';
			?> 
		</div>

		<div class="span9">
			<form class="form-horizontal" action="ajax/add_user.php" method="POST">
				<input type="hidden" value="<?=$_GET['s']?>" />
				<div class="control-group">
					<label class="control-label" for="input01">昵称</label>
					<div class="controls">
						<input type="text" class="input span3" id="input01" name="name" placeholder="好名字是好生活的开始~">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Email：</label>
					<div class="controls">
						<input type='input' readonly value='<?=$_GET['email']?>'/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">密码：</label>
					<div class="controls">
						<input type="password" name="password" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">重复密码：</label>
					<div class="controls">
						<input type="password" name='repassword' />
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="我要安家" />
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
