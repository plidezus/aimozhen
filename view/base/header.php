<?php
if (($pagename != "detail")) {
$_video = new Video();
$video_count = $_video->count();}

$tags = Tag::getAllPreTags();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns:wb=“http://open.weibo.com/wb”>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<head>
<link rel="shortcut icon" href="favicon.ico"/>
<meta charset="utf-8">
<? if($pagename == "detail") {$sitetitle = $video->title . " | " . $sitetitle ;$sitedescription = $sitedescription . " | " . str_replace("\n","",$video->description) ; } ?>
<? if($pagename == "user") ($sitetitle = $user->username . " | " . $sitetitle) ?>
<title><?=$sitetitle?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$sitedescription?>">
<meta name="author" content="艾墨镇,aimozhen">
<meta name="keywords" content="aimozhen,艾墨镇,动画,animetaste,独立动画,视频,微电影,V电影,短片,原创,animation,动漫" />
<meta property="wb:webmaster" content="dbd6a845d21f945c" />
<link rel="shortcut icon" href="/favicon.ico">
<!-- CSS -->
<link href="/media/css/bootstrap.min.css?t=20130724" rel="stylesheet">
<link href="/media/css/bootstrap-responsive.min.css?t=20130724" rel="stylesheet">
<link href="http://amzstatic.b0.upaiyun.com/media/css/bootstrap-editable.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link href="/media/css/bootstrap-ie.css" rel="stylesheet">
<![endif]-->

<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=2517727821" type="text/javascript" charset="utf-8"></script>

</head>

  <body background="/images/web_bg.jpg" style="background-size:70px ">

    <div class="navbar navbar-inverse navbar-fixed-top" style="box-shadow: 0px 1px 3px #b2b2b2 ;">
      <div class="navbar-inner">
		<div class="container" style="padding-top:2px;">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
     		<!-- 左侧菜单栏 -->
            <div style="float:left; margin:7px 10px 0 0;width:103px;height:23px;}"><a href="/"><img src="/images/logo@2x.png" /></a></div>
            <div class="nav-collapse collapse">
     		<ul class="nav ">
              <?php if ($headname=="discover"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/">发现</a></li>
              <?php if ($pagename=="collection"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/collection/">精彩选辑</a></li>
              <?php if ($pagename=="issue"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/page/issue/">反馈</a></li>
              <li ><a href="http://animetaste.org/" target="_blank">AT!</a></li>
              </ul>

            
			<ul class="nav nav-pills pull-right">
            	<!-- 头像模块 -->
				<? if (!$visitor->id) { ?>
                <li><a href="#reg" data-toggle="modal">注册</a></li>
                <li><a href="#login" data-toggle="modal">登录</a></li>
                <? } else { ?>
				<li class="dropdown" >
                    <a style="padding:5px 10px 5px 5px;" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" href="#"><img style="width:24px; height:24px" src="<?=$visitor->avatar()->link(24)?>" />
                    <b class="caret"></b> </a>
                      <ul class="dropdown-menu">
                        <li class="nav-header"><?=$visitor->username?></li>
                        <li><a href="/home/videos/"><i class="icon-film"></i> 我分享的</a></li>
                        <li><a href="/home/likes/"><i class="icon-heart"></i> 我收藏的</a></li>
                        <li><a href="/home/following/"><i class="icon-star"></i> 我关注的</a></li>
                        <li><a data-toggle="modal" href="#invite"><i class="icon-gift"></i> 邀请朋友</a></li>
                        <li><a href="/home/settings/"><i class="icon-cog"></i> 修改资料</a></li>
                        <li><a href="/logout.php"><i class="icon-off"></i> 退出</a></li>
                      </ul>
				</li>
				<? } ?>
                
                <!-- 搜索 -->
				<li style="margin:0 15px 0 10px;">
					<form class="navbar-search pull-left" action="/ajax/search.php" method="POST">
						<input type="text" class="search-query" id="search" name="search" placeholder="Search...">
                    </form>
				</li>
                
                <!-- 分享 -->
                <li style="margin:-1px 17px 0 0;">
					<? if ($visitor->id) { ?>
                    <button href="#share" class="btn btn-red" type="button" data-toggle="modal">✚ 分享视频</button>
					<? } else { ?>
                    <button href="#login" class="btn btn-red" type="button" data-toggle="modal">✚ 分享视频</button>
					<? } ?>
                </li>   
                    
			 </ul>
             
             </div>
		 </div><!--/总菜单 -->
      </div>
      <div style="background-image:url(/images/bgline.png); background-repeat:repeat-x; height:2px"></div>
    </div>