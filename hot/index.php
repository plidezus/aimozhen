<?php
include "../include/init.php"; $pagename = "hot" ;
include '../view/base/header.php';
$page_size = 23;
$page = isset($_GET['p']) ? intval($_GET['p']) : 0;
?>
	<div style="text-align:center; width:100%; color:#AAA">艾墨镇共有 <?=$video_count?> 部视频作品与您分享</div>
    <div class="container" style="margin:20px auto 20px auto">

      <div class="row">
      
              <div class="span12" style="margin:0"> 
           <? if (!$visitor->id) { ?>
      <!-- 作品-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        
                <? if ($visitor->id) { ?>
                              <a href="#share" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">我也要分享</span></a></div>
					<? } else { ?>
                             <a href="#login" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">分享前请登录</span></a></div>
					<? } ?>
        
        <div class="hr1" style="margin-top:10px;"></div>
        <div id="welcome" style="margin-top:5px;">
        <p><?=$user_count?>位镇民，<?=$video_count?>部视频</p>
          <p>欢迎您来到艾墨镇，如果您是第一次来到这里，我建议您随意逛逛。</p>
          <p>如果您开始喜欢这里，那或许您更愿意住在这里。</p>
          <p>如果您已经在这里安家，欢迎您<a data-toggle="modal" data-title="lala" href="http://127.0.0.1/#login">回来</a>。</p>
        </div>
        </div>
        <!-- /作品--> 
      <? } ?>
			<?
			$video = new Video();
			$videos = $video->find(array('order' => '`like` desc, id desc', 'limit' => $page * $page_size . ', ' . $page_size));
					foreach ($videos as $video) {
						$user = new User($video->userid);
			?>
        <!-- 作品-->
                <? require '../view/base/post.php';?>
        <!-- /作品--> 
			<? } ?>
              

			  </div>
      </div>
      <div class="row"><p style="text-align: center">

<? for ($i=0; $i<ceil($video_count / $page_size); $i++) {?>
<a href="?p=<?=$i?>"><span class="label label-info"><?=$i+1?></span></a>
<? }?>

        </p> </div>
    </div> <!-- /上方 -->
    
<?php
require_once '../view/base/footer.php';
?>
