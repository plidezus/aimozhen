   	  <div style="width:100%; height:20px;">
          <div id="headerbar" style="color:#AAA; float:left;margin:-14px 0 0 0">
            <?php if ($pagename=="new"){ echo '<a style="color:#333"';}else{echo '<a';} ?> href="/?v=new">最新</a>
            <?php if ($pagename=="hot"){ echo '<a style="color:#333"';}else{echo '<a';} ?> href="/hot">热门</a>
            <?php if ($pagename=="verify"){ echo '<a style="color:#333"';}else{echo '<a';} ?> href="/verify">原创</a>    
          </div>
          <div class="btn-group" style="margin:-16px 0 0 -10px">
            <?php if ($pagename=="tag"){ echo '<a style="color:#333"';}else{echo '<a';} ?> href="#" role="button" id="tagbar" class="btn btn-link dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">分类 <b class="caret"></b></a>
            <ul class="dropdown-menu">   
							<? foreach ($tags as $each_tag) { ?>
							<li><a href="/tag/?id=<?=$each_tag->id?>"><?=$each_tag->name?> <span style="float:right; color:#ABABAB">(<?=$each_tag->count?>)</span></a></li>
							<? } ?>
                        </ul>
           </div>

          <?php if ($pagename=="tag") { ?>
    		<div style="color:#AAA; float:right;margin:-14px 30px 0 0"><strong>共有 <?=$video_count?> 部作品被标记为 <?=$tag->name?></strong></div>
            <? } else { ?>
            <div style="color:#AAA; float:right;margin:-14px 30px 0 0"><strong><?=$sitename?>共有 <?=$video_count?> 部作品</strong></div>
            <? } ?>
    	</div>
    	<div class="hr2" style="margin:0 30px 20px 0"></div>