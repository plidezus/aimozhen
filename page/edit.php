<?php
include "../include/init.php";

$video = new Video($_GET['id']);
$user = new User($video->userid);
$tags = Tag::getAllPreTags();

if ($visitor->group == 9){
	$collections = new Collection();
	$collections-> userid = $visitor->id;
	$collections = $collections->find();
	}else {$collections = Collection::getAllCollections();}

if(($visitor->id != $video->userid) && ($visitor->group == 99)) {header("LOCATION:/?wrong");}
if(!$visitor->id) {header("LOCATION:/?wrong");}
include '../view/base/header.php';
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

      <form class="form-horizontal" action="/ajax/edit_video.php" method="POST">
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
						<select name="pre_tag" id="pre_tag" class="span1" style="width:110px" >
							<?php
								//主循环
								foreach ($tags as $each_tag) {
							 ?>
									  <option value=<?=$each_tag->id?> <? if($video->pre_tag==$each_tag->id){ ?> selected="selected" <? } ?>><?=$each_tag->name?></option> 

							<?  } ?>
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
               
               <span style="color: #7F7F7F; font-weight: bold;">认证用户专区</span>
               <div class="hr2"></div>
               
               <div class="control-group">
                        <label class="control-label2" for="input01">原创 </label>
                        <div class="controls2">
                        <label class="checkbox" style=" padding-top:5px">
                            <input id="verify" name="verify" type="checkbox" value="1" <? if ($video->verify == 1){ ?> checked="CHECKED" <? }?> onclick="hiden()" >
                              这部视频是否是你的原创作品？
                            </label>
                        </div>
                    </div>
               
               <div id="verifydiv" style="display:none">
                    <!-- <div class="control-group">
                        <label class="control-label2" for="input01">名片 </label>
                        <div class="controls2">
                        <label class="checkbox" style=" padding-top:5px">
                            <input id="card" name="card" type="checkbox" value="1" <? if ($video->card == 1){ ?> checked="CHECKED" <? }?> >
                              是否在此视频页面显示你的联系方式？
                            </label>
                        </div>
                    </div> -->
                    选中后你可以在“创作人”版块中找到这部视频！<br /><br />

                </div>
                
    <script type="text/javascript">
		$(document).ready(  function(){});
		function hiden(){
		var selectval = $("#checkbox_id").attr("checked");
		if (!!$("#verify").attr("checked")) {
			$("#verifydiv").show(500);
		}else{
			$("#verifydiv").hide(200); 
			}
		}
		$(function(){hiden();});

	</script>
				<? } ?>
                
               <!-- 精选区域 -->
               <? if($visitor->group < 99)  { ?> 
               
               <span style="color: #7F7F7F; font-weight: bold;">选辑专区</span>
               <div class="hr2"></div>
               
				<div class="control-group">
					<label class="control-label2" for="input01">选辑</label>
					<div class="controls2">
						<select name="collection" id="collection" class="span4" >
							<?php
								//主循环
								foreach ($collections as $each_collection) {
							 ?>
									  <option value=<?=$each_collection->id?> <? if($video->collection==$each_collection->id){ ?> selected="selected" <? } ?>><?=$each_collection->name?></option> 

							<?  } ?>
						</select>
					</div></div>
                    
               <div class="control-group">
					<label class="control-label2" for="input01">UID</label>
					<div class="controls2">
					  <input type="text" class="input span4" id="userid" name="userid" value="<?=$video->userid?>" >
					</div>
		  		</div>
                
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
                <div class="post-show"><img src="/images/seal.png" width="100" height="100" /></div>
                        <div class="playbutton"><span><a href="#" title="<?= $video->title ?>"><div style=" width:210px; height:160px;background: url('/images/play.png') no-repeat center center;">&nbsp;</div></a></span>
          <div class="img-rounded post-image" style="background: url('<?php if ($video->imageUrl==""){ echo '/images/noimage.jpg';}else{echo $video->imageUrl;} ?>') no-repeat center center;"></div> </div>
                        <div class="post-title"><a href="#"><span id="posttitle"><?= $video->title ?></span></a></div>
            			<div class="post-explain"><span id="postdes"><?php if($video->description==""){ ?>作品之美 胜于言表<? }else{ echo $video->description; } ?></span></div>
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
include '../view/base/footer.php';
?>
