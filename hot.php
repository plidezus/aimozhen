<?php
include "include/init.php";
include 'view/base/header.php';
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      
              <div class="span12" style="margin:0"> 
           <? if (!$visitor->id) { ?>
      <!-- 作品-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        <a href="#share" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">我也要分享</span></a></div>
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
				$videos = $video->find(array('order' => '`like` desc, id desc'));

				foreach ($videos as $video) {
					$user = new User($video->userid);
					?>
                     <!-- 作品-->
        <div class="span3 shadow" style="height:260px;padding:10px; margin-bottom:20px;">
                        <div class="playbutton"><span><a href="detail.php?id=<?= $video->id ?>"><div style=" width:210px; height:160px;background: url('../images/play.png') no-repeat center center;">&nbsp;</div></a></span>
                        <div class="post-title"><?= $video->title ?></div>
                        <div class="img-rounded post-image" style="background: url('<?= $video->imageUrl ?>') no-repeat center center;"></div>     					</div>
						<div style="height:160px" ></div>
            			<div class="post-explain" style="font-size:12px;overflow:hidden;" ><?php
if($video->description=="")
{  ?>
这个ATer很懒，什么也没留下
<?php  }else{ ?>
<?php echo $video->description; } ?></div>
                        <div class="hr1"></div>
                        <div class="post-author"  style=" margin-top:10px;">
                        <div id="avatar" class="float-left"><img src="../images/at_32.jpg" width="32" height="32" /></div>
                    <div id="post-detailed" class="float-left" style="margin-left:10px">
                        <div id="post-author" style="color: #666666;font-size: 12px"><?=$user->username?>  分享</div>
                    </div></div>
        </div>
        <!-- /作品--> 
					<?
				}
				?>
              

			  </div>
      </div>
    </div> <!-- /上方 -->
    
<?php
require_once 'view/base/footer.php';
?><?php
require_once 'view/base/footer2.php';
?>
