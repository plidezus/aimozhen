	<div class="container" >

	<? if (!$visitor->id) { ?>
	<div id="tips" class="hide alert" style="margin:-20px 30px 40px 0px;font-size:12px;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		Hi，欢迎来到艾墨镇，这是一个关于独立影像的小镇。期待你一起来分享更多的内容，<strong><a href="#reg" data-toggle="modal">点此入住</a></strong> 。
	</div>
    <? } ?>
	<? if ($headname == "discover") { ?>
	<div style="width:100%; height:20px;">
      
		<div id="headerbar" style="color:#AAA; float:left;margin:-14px 0 0 0">
            <?php if ($pagename=="index"){ echo '<a style="color:#333;font-weight:bold;"';}else{echo '<a';} ?> href="/">最新</a>
            <?php if ($pagename=="hot"){ echo '<a style="color:#333;font-weight:bold;"';}else{echo '<a';} ?> href="/hot">热门</a>
            <?php if ($pagename=="verify"){ echo '<a style="color:#333;font-weight:bold;"';}else{echo '<a';} ?> href="/verify">创作人</a>
            <?php if ($pagename=="discover"){ echo '<a style="color:#333;font-weight:bold;"';}else{echo '<a';} ?> href="/discover">随便看看</a>    
		</div>
		<div class="btn-group" style="margin:-16px 0 0 -10px">
            <?php if ($pagename=="tag"){ echo '<a style="color:#333"font-weight:bold;';}else{echo '<a';} ?> href="#" role="button" id="tagbar" class="btn btn-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">分类 <b class="caret"></b></a>
            <ul class="dropdown-menu">   
			<? foreach ($tags as $each_tag) { ?>
				<li><a href="/tag/id<?=$each_tag->id?>-1/"><?=$each_tag->name?> <span style="float:right; color:#ABABAB">(<?=$each_tag->count?>)</span></a></li>
			<? } ?>
			</ul>
		</div>
		<div style="float:right;margin:-14px 10px 0 10px"><wb:follow-button uid="3163946864" type="red_2" width="136" height="24" ></wb:follow-button></div>
		<?php if ($pagename=="tag") { ?>
		<div style="color:#AAA; float:right;margin:-14px 0 0 0">共有 <strong><?=$video_count?></strong> 部作品被标记为 <?=$tag->name?></div>
		<? } elseif ($pagename=="verify") { ?>
		<div style="color:#AAA; float:right;margin:-14px 0 0 0"><?=$sitename?>共有 <strong><?=$video_count?></strong> 部原创作品</div>
		<? } else { ?>
		<div style="color:#AAA; float:right;margin:-14px 0 0 0"><?=$sitename?>共有 <strong><?=$video_count?></strong> 部作品</div>
		<? } ?>
        
	</div>
    	<div class="hr2" style="margin:0 30px 15px 0;"></div>
		
		<? } ?>