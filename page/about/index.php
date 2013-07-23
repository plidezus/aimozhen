<?php
include "../../include/init.php"; $pagename = "about" ;
include '../../view/base/header.php';

?>
<div class="container">
	<div class="row">
      	<div class="span8"> 
	      	<!-- 观看区域-->
	      	<div id="content-video" class="shadow" style="padding:15px;">
     	 		<div id="content-title" style="margin-bottom: 10px;font-weight: bold;">
     	 			关于<?=$sitename?>
     	 		</div>
     	 		<div id="des" style="margin-top: 20px;color: #666;line-height:22px;">
		      		<p>这是一个不大的镇子，里面居住着一群热爱影像的镇民。在这里你恐怕不会看到热门的电影，电视剧等消磨时光的内容。人生很短，在这不多的时间里，已经有太多东西在帮助你消磨时光，不需要多我们一个。</p>
		      		<p>我们只希望你能去为这个世界创造点什么，而当你缺乏灵感的时候，我们很乐意成为你的灵感之源。当你孤独寂寞的时候，你会发现还有一群人在和你一起向前走。</p>
		      		<p>一个人走得快，但是一群人走的远。艾墨镇只是浩瀚网络世界中的一个小小节点，只希望你能在此找到同路人，找到灵感，找到心灵的归宿。</p>
		      		<p>我们期待你的加入，这个小小的乌托邦。<a href="http://aimozhen.com/page/register/" target="_blank">点此申请内测</a></p>
		      		<p>艾墨镇始建于2013年，脱胎于品赏艾尼墨（AnimeTaste）。由Plidezus，Fcrosfly，GavinFoo，Mr.T共同建设，目前是一个基于兴趣的业余小团队。代码托管于<a href="https://github.com/plidezus/aimozhen/" target="_blank">Github</a>，如果你有兴趣加入我们团队，欢迎邮件给<a href="mailto:admin@aimozhen.com" target="_blank">admin@aimozhen.com</a></p>  
		      	</div>
		      	<div style="width:500px;height:100px;padding:10px 0;">
		      		<a href="http://www.plidezus.net" target="_blank"><img style="width:100px;height:100px;" src="/images/plidezus.jpg"></a>
		      		<a href="http://weibo.com/u/1859341473" target="_blank"><img style="width:100px;height:100px;" src="/images/kaola.jpg"></a>
		      		<a href="http://weibo.com/fuxiaopang" target="_blank"><img style="width:100px;height:100px;" src="/images/Gavin.jpg"></a>
		      		<a href="http://weibo.com/motiont86" target="_blank"><img style="width:100px;height:100px;" src="/images/tea86.jpg"></a>
		      	</div>
      
		     <!--左侧 -->
		     	
		     </div>
		    
		  </div> <!-- /上方 --> 
		   <!-- /右侧通用 --> 
		  <div class="span3">
		     		<div class="shadow" style="padding:10px; margin-bottom:20px;">
		     		
            <div><?=$sitename?>共有 <strong><?=$video_count?></strong> 部作品
            </div>           用微信扫描在手机上看：
            <img src="/images/qrcode_for_gh_25dc9fb5375c_430.jpg">
            
    	</div>
    	
		     		</div>
	  </div> 
</div> 
<?php
include '../../view/base/footer.php';
?>
