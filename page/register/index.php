<?php
include "../../include/init.php"; $pagename = "register" ;
include '../../view/base/header.php';

?>
<div class="container">
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="content-video" class="shadow" style="padding:15px;">
     	 <div id="content-title" style="margin-bottom: 10px;font-weight: bold;">申请<?=$sitename?>内测</div>
        <div id"des" style="margin-top: 20px; padding-bottom:15px;color: #666;">
		      	<p>欢迎你来到	<?=$sitename?>！<br />
如果你也愿意一起来分享，欢迎申请我们的内测资格。<br/>当然测试期间我们还有很多缺陷，也希望你在测试之后，能给我们反馈和建议，让我们做的更好。<br/>
申请内测用户后会有以下好处：
<li> 分享精彩内容</li>
<li> 记录喜欢的内容</li>
<li> 关注有趣的人</li>
<li> 独立动画人还能享受专属名片和身份认证</li>



		      	</p>
          </div>
      
      <!-- /观看区域-->
      <? if($visitor->id) { ?>
            <!-- 评论-->
         <div style="border-top:1px solid rgba(0, 0, 0, 0.13);margin:15px 0 ;padding:10px 0 ;"></div>
      	 <form class="form-horizontal" action="/ajax/register.php" id="register" method="POST">
         <input id="uid" name="uid" type="hidden" value="<?=$visitor->id?>" />
				<div class="control-group">
					<label class="control-label2" for="input01">Email</label>
					<div class="controls2">
						<input type="text" class="input span4" id="email" name="email" readonly value="<?=$visitor->email?>" />
					</div>
				</div>
				<div class="control-group" id="namegroup">
					<label class="control-label2" for="name">姓名</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="name" name="name" placeholder="请填写真实姓名哟">
                      <span class="help-inline" id="nameInfo"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">性别</label>
					<div class="controls2">
					  男 <input name="sex" type="radio" value="男" checked>&nbsp;&nbsp;&nbsp;女 <input name="sex" type="radio" value="女">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">原因</label>
					<div class="controls2">
					  <textarea placeholder="说说从哪里知道我们，想来分享点什么内容……" class="span4" name="reason" style="min-height:200px;max-width: 356px;" ></textarea>
					</div>
				</div>
                
				<div style="margin:10px 0 0 60px;">
					<input type="submit" class="btn btn-red" value="恩，就这样吧！" />
					
				</div>
		</form>
        <script src="/include/validation/register.js"></script>
        
        </div>
      <!-- /评论-->
      <? } else { ?>
      		 <!-- 评论-->
         <div style="border-top:1px solid rgba(0, 0, 0, 0.13);margin:15px 0 ;padding:10px 0 ;"></div>
      	 <div style="font-size: 14px; color: #666666; margin: 10px 0 20px 0;"><strong>你好 如果你想在艾墨镇分享视频请申请内测<br />
			    <a href="#reg" data-toggle="modal">点击这里</a>注册账号并登陆<br /></strong></div>
        </div>
      <!-- /评论-->
      <? ;} ?>
      
      
			  </div>
      
      <!--左侧 -->
        <div class="span3">
		     		<div class="shadow" style="padding:10px; margin-bottom:20px;">
		     		<?php if ($pagename=="tag") { ?><div>共有 <strong><?=$video_count?></strong> 部作品被标记为 <?=$tag->name?></div>
            <? } elseif ($pagename=="verify") { ?>
            <div><?=$sitename?>共有 <strong><?=$video_count?></strong> 部原创作品
            </div>
            <? } else { ?>
            <div><?=$sitename?>共有 <strong><?=$video_count?></strong> 部作品
            </div>            <? } ?>用微信扫描在手机上看：
            <img src="/images/qrcode_for_gh_25dc9fb5375c_430.jpg">
            
    	</div>
      
      <!--左侧 -->
      </div>
    </div> <!-- /上方 -->

<?php
include '../../view/base/footer.php';
?>
