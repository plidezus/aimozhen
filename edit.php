<?php
include "include/init.php";
include 'view/base/header.php';
$video = new Video($_GET['id']);
$user = new User($video->userid);
?>
<div class="container">
	<div class="row">
		<div class="span3">
            <ul class="well nav nav-list">
                <li class="nav-header"><?=$visitor->username?></small></li>
                <li><a data-toggle="modal" href="#invite">邀请入住</a></li>
                <li><a href="my/index.php">我的分享</a></li>
                <li><a href="my/like.php">喜欢的人</a></li>
                <li><a href="my/fav.php">好片收藏</a></li>
                <li><a href="my/comment.php" title="我的评论">闲言碎语</a></li>
                <li><a href="logout.php">登出</a></li>
            </ul>
		</div>
		<div class="span9">
			<div class="alert alert-success">
				<h3 class="alert-heading">成功啦！</h3>
				<p>其实，你已经发布成功了<small>(<a target="_blank" href="detail.php?id=<?=$video->id?>">去看看</a>)</small>。但是如果你想继续完善一下，镇民们会非常开心。</p>
				<p>当然，您也可以选择以后再编辑您的视频详细信息~</p>
			</div>
			<form class="form-horizontal" action="ajax/edit_video.php" method="POST">
				<input type="hidden" name="id" value="<?=$video->id?>" />
				<div class="control-group">
					<label class="control-label" for="input01">标题：</label>
					<div class="controls">
						<input type="text" class="input span4" id="input01" name="title" placeholder="试试你喜欢的网站~" value="<?=$video->title?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">标签：</label>
					<div class="controls">
						<input type="text" class="input span4" id="input01" name="tags" placeholder="用空格分开哦亲！" value="<?=$video->tags?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">说点什么吧：</label>
					<div class="controls">
						<textarea placeholder="只转不评的同志不是好同志。" class="span4" name="description"><?=$video->description?></textarea>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="恩，就这样吧！" />
					<a href="detail.php?id=<?=$video->id?>" class="btn">我很懒，还是算了~</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
