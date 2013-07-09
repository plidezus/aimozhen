<div class="span3"> 
        	<div class="shadow" style="padding:15px;">
                <div id="card-top" style="margin-bottom:50px">
                    <div id="avatar" class="float-left"><a href="<?=$visitor->avatar()->editLink()?>"><img src="<?=$visitor->avatar()->link(50)?>" width="50" height="50" /></a></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="cardname" class="ellipsis" style="width:120px;"><?=$visitor->username?></div>
                        <? $days = abs(time() - $visitor->createdTime)/86400;?>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">已入住<?=floor($days)?>天</div>
                    </div>    
                </div>
      		</div>	
        	<div  class="shadow" id="my-list" style="padding:15px;margin-top:30px">
            <ul class="nav nav-list">
                <?php if ($homename=="videos"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/videos/"><i class="icon-home icon-white"></i> 我分享的</a></li>
                <?php if ($homename=="likes"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/likes/"><i class="icon-heart"></i> 我收藏的</a></li>
				<?php if ($homename=="following"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/following/"><i class="icon-star"></i> 我关注的</a></li>
			</ul>
            </div>
        </div>
        
