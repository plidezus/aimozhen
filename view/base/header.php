<?php
$_video = new Video();
$video_count = $_video->count();
$_user = new User();
$user_count = $_user->count();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>艾墨镇，ATer的小村子</title>
    <link href="/media/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/media/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <style>body {
        padding-top: 60px;
    }</style>
    <script src="/media/js/jquery-1.7.2.min.js"></script>
    <script src="/media/js/bootstrap.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">艾墨镇</a>

            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="/index.php">首页</a></li>
                    <li><a href="/hot.php">热门</a></li>
					<? if ($visitor->id) { ?>
                    <li><a data-toggle="modal" data-title="lala" href="#share">分享</a></li>
					<? } else { ?>
                    <li><a data-toggle="modal" data-title="lala" href="#login">登录</a></li>
					<? } ?>
                </ul>
                <span style="float: right;line-height: 3"><?=$user_count?>位镇民，<?=$video_count?>部视频</span>
				<? if ($visitor->id) { ?>
                <span style="float: right;line-height: 3;padding-right: 10px;">欢迎回来，
	                <a href="<?=$visitor->avatar()->editLink()?>"><img src="<?=$visitor->avatar()->link(24)?>"/></a>
	                <a href="/my/"><?=$visitor->username?></a>
                </span>
				<? } ?>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>