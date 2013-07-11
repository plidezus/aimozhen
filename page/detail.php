<?php
include "../include/init.php"; $pagename = "detail" ;
$video = new Video($_GET['id']);
if (!$video->id) { header("LOCATION:/page/404/"); exit;}
if($visitor->id != $video->userid) {$video->viewed += 1; $video->weekviewed += 1;$video->save();}
$user = new User($video->userid);
$tag = new Tag($video->pre_tag);


include '../view/base/header.php';
?>
    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
	<div class="row"> 
    	<div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="/tag/id<?=$video->pre_tag?>-1/"><?=$tag->name?></a> > <a href="#"><?=$video->title?></a></div>
    </div>

	<div class="row">
		<div class="span12"> 
            <div id="thumbnail" style="display:none;background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;"><img src="<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>" /></div>
            <!-- 观看区域 开始 -->
            <? if(strpos($_SERVER["HTTP_USER_AGENT"],"iPad")) {
            echo $video->padcontent();
            } else if(strpos($_SERVER["HTTP_USER_AGENT"],"iPhone"))  {
            echo $video->phonecontent();
            } else  {
            echo $video->content();
            }; ?>
            <!-- 观看区域 结束 -->
		</div>
    </div>

	<div class="row" style="margin-top:10px">
		<div class="span8">
			<!-- 视频详情 开始 -->
			<div id="video-detail" class="shadow" style="padding:10px;">
                <div id="content-others" style="position:relative;float:left;">
					<div id="content-title" style="font-weight: bold; font-size:16px;"><?=$video->title?></div>
					<div id="information">
					<?=(date("Y年m月d日",$video->createdTime));?>&nbsp; · 围观<?=intval($video->viewed)?>次 · 收藏<?=intval($video->like)?>次&nbsp; | &nbsp;
                <? if($visitor->id) {  ?>
                	
					<? if(($visitor->id == $video->userid)||($visitor->group < 99)) {  ?>
                    <a id="edit" href="/edit/<?=$video->id ?>/">编辑</a> · 
                    	<? if(($visitor->id == $video->userid)||($visitor->group == 1)) {  ?>
                    <a id="delete" href="#delete_video" data-toggle="modal">删除</a> · 
                    	<?  } ?>
                    <?  } ?>
                    <? if($visitor->id != $video->userid) {  ?>
                    <a id="copyright" href="#my_video" data-toggle="modal">认领</a>
                    <?  } ?>
				<?  } else { ?>
                	<a id="copyright" href="#login" data-toggle="modal">认领</a>
                <?  } ?>
                    </div>
                </div>         
				<!-- 分享收藏 开始 -->
				<div id="fenxiang" style="position:relative; float:right; margin-top:5px;">
					
                    <!-- 百度分享按钮 开始 -->            
                    <div id="videoshare" >
                        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'pic':'<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>','text':'<?=$video->url?> 我在艾墨镇看到一部不错的短片 《<?=$video->title?>》 | 去@艾墨镇网 看视频无广告：'}">
                        <a class="bds_tsina"></a>
                        </div>
                         <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" data="{'pic':'<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>','text':'我在艾墨镇看到一部不错的短片 《<?=$video->title?>》 | 去@艾墨镇网 看视频无广告：'}">
                    <a class="bds_renren"></a>
                    <a class="bds_douban"></a>
                    <a class="bds_diandian"></a>
                    <a class="bds_qzone"></a>
                        </div>
                    </div>
                    <!-- 百度分享按钮 结束 -->
                    <!-- 收藏视频 开始 -->
					<?php if (!$visitor->id){?>
                    <a href="#login" role="button" data-toggle="modal" class="btn btn-mini btn-red" style="float:left; margin-top:-1px">收藏</a>
                    <?php }?>
                    <?php if ($visitor->id){
                    if (Action::isFav($visitor, $video)) {?>
                    <a href="/ajax/fav.php?id=<?=$video->id?>&cancel=1" role="button" class="btn btn-mini btn-inverse ajax" style="float:left; margin-top:-1px">取消收藏</a>
                    <? } else { ?>
                    <a href="/ajax/fav.php?id=<?=$video->id?>" role="button" class="btn btn-mini btn-red ajax" style="float:left; margin-top:-1px">收藏</a>
                    <?php }}?>
					<!-- 收藏视频 结束 --> 
                    
				</div>
                <!-- 分享收藏 结束 -->
                
                <!-- 视频说明 开始 -->
                <div id="des" style=" margin-top:60px;padding-bottom:10px;color: #666;text-indent :0px;">	<? if($video->description==""){ ?> 暂时还没有资料，欢迎留言补充 <? }else{ echo nl2br($video->description); } ?>	</div>
                <!-- 视频说明 结束 -->
                
                <!-- 多说评论 开始 -->
                <div class="ds-thread" data-thread-key="<?=$video->id?>" data-title="<?=$video->title?>" data-author-key="<?=$user->id?>" style="border-top:1px solid rgba(0, 0, 0, 0.13);margin:15px 0 0;padding:10px 0 0;"></div>
                <? //$duoshuoinfo = DuoShuo::syncPost($video->id);?>       
                <!-- 多说评论 结束 -->
      		</div>
            <!-- 视频详情 结束 -->
		</div> 

		<div class="span4">
        	<!-- 个人信息 开始 -->
			<div class="shadow" style="padding:10px; margin-bottom:20px;">
            	<!-- 上半部分 开始 -->
                <div id="card-top" style="height:60px">
                    <div class="avatar" ><a href="/user/<?=$video->userid?>/"><img src="<?=$user->avatar()->link(50)?>" style="width:50px; height:50px" /></a></div>
                    <div id="usertop" class="float-left" style="margin-left:10px">
                    	<div id="name">
                    <? if ($user->verify==1) { ?>
                        	<div class="ellipsis float-left" style=" max-width:100px"><a href="/user/<?=$video->userid?>/"  title="<?=$user->username?>"><?=$user->username?></a></div>
                        	<i title="认证作者" class="icon2-yellowv float-left"></i>
                    <? } elseif ($user->verify==2) { ?>
                        	<div class="ellipsis float-left" style=" max-width:100px"><a href="/user/<?=$video->userid?>/"  title="<?=$user->username?>"><?=$user->username?></a></div>
                        	<i title="认证机构" class="icon2-bluev float-left"></i>
                    <? } else { ?>
                        	<div class="ellipsis float-left" style=" max-width:120px"><a href="/user/<?=$video->userid?>/"  title="<?=$user->username?>"><?=$user->username?></a></div>
                    <? } ?>   
                        </div>
                        <div id="contact" style="margin-top:25px">
                        <? if ($user->exterweibo) { ?>
                        <a href="<?=$user->exterweibo?>" target="_blank">Weibo</a> · 
                        <? }; if ($user->exterblog) {?>
                        <a href="<?=$user->exterblog?>" target="_blank">Blog</a> · 
                        <? }; if ($user->exteremail) {?>
                        <a href="#extre_email" data-toggle="modal">Email</a>
                        <? };?>
                        </div>
                    </div>   
                </div>
                <!-- 上半部分 结束 -->
                <div style="margin:0px -10px 0px -10px;" class="hr1"></div>
                <!-- 下半部分 开始 -->
                <div id="card-bottom" style="height:60px">
                  <div class="information">
						<div id="nums"> <a href="/user/<?=$video->userid?>/videos/" target="_blank"><?=$user->post?></a></div>
                        <div id="title"> 分享 </div>
                    </div>   
                    <div class="information">
						<div id="nums"> <?=$user->fav?></div>
                        <div id="title"> 收藏 </div>
                    </div>   
                    <div class="information">
						<div id="nums"> <?=$user->like?></div>
                        <div id="title"> 关注 </div>
                    </div>   
                </div>
                <!-- 下半部分 结束 -->
      		</div>	
            <!-- 个人信息 结束 -->
            <!-- 视频标签 开始 -->
			<div id="video-tag" style="margin-top:30px">
            TAGS：<br />
			<?= $video->tags ?>
            </div>
            <!-- 视频标签 结束 -->
        </div>  
    </div>
    
	<div class="row" style="margin-top:10px">
		<div class="span8">
              <!-- 相关-->
              <div id="content-video" class="shadow" style=" margin-top:10px;padding:20px 10px 0 10px;">
              	<div class="column-title blue" style="margin-bottom:-20px">相关视频推荐</div>
                <script type="text/javascript" id="wumiiRelatedItems"></script>
              </div>
              <!-- /相关-->
      	</div>
    </div>
      
</div>

 <!-- /上方 -->

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
    <a href="/ajax/delete_video.php?id=<?=$video->id?>" role="button" class="btn btn-red">是滴</a>
  </div>
</div>

<div id="my_video" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">认领作品</h3>
  </div>
  <div class="modal-body">
  <div style="font-size: 14px; color: #666666; margin: 10px 0 20px 20px;">
    <strong><?=$visitor->username?> 你好<br />
	这是你的作品吗？你现在可以通过填写下面的表格来认领作品<br /><br />

    </strong>
          	<form class="form-horizontal" action="/ajax/copyright.php" id="copyright" method="POST">
         	<input id="uid" name="uid" type="hidden" value="<?=$visitor->id?>" />
            <input id="vid" name="vid" type="hidden" value="<?=$video->id?>" />
				<div class="control-group" id="namegroup">
					<label class="control-label2" for="name">姓名</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="name" name="name" placeholder="请填写真实姓名哟">
                      <span class="help-inline" id="nameInfo"></span>
					</div>
				</div>
			  <div class="control-group">
					<label class="control-label2" for="input01">说明</label>
					<div class="controls2">
					  <textarea placeholder="凡是一切能证明是你自己做的网址或者说明都可以哟" class="span4" name="reason" style="min-height:120px;max-width: 356px;" ></textarea>
					</div>
				</div>
                
				<div style="margin:10px 0 0 60px;">
					<input type="submit" class="btn btn-red" value="恩，就这样吧！" />
			  </div>
		</form>
        <span style="font-size: 90%">我们将进行人工审核 通过后将通过邮件通知你<br />你的信息 Email: <?=$visitor->email?> | UID: <?=$visitor->id?></span> </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
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
    var wumiiPermaLink = "http://aimozhen.com/video/<?= $video->id ?>/"; //请用代码生成文章永久的链接
    var wumiiTitle = "<?=$video->title?>"; //请用代码生成文章标题
    var wumiiTags = "<? echo preg_replace('/\s/',',',$video->tags);?>"; //请用代码生成文章标签，以英文逗号分隔，如："标签1,标签2"    
    var wumiiSitePrefix = "http://aimozhen.com/";
    var wumiiParams = "&num=6&mode=3&pf=JAVASCRIPT";
</script>
<script type="text/javascript" src="http://widget.wumii.com/ext/relatedItemsWidget"></script>


<?php
include '../view/base/footer.php';
?>
