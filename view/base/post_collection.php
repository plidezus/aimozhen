<div class="span3 shadow" style="height:205px;padding:10px; margin-bottom:20px;">
	<div class="playbutton">
		<span>
			<a href="/collection/<?= $collection->id ?>/" target="_blank" title="<?= $collection->name ?>" >
				<div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;
				</div>
			</a>
		</span>
        <? $video = new Video($collection->thumbid); $user = new User($collection->userid);?>
	<div class="img-rounded post-image" style=" <?php if ($video->imageUrl==""){ echo "background: url('/images/noimage.jpg') no-repeat center center;";}else{echo "background: url('".$video->imageUrl."') no-repeat center center;background-size: 290px;background-color:#000000";}?> ">
	</div>     					
</div>
                <div style="margin-top: 170px;float:right"><span class="label label-inverse" style="line-height:20px;">&nbsp;<?= $collection->count ?>部&nbsp;</span></div>
                <div class="collection-title"><a href="/collection/<?= $collection->id ?>/" target="_blank" title="<?= $collection->name ?>" ><?= $collection->name ?></a></div>
				<div class="collection-infor">由 <?=$user->username?> 创建</div>
</div>
