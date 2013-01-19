
        <div class="span3 shadow" style="height:260px;padding:10px; margin-bottom:20px;">
                        <div class="playbutton"><span><a href="/detail.php?id=<?= $video->id ?>" target="_blank"><div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;</div></a></span>
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
                        <div id="avatar" class="float-left"><img src="<?=$user->avatar()->link(32)?>" width="32" height="32" /></div>
                    <div id="post-detailed" class="float-left" style="margin-left:10px">
                        <div id="post-author" style="color: #666666;font-size: 12px"><?=$user->username?>  分享</div>
                    </div></div>
        </div>