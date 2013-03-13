<?php
include "../../include/init.php"; $pagename = "register" ;
include '../../view/base/header.php';

?>
<div class="container">
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="content-video" class="shadow" style="padding:10px;">
     	 <div id="content-title" style="margin-bottom: 10px;font-weight: bold;"><?=$sitename?> 申请内测页面</div>
        <div id"des" style="margin-top: 20px; padding-bottom:10px;color: #666;">
		      	<p>亲爱的ATer们欢迎来到
		      	<?=$sitename?>！<br />
我们的站点正在内测中。<br />
如果你也希望参与内测，请给我们留言，我们将定期审核。
		      	</p>
          <p><strong>申请邮件的标题</strong><br />
          【内测申请】艾墨镇内测用户申请</p>
          <p><strong>申请邮件的基本内容包括</strong>（下面为示例）<br />
            【Email】 admin@aimozhen.com<br />
            【真实姓名】 艾墨镇<br />
            【性别】 男<br />
            【注册原因】 我是艾墨镇工作室的小编，平时喜爱观看各种动画作品……</p>
          <p>一定要真实填写哟~<br />
          我们会定期审核并予以恢复<br />
          谢谢你对我们喜爱与支持！</p>
        <span style="margin-top: 20px; size: 14px; color: #666666">你可以在下方直接填写，也可以通过自己的邮箱将申请信发送至 admin@aimozhen.com</span></div>
      </div>
      <!-- /观看区域-->
      
            <!-- 评论-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">申请区：<br />
      </div>
      <div id="content-video" class="shadow" style=" margin-top:20px;padding:30px 0 0 30px;">
      
      	 <form class="form-horizontal" action="/ajax/register2.php" method="POST">
				<div class="control-group">
					<label class="control-label2" for="input01">Email</label>
					<div class="controls2">
						<input type="text" class="input span4" id="email" name="email" placeholder="作为你登陆的用户名">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">姓名</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="name" name="name" placeholder="请填写真实姓名哟">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">性别</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="sex" name="sex">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">原因</label>
					<div class="controls2">
					  <textarea placeholder="注册原因。" class="span4" name="reason" style="min-height:200px;max-width: 356px;" ></textarea>
					</div>
				</div>
                
				<div style="margin:10px 0 0 60px;">
					<input type="submit" class="btn btn-red" value="恩，就这样吧！" />
					
				</div>
		</form>
        
        </div>
      <!-- /评论-->
      
      
      
			  </div>
      
      <!--左侧 -->
        <div class="span3"> 	

        </div>
      
      <!--左侧 -->
      </div>
    </div> <!-- /上方 -->

<?php
include '../../view/base/footer.php';
?>
