<?php
include "../../include/init.php"; $pagename = "issue";
include '../../view/base/header.php';

?>
<div class="container">
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="content-video" class="shadow" style="padding:15px;">
     	 <div id="content-title" style="margin-bottom: 10px;font-weight: bold;"><?=$sitename?> 问题反馈页面</div>
        <div id"des" style="margin-top: 20px; padding-bottom:15px;color: #666;">
		      	亲爱的ATer们欢迎来到<?=$sitename?>！，想了解更多关于艾墨镇的故事，<a href="http://aimozhen.com/page/about/" target="_blank">请点此查看</a><br />
我们的站点正在内测中。如果您发现问题或有什么建议，请在下方的留言框中提出<br />
我们将尽快回复！<br />
	</div>
      
      <!-- /观看区域-->
      
            <!-- 评论-->
           
      	<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread" style="border-top:1px solid rgba(0, 0, 0, 0.13);margin:15px 0 0;padding:10px 0 0;"></div>
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
      
      <!--左侧 --> <div class="span3">
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

      </div>
      
    </div> <!-- /上方 -->

<?php
include '../../view/base/footer.php';
?>
