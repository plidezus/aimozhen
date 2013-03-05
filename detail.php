<?php
include "include/init.php";$pagename = "detail" ;
$video = new Video($_GET['id']);
if (!$video->id) {
	header("LOCATION:/page/404/");
	exit;
}
if($visitor->id != $video->userid) $video->viewed += 1;
$video->save();
$user = new User($video->userid);
$tag = new Tag($video->pre_tag);

include 'view/base/header.php';
?>
<div class="container">
<div class="row"> <div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="/tag/?id=<?=$video->pre_tag?>"><?=$tag->name?></a> > <a href="#"><?=$video->title?></a></div></div>
      <div class="row">
      
                    <div class="span8"> 
      <!-- 观看区域-->
      <div id="thumbnail" style="display:none;background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;"><img src="<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>" /></div>
      <?=$video->content()?>
      
      <div id="video-detail" class="shadow" style="padding:10px;">
      
      <div id="content-others" style="position:relative;float:left;">
     	 <div id="content-title" style="font-weight: bold; font-size:14px;"><?=$video->title?></div>
 		 <span style="color: #999;">被围观<?=intval($video->viewed)?>次 | 被收藏<?=intval($video->like)?>次</span>
	  </div>         
      <div id="fenxiang" style="position:relative; float:right; margin-top:5px;">
      <?php if (!$visitor->id){?>
        <a href="#login" role="button" data-toggle="modal" class="btn btn-red" style="float:left; margin-top:1px">登录后可收藏</a>
        <?php }?>
		<?php if ($visitor->id){
		if (Action::isFav($visitor, $video)) {?>
        <a href="ajax/fav.php?id=<?=$video->id?>&cancel=1" role="button" class="btn btn-inverse ajax" style="float:left; margin-top:1px">取消收藏</a>
		<? } else { ?>
        <a href="ajax/fav.php?id=<?=$video->id?>" role="button" class="btn btn-red ajax" style="float:left; margin-top:1px">点此收藏</a>
		<?php }}?>
      <div style="height:32px; width:1px; border-left:1px #ccc solid; float:left; margin:0 15px;"></div>
            <!-- Baidu Button BEGIN -->
<div id="videoshare" >
    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'pic':'<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>','text':'<?=$video->url?> 我在@艾墨镇 看到一部不错的动画： <?=$video->title?>  '}">
    <a class="bds_tsina"></a>
    <a class="bds_qzone"></a>
    <a class="bds_renren"></a>
    <a class="bds_douban"></a>
    </div>
</div>

<!-- Baidu Button END -->
      
      </div>
      <div id"des" style=" margin-top:60px;padding-bottom:10px;color: #666;text-indent :0px;">
		 <? if($video->description==""){ ?> 这个ATer很懒，什么也没留下 <? }else{ echo nl2br($video->description); } ?>	</div>
      </div>
      <!-- /观看区域-->
      
   
      
      <!-- 相关-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">相关动画推荐：</div>
      <div id="content-video" class="shadow" style=" margin-top:20px;padding:0px 10px;">
      	<script type="text/javascript" id="wumiiRelatedItems"></script>
      </div>
      <!-- /相关-->
      
                  <!-- 评论-->
      <div id="common-title" style="margin-top: 20px; size: 14px; color: #666666">评论一下：</div>
      <div id="content-video" class="shadow" style=" margin-top:20px;padding:10px;">
      	<!-- Duoshuo Comment BEGIN -->
	<div class="ds-thread" data-thread-key="<?=$video->id?>" data-title="<?=$video->title?>"></div>
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
      
      <!--左侧个人名片 -->
        <div class="span3"> 
        	<div class="shadow" style="padding:10px; margin-bottom:20px;">
                <div id="card-top" style="margin-bottom:50px">
                    <div id="avatar" class="float-left"><a href="user.php?id=<?=$video->userid?>"><img src="<?=$user->avatar()->link(50)?>" width="50" height="50" /></a></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><a href="user.php?id=<?=$video->userid?>"><span style="color: #202020;"><?=$user->username?></span></a></div>
                        <div id="birday" style="color: #ABABAB; font-size: 11px">发表于<?=(date("Y年m月d日",$video->createdTime));?></div>
                    </div>    
                </div>
      		</div>	
            
            
            <div class="shadow" style="padding:5px 10px 10px 10px;height:215px;margin-bottom:20px;">
                <div id="post-ta-top">
                TA的分享
                <div style="margin-top:5px;">
                     	<?
		$old=$video ;$out=1;
		$user_id = $video->userid;
		$video = new Video();
		$video->userid = $user_id;
		$videos = $video->find(array('order' => 'id desc'));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
    
     <? if(($out==3)||($out==6)||($out==9)){ ?> 
      <!-- 作品-->
        <a  style="float:left; width:54px; height:54px; margin:0 0 10px 0;background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;background-size:200% 140%;" href="/detail.php?id=<?= $video->id ?>" title="<?= $video->title ?>" target="_blank"></a>
      <!-- /作品--> 
	 <? }else{ ?> 
      <!-- 作品-->
		<a  style="float:left; width:54px; height:54px; margin:0 12px 10px 0;background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center; background-size:200% 140%;" href="/detail.php?id=<?= $video->id ?>" title="<?= $video->title ?>" target="_blank"></a>
      <!-- /作品--> 
      <? } ?>

	<? if($out==9) break; else$out++;}?>
                </div>
  
                </div>
      		</div>
            
            <!-- 视频管理-->
            <? if(!$old->verify == 0) {  
				if (($user->exteremail)||($user->exteremail)||($user->exteremail)) {
				?>
                <div id="my-sites" class="shadow" style="padding:10px; margin-bottom:20px;">
                <div style="margin-bottom:5px;"><strong>我的名片</strong></div>
                <ul class="nav nav-list">
                    <? if ($user->exteremail) { ?>
                    <li><a href="#extre_email" data-toggle="modal"><i class="icon-envelope"></i> 我的电子邮件</a></li>
                    <? }; if ($user->exterblog) {?>
                    <li><a href="<?=$user->exterblog?>" target="_blank"><i class="icon-globe"></i> 我的网站/博客</a></li>
                    <? }; if ($user->exterweibo) {?>
                    <li><a href="<?=$user->exterweibo?>" target="_blank"><i class="icon-star-empty"></i> 我的新浪微博</a></li>	
                    <? };?>
                </ul>
                </div>
            <?  }} ?>
            
            <!-- 视频管理-->
            <? if(($visitor->id == $old->userid)||($visitor->group==1)) {  ?>
        	<div id="my-list" class="shadow" style="padding:10px; margin-bottom:20px;">
            <div style="margin-bottom:5px;"><strong>视频管理</strong></div>
            <ul class="nav nav-list">
				<li><a href="/edit.php?id=<?=$old->id ?>"><i class="icon-pencil"></i> 编辑这个视频</a></li>
				<li><a href="#delete_video" data-toggle="modal"><i class="icon-trash"></i> 删除这个视频</a></li>
						
			</ul>
            </div>
            <?  }else{ } ?>
            
            <div id="video-tag" style="margin-top:30px">
            TAGS：<br />
			<?= $old->tags ?>
            </div>
        </div>
      
      <!--左侧个人名片 -->
      </div>
    </div> <!-- /上方 -->

<!-- Modal -->
<div id="delete_video" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">删除提示</h3>
  </div>
  <div class="modal-body">
    <p>&nbsp;&nbsp;亲！你真的打算删除这条分享吗？三思啊~</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">还是算了</button>
    <a href="/ajax/delete_video.php?id=<?=$old->id?>" role="button" class="btn btn-red">是滴</a>
  </div>
</div>
<div id="extre_email" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">联系作者</h3>
  </div>
  <div class="modal-body">
    <p>&nbsp;&nbsp;我的电子邮件<br />&nbsp;&nbsp;<?=$user->exteremail?></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
  </div>
</div>

<script type="text/javascript">
    var wumiiPermaLink = "http://aimozhen.com/detail.php?id=<?= $old->id ?>"; //请用代码生成文章永久的链接
    var wumiiTitle = "<?=$old->title?>"; //请用代码生成文章标题
    var wumiiTags = "<? echo preg_replace('/\s/',',',$old->tags);?>"; //请用代码生成文章标签，以英文逗号分隔，如："标签1,标签2"    
    var wumiiSitePrefix = "http://aimozhen.com/";
    var wumiiParams = "&num=6&mode=3&pf=JAVASCRIPT";
</script>
<script type="text/javascript" src="http://widget.wumii.com/ext/relatedItemsWidget"></script>


<?php
include 'view/base/footer.php';
?>
