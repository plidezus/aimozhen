<button class="btn btn-primary btn-large" style="width:100%;text-align:left;margin-bottom: 10px;"
	data-toggle="modal" data-title="lala" href="#share"> + 分享动画</button>
<ul class="nav nav-list well">
	<li class="nav-header">
		<h1>艾墨镇<sup>а</sup></h1>
	</li>
	<li class="<?=strpos($_SERVER['SCRIPT_NAME'], 'index.php') == false ? '' : 'active'?>"><a href="index.php">最新动画</a></li>
	<li  class="<?=strpos($_SERVER['SCRIPT_NAME'], 'hot.php') == false ? '' : 'active'?>">
		<a href="hot.php">热门动画</a>
	</li>
</ul>
<? if ($visitor->id) { ?>
	<span class="btn btn-large"  style="box-sizing: border-box;width:220px;margin-top: 10px;text-align: left;"><?= $visitor->username ?></span>
		<ul>
            <li><a href="/my/">我的分享</a></li>
            <li><a href="/my/like.php">喜欢的人</a></li>
            <li><a href="/my/fav.php">赞过的片子</a></li>
            <li><a href="/my/comment.php">评论过的片子</a></li>
		</ul>
<? } else { ?>
	<div id='share' class="modal hide">
		<div class="modal-header"><h4>登录</h4></div>
			<form action="login.php" method="POST">
			<div class="modal-body">
				用户名：<input type="text" name="username" /> <br />
				　密码：<input type="password" name="password" /> <br />
				<input type="submit" value="登录" class="btn btn-primary"/>
			</div>
			</form>
	</div>
<? } ?>

