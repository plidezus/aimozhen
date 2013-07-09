
      <div id="footer" style="text-align: center; font-size: 12px; color:#C0C0C0">
        <p>&copy; <a href="http://animetaste.org/" target="_blank">AnimeTaste.org</a> · <a href="/page/about/" target="_blank">About</a> ·  <a href="mailto:admin@aimozhen.com" class="Email">Contact</a> · Made with ❤ in Shanghai · Thanks <a href="http://twitter.github.com/bootstrap/" class="Bootstrap">Bootstrap</a> · <a href="http://www.miibeian.gov.cn" target="_blank">沪ICP备13003160号</a></p>
        <p>&nbsp;</p>
</div>

    </div> <!-- /下方     <a id="issue" href="/page/issue/">   
  <span>用户<br />反馈</span> 
</a>
-->

    <!-- javascript
    ================================================== -->
    <script src="/media/js/bootstrap.js"></script>
    <script src="/media/js/amz.js"></script>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=652974" ></script>
	<script type="text/javascript" id="bdshell_js"></script>
	<script type="text/javascript">
	var bds_config = {'wbUid':3163946864,'snsKey':{'tsina':'2517727821'}};
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
	</script>
    
    	<script type="text/javascript">
	var duoshuoQuery = {short_name:"aimozhen"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = 'http://static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0] 
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	</script>
    
    
    <? if ($visitor->id) { ?>
<div id="invite" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" style="color: #FFFFFF" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">邀请注册</h3>
  </div>
    <div class="modal-body">
	    <form class="form">
	        <input class="span4" type="email" id="email_input" placeholder="如果你喜欢这里，写下他/她的Email，把他/她拉来陪你吧。"/><br />
            <div id="message"></div>
            <p></p>
	        <p>
		    <a id="get_invite" href="###" class="btn btn-red">获取邀请信</a>
            <a id="copy_url" href="###" class="btn btn-red hide">复制链接到剪贴板并请你的好友访问</a>
	        </p>

	    </form>
    </div>
</div>
<script>
    $(function(){
	    jQuery('#get_invite').click(function(){
            jQuery.get('/ajax/invite.php', {email : $('#email_input').val()}, function(data){
	            if (data != '请填写Email哦！') {
                    $('#get_invite').hide();
                    $('#copy_url').show().click(function(){
                        window.clipboardData.setData('text', $('#message input').html());
                    });
                }
                $('#message').html(data);
            });
        })
        jQuery('#my-sidebar a[href="<?=$_SERVER['REQUEST_URI']?>"]').parent().addClass('active');
    });
</script>
    
    <? }?>
    
    

<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" style="color: #FFFFFF" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">登录</h3>
  </div>
    <div class="modal-body">
    <form action="/login.php" method="POST">
        <div class="modal-body">
				邮件&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" /> &nbsp;&nbsp; <a href="#reg" data-toggle="modal" style="font-size:80%">没有账号？</a> <br />
				密码&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password" /> &nbsp;&nbsp; <a href="#forget" data-toggle="modal" style="font-size:80%">找回密码</a> <br /></div>
            &nbsp;&nbsp;<input type="submit" value="登录" class="btn btn-red"/>
        </div>
    </form>
    </div>
</div>

<div id="reg" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" style="color: #FFFFFF" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">注册</h3>
  </div>
    <div class="modal-body">
    <form action="/ajax/reg.php" method="POST">
        <div class="modal-body">
        <p><span style="font-size: 80%">欢迎来到艾墨镇 请在下方填写你常用的邮箱</span></p>
				邮件&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" /><p></p></div>
            &nbsp;&nbsp;<input type="submit" value="下一步" class="btn btn-red"/>
        </div>
    </form>
    </div>
</div>

<div id="forget" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" style="color: #FFFFFF" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">找回密码</h3>
  </div>
    <div class="modal-body">
    <form action="/ajax/forget/validate.php" method="POST">
        <div class="modal-body">
   		  <p>请填写用来登录的邮件地址 我们将向你发送一份身份确认邮件<br />
			<span style="font-size: 80%">如果提交多次仍没有收到邮件请与我们联系 admin@aimozhen.com</span></p>
			<input type="text" name="email" placeholder="电子邮件地址"/> <br />
            <input type="submit" value="确认" class="btn btn-red"/>
        </div>
    </form>
    </div>
</div>

<div id="share" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" style="color: #FFFFFF" aria-hidden="true" data-dismiss="modal">×</button>

  <? if($visitor->guest==0) { ?>
  
        <h3 id="ModalLabel">分享视频</h3>
  </div>    <div class="modal-body">
    <form action="/ajax/post.php" id="post" method="POST" >
        <div class="modal-body">
                <div class="control-group" id="urlgroup">
            <input type="text" name="url" id="url" class="input-block-level share-video" placeholder="请输入你想要分享的视频页面地址"/>
            <span class="help-inline" id="urlInfo"></span>
			<div style="font-size: 14px; color: #919191; margin: 10px 0 20px 0;"><strong>支持优酷，土豆，56，新浪博客等视频网站<br />艾墨镇的氛围和你息息相关，希望你能给我们带来更多精彩的分享</strong></div>
        		</div>
             <input id="send" type="submit" value="发布" data-loading-text="读取中..." role="button"  class="btn btn-red"/>

        </div>
    </form>
    <script src="/include/validation/post.js"></script>
    
  <? ; } else { ?>

        <h3 id="ModalLabel">内测申请</h3>
  </div>    <div class="modal-body">

        <div class="modal-body">
                <div class="control-group" id="urlgroup">
			<div style="font-size: 14px; color: #666666; margin: 10px 0 20px 0;"><strong>我们期待精彩的分享，所以目前只有通过内测邀请的用户才能分享哦，如果你也愿意和大家一起分享，请点击下面按钮<br /><br />
			    <a role="button" class="btn btn-block btn-red" style="height:30px;width:90px;" href="/page/register/">申请内测</a></strong><br /></div>
   		  </div>
        </div>

  <? ; } ?>
</div></div>  


</body>
</html>