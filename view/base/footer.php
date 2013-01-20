
      

      <div id="footer" style="text-align: center; font-size: 12px; color:#C0C0C0">
        <p>&copy; Designed by Animetaste.net | Built on  Bootstrap | Contact us | Follow us: <a href="http://weibo.com/animetaste" class="sina">新浪</a>
						<a href="http://site.douban.com/108892/" class="douban">豆瓣</a>
						<a href="http://animetaste.diandian.com/" class="diandian">点点</a></p>
        <p>&nbsp;</p>
      </div>

    </div> <!-- /下方 -->
    <a id="issue" href="/issue/">   
  <span>用户<br />反馈</span> 
</a>

    <!-- javascript
    ================================================== -->
    <script src="/media/js/bootstrap.js"></script>
    <script src="/media/js/amz.js"></script>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=652974" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
<!-- 多说js加载开始，一个页面只需要加载一次 -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"aimozhen"};
(function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = 'http://static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ds);
})();
</script>
<!-- 多说js加载结束，一个页面只需要加载一次 -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0123a2f162a7829ef691d1b9702258e3' type='text/javascript'%3E%3C/script%3E"));
</script>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11082147-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

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
</div></div>  


</body>
</html>