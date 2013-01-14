
      <hr>

      <div id="footer" style="text-align: center; font-size: 12px;">
        <p>&copy; Designed by Animetaste.net | Built on  Bootstrap | Contact us | Follow us: <a href="http://weibo.com/animetaste" class="sina">新浪</a>
						<a href="http://site.douban.com/108892/" class="douban">豆瓣</a>
						<a href="http://animetaste.diandian.com/" class="diandian">点点</a></p>
        <p>&nbsp;</p>
      </div>

    </div> <!-- /下方 -->

    <!-- javascript
    ================================================== -->
    <script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script> 
    <script type="text/javascript">
$(function(){
    $(".playbutton").hover(function(){
        $(this).find("span").show();
    },function(){
        $(this).find("span").hide();
    });
});
</script>
    
    <script src="../media/js/bootstrap.js"></script>
    <script src="/media/js/amz.js"></script>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=652974" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>


<div id="login" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">登录</h3>
  </div>
    <div class="modal-body">
    <form action="/login.php" method="POST">
        <div class="modal-body">
            用户名：<input type="text" name="username" /> <br />
            　密码：<input type="password" name="password" /> <br />
            <input type="submit" value="登录" class="btn btn-red"/>
        </div>
    </form>
    </div>
</div>
<div id="share" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">分享动画</h3>
  </div>    <div class="modal-body">
    <form action="ajax/post.php" method="POST">
        <div class="modal-body">
            视频页面地址: <input type="text" name="url" />
            <input type="submit" value="发布" class="btn btn-red"/>
        </div>
    </form>
</div></div>  </body>
</html>