<?php
include "include/init.php";
include 'view/base/header.php';
$page_size = 23;
$page = isset($_GET['p']) ? intval($_GET['p']) : 0;
$tags = Tag::getAllPreTags();
?>
	<div style="text-align:center; width:100%; color:#AAA">艾墨镇共有 <?=$video_count?> 部视频作品与您分享</div>
    <div class="container" style="margin:20px auto 20px auto">
    
      <div class="row">
  <div class="span12" style="margin:0"> 

      <? if (!$visitor->id) { ?>
      <!-- 登录前模块-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        <a href="#login" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">分享前请登录</span></a></div>
        <div class="hr1" style="margin-top:10px;"></div>
        <div id="welcome" style="margin-top:5px;">
        <p><?=$user_count?>位镇民，<?=$video_count?>部视频</p>
        <p>欢迎你来到艾墨镇，这里居住着一群热爱独立影像的朋友们。</p>
        <p>你可以在这里尽享大家分享的精彩内容，留言讨论。</p>
        <p>当然更欢迎你的<a href="#">加入</a>，和我们分享更多的精彩！</p>
        </div>
        </div>

        <!-- /登录前模块--> 
			<? } else { ?>
        <!-- 登录后模块-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        <a href="#share" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">我也要分享</span></a></div>
        <div class="hr1" style="margin-top:10px;"></div>
        <div id="welcome" style="margin-top:5px;">
        <p><?=$user_count?>位镇民，<?=$video_count?>部视频</p>
          <p><? foreach ($tags as $each_tag) { ?>
				<?=$each_tag->name?>
				<? } ?>
          </p>
        </div>
        </div>
			 <? } ?>
      <?
				$video = new Video();
				$videos = $video->find(array('order' => 'id desc', 'limit' => $page * $page_size . ', ' . $page_size));

				foreach ($videos as $video) {
					$user = new User($video->userid);
		?>
        <!-- 作品-->

        <? require 'view/base/post.php';?>

        <!-- /作品--> 
		<? }?>
		  </div>
      </div>
      <div class="row"><p style="text-align: center">

<? for ($i=0; $i<ceil($video_count / $page_size); $i++) {?>
<a href="?p=<?=$i?>"><span class="btn btn-red"><?=$i+1?></span></a>
<? }?>

        </p> </div>
    </div> <!-- /上方 -->
    
<?php
require_once 'view/base/footer.php';
?>