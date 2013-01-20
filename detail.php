<?php
include "include/init.php";
$video = new Video($_GET['id']);
$video->viewed += 1;
$video->save();
$user = new User($video->userid);

include 'view/base/header.php';
?>
<div class="container">
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="content-video" class="shadow" style="padding:10px;">
     	 <div id="content-title" style="margin-bottom: 10px;font-weight: bold; font-size:18px;"><?=$video->title?></div>
      	<?=$video->content()?>
      	<div id="content-others" style="margin-top:10px;">
        <a href="ajax/fav.php?id=<?=$video->id?>" role="button" class="btn btn-red ajax" >点此收藏</a>
      		<span style="color: #999; margin-left:10px;">被围观<?=intval($video->viewed)?>次 | 被收藏<?=intval($video->like)?>次</span> 
       	  <div id="fenxiang" style="position:relative; float:right; "><!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
<a class="bds_tsina"></a>
<a class="bds_renren"></a>
<a class="bds_douban"></a>
<a class="bds_diandian"></a>
<a class="bds_twi"></a>
<a class="bds_fbook"></a>
<a class="bds_mshare"></a>
<span class="bds_more"></span>
<a class="shareCount"></a>
</div>

<!-- Baidu Button END --></div></div>
        <div id"des" style="margin-top: 20px; padding-bottom:10px;color: #666;text-indent : 28px;line-height:22px">
		 <?php
if($video->description=="")
{  ?>
这个ATer很懒，什么也没留下
<?php  }else{ ?>
<?php echo $video->description; } ?>
	</div>
      </div>
      <!-- /观看区域-->
      
            <!-- 评论-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">评论一下：</div>
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
      
      <!-- 相关-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">相关动画推荐：</div>
      <div id="content-video" class="shadow" style=" margin-top:20px;padding:0px 10px;">
      	<script type="text/javascript" id="wumiiRelatedItems"></script>
      </div>
      <!-- /相关-->
      
      
			  </div>
      
      <!--左侧个人名片 -->
        <div class="span3"> 
        	<div class="shadow" style="padding:10px; margin-bottom:20px;">
                <div id="card-top" style="margin-bottom:50px">
                    <div id="avatar" class="float-left"><img src="<?=$user->avatar()->link(50)?>" width="50" height="50" /></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><a href="user.php?id=<?=$video->userid?>"><span style="color: #202020;"><?=$user->username?></a></span></div>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">2010年11月08日加入</div>
                    </div>    
                </div>
      		</div>	
            
            
            <div class="shadow" style="padding:5px 10px 10px 10px;">
                <div id="post-ta-top" style="margin-bottom:50px">
                TA的分享
  
                </div>
      		</div>
            
        	<div id="my-list" style="margin-top:30px">
            <ul class="nav nav-list">
				<li class="active"><a href="#"><i class="icon-home icon-white"></i>正在观看</a></li>
				<li><a href="ajax/fav.php?id=<?=$video->id?>"><i class="icon-book"></i>收藏这个视频</a></li>
				<li><a href="#"><i class="icon-pencil"></i>评论这个视频</a></li>
			</ul>
            </div>
        </div>
      
      <!--左侧个人名片 -->
      </div>
    </div> <!-- /上方 -->

<script type="text/javascript">
    var wumiiPermaLink = ""; //请用代码生成文章永久的链接
    var wumiiTitle = "<?=$video->title?>"; //请用代码生成文章标题
    var wumiiTags = ""; //请用代码生成文章标签，以英文逗号分隔，如："标签1,标签2"    
    var wumiiSitePrefix = "http://aimozhen.com/";
    var wumiiParams = "&num=5&mode=3&pf=JAVASCRIPT";
</script>
<script type="text/javascript" src="http://widget.wumii.com/ext/relatedItemsWidget"></script>



<?php
include 'view/base/footer.php';
?>
