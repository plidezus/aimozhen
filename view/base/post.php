
        <div class="span3 shadow" style="height:332px;padding:10px; margin-bottom:20px;">
                        <div class="playbutton"><span><a href="/detail.php?id=<?= $video->id ?>" title="<?= $video->title ?>" ><div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;</div></a></span>
          <div class="img-rounded post-image" style="background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;"></div>     					</div>
                        <div class="post-title"><a href="/detail.php?id=<?= $video->id ?>" title="<?= $video->title ?>" ><?= $video->title ?></a></div>
            			<div class="post-explain"><?php if($video->description==""){ ?>这个ATer很懒，什么也没留下<? }else{ echo $video->description; } ?></div>
						<div class="post-infor">查看<?=intval($video->viewed)?>次 <span class="ds-thread-count" data-thread-key="<?= $video->id ?>"></span>评论</div>
                        <div class="hr1"></div>
                        <div class="post-author"  style=" margin-top:10px;">
                        <div id="avatar" class="float-left"><a href="user.php?id=<?=$video->userid?>" ><img src="<?=$user->avatar()->link(32)?>" width="32" height="32" /></a></div>
                    <div id="post-detailed" class="float-left" style="margin-left:10px">
                        <div id="post-author" style="color: #666666;font-size: 12px"><a href="user.php?id=<?=$video->userid?>" ><?=$user->username?></a>分享</div>
                    </div></div>
        </div>
       