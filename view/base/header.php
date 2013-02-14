<?php
$_video = new Video();
$video_count = $_video->count();
$_user = new User();
$user_count = $_user->count();
$tags = Tag::getAllPreTags();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title><?=$sitedesc?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="AnimeTaste">
<meta name="author" content="AnimeTaste">
<meta property="wb:webmaster" content="dbd6a845d21f945c" />

<!-- Le styles -->
<link href="/media/css/bootstrap.css" rel="stylesheet">
<link href="/media/css/bootstrap-responsive.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<link rel="shortcut icon" href="/assets/ico/favicon.ico">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<?php include BASE_PATH."/include/info.php";?>

</head>

  <body background="/images/web_bg.jpg">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
		<div class="container" style="padding-top:2px;">
     		<!-- 左侧菜单栏 -->
            <div style="float:left; margin:7px 0 0 0"><a href="/"><img src="/images/logo.png" /></a></div>
     		<ul class="nav nav-pills">
              <?php if ($pagename=="tag"){ echo '<li class="active dropdown">';}else{echo '<li class="dropdown">';} ?>
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">分类<b class="caret"></b></a>
                        <ul class="dropdown-menu">   
                        	<li><a href="/">全部视频<span style="float:right; color:#ABABAB">(<?=$video_count?>)</span></a></li>              
                        	<li class="divider"></li>
							<? foreach ($tags as $each_tag) { ?>
							<li><a href="/tag/?id=<?=$each_tag->id?>"><?=$each_tag->name?> <span style="float:right; color:#ABABAB">(<?=$each_tag->count?>)</span></a></li>
							<? } ?>
                        </ul>
              </li>
              <?php if ($pagename=="hot"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/">热榜</a></li>
            </ul>
            
			<ul class="nav nav-pills pull-right">
                <div class="nav-collapse collapse" style="float:right;margin:-1px 30px 0 5px;">
<form class="navbar-search pull-left" action="/ajax/search.php" method="POST">
                      <input type="text" class="search-query" id="search" name="search" placeholder="搜索 ^_^">
                    </form>
      </div>
				<div id="card-button" style="float:right; margin:-1px 5px 0 5px;">
                <!-- 分享 -->
					<? if ($visitor->id) { ?>
					<a href="#share" role="button" class="btn btn-block btn-red" style="height:30px;width:80px;" data-toggle="modal">分享视频</a> </div>
					<? } else { ?>
					<a href="#login" role="button" class="btn btn-block btn-red" style="height:30px;width:40px;" data-toggle="modal">登录</a></div>
					<? } ?>
                    
				<!-- 头像模块 -->
                    <? if ($visitor->id) { ?>
					<li class="dropdown" style="float:right;">
                    <a style="padding:5px 10px 5px 5px;" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#"><img width="24" height="24" style="" src="<?=$visitor->avatar()->link(24)?>"/>
                    <b class="caret"></b> </a>
                      <ul class="dropdown-menu">
                        <li class="nav-header"><?=$visitor->username?></li>
                        <li><a href="/home/videos/"><i class="icon-film"></i> 我的分享</a></li>
                        <li><a href="/home/likes/"><i class="icon-heart"></i> 我的收藏</a></li>
                        <li><a href="/home/following/"><i class="icon-star"></i> 关注的人</a></li>
                        <li><a href="/home/settings/"><i class="icon-cog"></i> 修改信息</a></li>
                        <li class="divider"></li>
                        <li class="nav-header">系统功能</li>
                        <li><a href="/logout.php"><i class="icon-off"></i> 登出</a></li>
                      </ul>
					</li>
					<? } ?>
                    
                    
			 </ul>
            <!-- /右侧模块 -->
		 </div><!--/总菜单 -->
      </div>
      <div style="background-image:url(/images/bgline.png); background-repeat:repeat-x; height:2px"></div>
    </div>