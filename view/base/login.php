      <? if (!$visitor->id) { ?>
      <!-- 登录前模块-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        <a href="#login" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">分享前请登录</span></a></div>
        <div class="hr1" style="margin-top:10px;"></div>
        <div id="welcome" style="margin-top:5px;">
        <p>欢迎你来到<?=$sitename?>，这里居住着一群热爱独立影像的朋友们。</p>
        <p>你可以在这里尽享大家分享的精彩内容，留言讨论。</p>
        <p>或者<a style="color: #FF8080; font-weight: bold;" href="/page/register/">申请内测</a>，和我们分享更多的精彩！</p>
        </div>
        </div>

        <!-- /登录前模块--> 
			<? } else { ?>
        <!-- 登录后模块-->
        <div class="span3 shadow" style="padding:10px; margin-bottom:20px;">
        <div id="card-button">
        <a href="#share" role="button" class="btn btn-block btn-red" data-toggle="modal"><img style="float:left; padding:4px 0 0 10px;" src="../images/plus.png" /><span style=" margin-left: -15px;">我也要分享</span></a></div>
        <div class="hr1" style="margin-top:10px;"></div>
        <div id="welcome" style="margin-top:5px;">
          <p><? foreach ($tags as $each_tag) { ?>
                <a href="/tag/?id=<?=$each_tag->id?>" role="button" class="btn btn-mini" style=" width:60px;margin:0 10px 5px 15px"><?=$each_tag->name?></span></a>
				<? } ?>
          </p>
        </div>
        </div>
			 <? } ?>