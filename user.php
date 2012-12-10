<?php
include "include/init.php";
include 'view/base/header.php';
if (!$visitor->id) header("LOCATION:index.php");

$user_id = $_GET['id'];
$user = new User($user_id);

$video = new Video();
$video->userid = $user->id;;
$video_count = $video->count();
?>
<div class="container">
	<div class="row">
		<div class="span3">
            <ul class="well nav nav-list">
                <li class="nav-header"><a href="user.php?id=<?=$video->userid?>">
                    <img src="<?=$user->avatar()->link(240)?>" />
                </a></li>
                <li><a href="ajax/like.php?id=<?=$user->id?>">喜欢他</a></li>
                <li><a href="user/detail.php?id=<?=$user->id?>">了解他</a></li>
            </ul>
		</div>
		<div class="span9">
			<div style="text-align: right;line-height: 37px;margin-bottom: 10px;color:#999">
				<a href="ajax/like.php?id=<?=$user_id?>">喜欢 <?=$user->username?></a> <?=$video_count?>部视频
			</div>
			<ul class="thumbnails">
	<?
		$video = new Video();
		$video->userid = $user_id;
		$videos = $video->find(array('order' => 'id desc'));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
				<li class="span3">
					<div class="thumbnail">
						<a href="detail.php?id=<?=$video->id?>"><img src="<?=$video->imageUrl?>" style="width:100%;height:160px;" /></a>
					</div>
				</li>
	<?
		}
	?>
			</ul>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
