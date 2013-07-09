            <div class="post-author"  style=" height:50px; margin:0 0 20px 5px">
                <div class="avatar"  style="height:50px; width:50px;"><a href="/user/<?=$user->id?>/" ><img width="50" height="50" src="<?=$user->avatar()->link(50)?>" /></a></div>
                <div id="post-detailed" class="float-left" style="margin-left:15px;">
                    <div id="post-author" class="ellipsis" style="margin-top:5px;width:120px;font-size:14px;line-height:16px;"><a href="/user/<?=$user->id?>/" title="<?=$user->username?>" style="color: #2d8fcc"><?=$user->username?></a> </div>
                    <? $days = abs(time() - $user->createdTime)/86400;?>
                    <div style="color: # 333;font-size:11px;">已入住<?=floor($days)?>天</div> 
            	</div>
            </div>
	