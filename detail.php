<?php
include "include/init.php";
$video = new Video($_GET['id']);
$video->viewed += 1;
$video->save();
$user = new User($video->userid);

include 'view/base/header.php';

$comments = $video->comments();
?>
<div class="container">
	<div class="row">
		<div class="span3">
            <ul class="well nav nav-list">
                <li class="nav-header"><a href="user.php?id=<?=$video->userid?>">
	                <img src="<?=$user->avatar()->link(240)?>" />
                </a></li>
                <li><a class="ajax" href="ajax/fav.php?id=<?=$video->id?>">收藏动画</a></li>
                <li><a href="ajax/share.php?id=<?=$video->id?>">分享动画</a></li>
	        </ul>
   		</div>
		<div class="span9">
			<div id="video">
				<?=$video->content()?>
			</div>
			<div class="well">
				<h4><?=$user->username?></h4>
				<p>收藏(<?=intval($video->like)?>) 查看(<?=intval($video->viewed)?>) <?=date('Y.m.d', $video->createdTime)?></p>
				<p><?=$video->description?></p>
			</div>
			<div class="well">
				<h4>评论(<?=count($comments)?>)</h4>
				<ul>
					<? foreach($comments as $each_comment) {?>
					<li style="color:#999">
						<p><?=$each_comment->user()->username?> <span style="float: right"><?=date('Y-m-d H:m', $each_comment->createdTime)?></span></p>
						<p><?=$each_comment->comment?></p>
					</li>
					<? } ?>
				</ul>
			</div>
			<div class="well">
				<form class="ajax" method="POST" action="ajax/post_comment.php?id=<?=$video->id?>">
					<h4>发表评论</h4><br />
					<input type="hidden" name="id" value="<?=$video->id?>" />
					<textarea name="comment" style="width:95%;height:10em;"></textarea><br />
					<input type="submit" value="发表" class="btn btn-primary" />
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
