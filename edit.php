<?php
include "include/init.php";
include 'view/base/header.php';
$video = new Video($_GET['id']);
$user = new User($video->userid);
?>
<div class="container">
	<div class="row">
<div class="span3"> 
        	<div class="shadow" style="padding:15px;">
                <div id="card-top" style="margin-bottom:50px">
                    <div id="avatar" class="float-left"><a href="<?=$visitor->avatar()->editLink()?>"><img src="<?=$visitor->avatar()->link(50)?>" width="50" height="50" /></a></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><?=$visitor->username?></div>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">2010年11月08日加入</div>
                    </div>    
                </div>
      		</div>	
        	<div id="my-list" style="margin-top:30px">
            <ul class="nav nav-list">
				<li class="active"><a href="#"><i class="icon-home icon-white"></i>发布作品</a></li>
                <li><a href="/my/"><i class="icon-home icon-white"></i>我的分享</a></li>
				<li><a href="/my/like.php"><i class="icon-book"></i>喜欢的人</a></li>
				<li><a href="/my/fav.php"><i class="icon-pencil"></i>好片收藏</a></li>
                <li><a href="/logout.php"><i class="icon-pencil"></i>登出</a></li>
			</ul>
            </div>
        </div>
		<div class="span9">
			<div class="alert alert-success">
				<h3 class="alert-heading">最后一步 <span style="font-size: 12px">(2/3)</span></h3>
				<p>您只需要再填写一下介绍信息就可以与镇民们分享这部视频了！</p>
			</div>
			<form class="form-horizontal" action="ajax/edit_video.php" method="POST">
				<input type="hidden" name="id" value="<?=$video->id?>" />
				<div class="control-group">
					<label class="control-label" for="input01">标题：</label>
					<div class="controls">
						<input type="text" class="input span4" id="input01" name="title" placeholder="视频的名字" value="<?=$video->title?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">标签：</label>
					<div class="controls">
						<input type="text" class="input span4" id="input01" name="tags" placeholder="用空格分开哦亲！" value="<?=$video->tags?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">说点什么吧：</label>
					<div class="controls">
						<textarea placeholder="只转不评的同志不是好同志。" class="span4" name="description"><?=$video->description?></textarea>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-red" value="恩，就这样吧！" />
					
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
