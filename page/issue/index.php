<?php
include "../../include/init.php"; $pagename = "issue";
include '../../view/base/header.php';

?>
<div class="container">
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="content-video" class="shadow" style="padding:10px;">
     	 <div id="content-title" style="margin-bottom: 10px;font-weight: bold;"><?=$sitename?> 问题反馈页面</div>
        <div id"des" style="margin-top: 20px; padding-bottom:10px;color: #666;">
		      	亲爱的ATer们欢迎来到<?=$sitename?>！<br />
我们的站点正在内测中。<br />
如果您发现问题或者有什么建议与意见请在下方的留言框中提出<br />
我们将尽快给您答复<br />
谢谢！
	</div>
      </div>
      <!-- /观看区域-->
      
            <!-- 评论-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">留言区：</div>
      <div id="content-video" class="shadow" style=" margin-top:20px;padding:10px;">
      	<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread"></div>
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
<!-- Duoshuo Comment END -->
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
