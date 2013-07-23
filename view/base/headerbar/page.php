	<div class="container" >

	<? if (!$visitor->id) { ?>
	<div id="tips" class="hide alert" style="margin:-20px 30px 40px 0px;font-size:12px;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		Hi，欢迎来到艾墨镇，这是一个关于独立影像的小镇。期待你一起来分享更多的内容，<strong><a href="#reg" data-toggle="modal">点此入住</a></strong> 。
	</div>
    <? } ?>
	<? if ($headname == "discover") { ?>
	<div style="width:100%; height:20px; ">
      
          <div style="color:#AAA; float:left;margin:-10px 0 0 0">
            <ul id="headerbar" style="margin-left:0px">
              <?php if ($pagename=="index"){ echo '<li class="active">';}else{echo '<li >';} ?><a href="/">最新</a></li>
              <?php if ($pagename=="hot"){ echo '<li class="active dropdown" >';}else{echo '<li class="dropdown" >';} ?> 
                <a class="dropdown-toggle" id="drop4" role="button" data-hover="dropdown" data-toggle="dropdown" href="#">最热 <b class="caret"></b></a>
                <ul id="menu1" class="dropdown-menu" role="menu" aria-labelledby="drop4">
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/hot/view/">最多观看</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/hot/comment/">最多评论</a></li>
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="/hot/fav/">最多收藏</a></li>
                </ul>
              </li>
              <?php if ($pagename=="verify"){ echo '<li class="active">';}else{echo '<li >';} ?><a href="/verify/">创作人</a></li>
              <?php if ($pagename=="discover"){ echo '<li class="active">';}else{echo '<li >';} ?><a href="/discover/">随便看看</a></li>
              <?php if ($pagename=="tag"){ echo '<li class="active dropdown" >';}else{echo '<li class="dropdown" >';} ?> 
                <a class="dropdown-toggle" id="drop5" role="button" data-hover="dropdown" data-toggle="dropdown" href="#">分类 <b class="caret"></b></a>
                <ul id="menu3" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                  <? foreach ($tags as $each_tag) { ?>
				  <li><a href="/tag/<?=$each_tag->id?>/"><?=$each_tag->name?> <span style="float:right; color:#ABABAB">(<?=$each_tag->count?>)</span></a></li>
				  <? } ?>
                </ul>
              </li>
            </ul> <!-- /tabs -->
          </div> 
        
        
		<div style="float:right;margin:-14px 0 0 10px"><wb:follow-button uid="3163946864" type="red_2" width="136" height="24" ></wb:follow-button></div>
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