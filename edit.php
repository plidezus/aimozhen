<?php
include "include/init.php";

$video = new Video($_GET['id']);
$user = new User($video->userid);
$tags = Tag::getAllPreTags();
if(($visitor->id != $video->userid) && ($visitor->group != 1)) header("LOCATION:/?wrong");
include 'view/base/header.php';
?>
    <div class="container" style="margin:0px auto 20px auto">
<div class="row"> <div class="span8 breadcrumb" style="margin-bottom:15px;"> <a href="/"><?=$sitename?></a> > <a href="#">编辑视频</a> > <a href="#"><?=$video->title?></a></div></div>

      <div class="row">
      <div class="span11 shadow" > 
      <div id="title" style="padding:20px;">
      	<span style="color: #2C2C2C; font-size: 18px; font-weight: bold;">还差一步</span><br />
      	<span style="color: #7F7F7F; font-weight: bold;">给镇民们介绍一下这部视频吧</span>
		<div class="hr2"></div>
	  </div>
      <!-- 编辑区域--> 
	  <div class="span6" style="margin-left:0;padding:0 0 0 20px;"> 

      <form class="form-horizontal" action="ajax/edit_video.php" method="POST">
				<input type="hidden" name="id" value="<?=$video->id?>" />
				<div class="control-group">
					<label class="control-label2" for="input01">标题</label>
					<div class="controls2">
						<input type="text" class="input span4" id="input01" name="title" placeholder="视频的名字" value="<?=$video->title?>" oninput="document.getElementById('posttitle').innerHTML=this.value;" onpropertychange="document.getElementById('posttitle').innerHTML=this.value;">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">标签</label>
					<div class="controls2">
						<select name="pre_tag" id="pre_tag" class="span1" style="width:110px" onChange="hiden()">
							<?php
								//主循环
								foreach ($tags as $each_tag) {
								if($each_tag->id == 99) { // 声明特殊项
								      if(!$visitor->verify == 0)  { ?>
									  <option value=<?=$each_tag->id?> <? if($video->pre_tag==$each_tag->id){ ?> selected="selected" <? } ?>><?=$each_tag->name?></option> 
								      <? } else { break; }
								} else {
							?>
								<option value=<?=$each_tag->id?> <? if($video->pre_tag==$each_tag->id){ ?> selected="selected" <? } ?>><?=$each_tag->name?></option>
							<? } ; } ?>
						</select>
					  <input type="text" class="input span3" id="input01" name="tags" style="width:243px" placeholder="用空格分开哦亲！" value="<?=$video->tags?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label2" for="input01">描述</label>
					<div class="controls2">
					  <textarea placeholder="只转不评的同志不是好同志。" class="span4" name="description" style="min-height:200px;max-width: 356px;"  oninput="document.getElementById('postdes').innerHTML=this.value;" onpropertychange="document.getElementById('postdes').innerHTML=this.value;"><?=$video->description?></textarea>
					</div>
				</div>
               
               <? if(!$visitor->verify == 0)  { ?>  
               
               <!-- 认证区域 -->
               <div id="verifydiv" style="display:none">
               <span style="color: #7F7F7F; font-weight: bold;">认证用户专区</span>
               <div class="hr2"></div>
                <div class="control-group">
					<label class="control-label2" for="input01">名片 </label>
					<div class="controls2">
                    <label class="checkbox" style=" padding-top:5px">
                        <input name="verify" type="checkbox" value="1" <? if ($video->verify == 1){ ?> checked="CHECKED" <? }?>>
                          是否在此视频页面显示你的联系方式？
                        </label>
					</div>
				</div>
                </div>
                
    <script type="text/javascript">
		$(document).ready(  function(){});
		function hiden(){
		var selectval = $('#pre_tag').val();
		if(selectval==99) {
			$("#verifydiv").show(500);
		}else{
			$("#verifydiv").hide(200); 
			}
		}
		$(function(){hiden();});

	</script>
				<? } ?>
                
               <!-- 管理区域 -->

               <? if($visitor->group == 1)  { ?> 
               
               <span style="color: #7F7F7F; font-weight: bold;">管理员专区</span>
               <div class="hr2"></div>
               
               <div class="control-group">
					<label class="control-label2" for="input01">浏览</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="viewed" name="viewed" value="<?=$video->viewed?>" >
					</div>
		  </div>
               <div class="control-group">
					<label class="control-label2" for="input01">地址</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="url" name="url" value="<?=$video->url?>" >
					</div>
		  </div>
                
                <? } ?>
                

				<div style="margin:10px 0 0 60px;">
					<input type="submit" class="btn btn-red" value="恩，就这样吧！" />
					
				</div>
		</form>
		</div>
		<!-- /编辑区域-->
		<!--右侧预览区 -->
                <div class="span3 shadow" style="height:332px;padding:10px; margin:-5px 0 0 50px">
                <div class="post-show"><img src="images/seal.png" width="100" height="100" /></div>
                        <div class="playbutton"><span><a href="#" title="<?= $video->title ?>"><div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;</div></a></span>
          <div class="img-rounded post-image" style="background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;"></div> </div>
                        <div class="post-title"><a href="#"><span id="posttitle"><?= $video->title ?></span></a></div>
            			<div class="post-explain"><span id="postdes"><?php if($video->description==""){ ?>这个ATer很懒，什么也没留下<? }else{ echo $video->description; } ?></span></div>
						<div class="post-infor">查看<?=intval($video->viewed)?>次 <span class="ds-thread-count" data-thread-key="<?= $video->id ?>"></span>评论</div>
                        <div class="hr1"></div>
                        <div class="post-author"  style=" margin-top:10px;">
                        <div id="avatar" class="float-left"><a href="#"><img src="<?=$user->avatar()->link(32)?>" width="32" height="32" /></a></div>
                    <div id="post-detailed" class="float-left" style="margin-left:10px">
                        <div id="post-author" style="color: #666666;font-size: 12px"><a href="#"><?=$user->username?></a>分享</div>
                    </div></div>
        </div>
      
		<!--右侧预览区 -->
      </div>
      
      </div>
    </div> <!-- /上方 -->
<?php
include 'view/base/footer.php';
?>
