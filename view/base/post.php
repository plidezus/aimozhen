<div class="span3 shadow" style="height:318px;padding:10px; margin-bottom:20px;">
	<div class="playbutton">
		<span>
			<a href="/video/<?= $video->id ?>/" target="_blank" title="<?= $video->title ?>" >
				<div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;
				</div>
			</a>
		</span>
	<div class="img-rounded post-image" style=" <?php if ($video->imageUrl==""){ echo "background: url('/images/noimage.jpg') no-repeat center center;";}else{echo "background: url('".$video->imageUrl."') no-repeat center center;background-size: 290px;background-color:#000000";}?> ">
	</div>     					
</div>
                <div class="post-title"><a href="/video/<?= $video->id ?>/" target="_blank" title="<?= $video->title ?>" ><?= $video->title ?></a></div>
    			<div class="post-explain"><?php if($video->description==""){ ?>作品之美 胜于言表<? }else{ echo $video->description; } ?></div>
				<div class="post-infor">观看<?=intval($video->viewed)?>次 <span class="ds-thread-count" data-thread-key="<?= $video->id ?>"></span>评论</div>
                <div class="hr1"></div>
                <div class="post-author"  style=" margin-top:10px;">
                <div class="avatar"  style="height:32px; width:32px;"><a href="/user/<?=$video->userid?>/" ><img width="32" height="32" src="<?=$user->avatar()->link(32)?>" /></a></div>
            <div id="post-detailed" class="float-left" style="margin-left:10px;line-height:12px">
                <div id="post-author" class="ellipsis" style="width:170px;font-size:12px;line-height:18px;"><a href="/user/<?=$video->userid?>/" title="<?=$user->username?>"><?=$user->username?></a> </div>
                <div style="color: #bbb;font-size:11px;"><?=(date("Y-n-d G:i",$video->createdTime));?></div>
                	
            </div></div>
</div>
