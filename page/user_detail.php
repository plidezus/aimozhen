<?php
include "../include/init.php";$pagename = "user" ;

$user_id = $_GET['id'];
$user = new User($user_id);
include '../view/base/header.php';

$page_size = 33;
$url=explode("?p=",$_SERVER['REQUEST_URI']);
$page = isset($url[1]) ? intval($url[1]) : 1;
?>
<? $video_count = $user->post ; ?>
<div style="text-align:center; width:100%; color:#AAA">哟！TA 已经分享了 <?=$video_count?> 部视频
                    <? if ($user->exterweibo) {?>
                    <a href="<?=$user->exterweibo?>" target="_blank">去TA微博看看</a>	
                    <? };?>
</div>

<div class="container">
<div class="row"> <div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#"><?=$user->username?></a></div></div>

      <div class="row">
      <!--左侧个人名片 -->
        <div class="span3"> 
        	<div class="shadow" style="padding:10px;">
                <div id="card-top" style="margin-bottom:65px">
                    <div class="avatar"><img src="<?=$user->avatar()->link(50)?>" width="50" height="50" /></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                    <div id="name">
                    <? if ($user->verify==1) { ?>
                        	<div class="ellipsis float-left" style=" max-width:100px"><?=$user->username?></div>
                        	<i title="认证作者" class="icon2-yellowv float-left"></i>
                    <? } elseif ($user->verify==2) { ?>
                        	<div class="ellipsis float-left" style=" max-width:100px"><?=$user->username?></span></div>
                        	<i title="认证机构" class="icon2-bluev float-left"></i>
                    <? } else { ?>
                        	<div class="ellipsis float-left" style=" max-width:120px"><?=$user->username?></span></div>
                    <? } ?>   
                        </div>
                        
                        <? $days = abs(time() - $user->createdTime)/86400;?>
                        <div id="birday" style="color: #ABABAB; font-size: 12px;  margin-top:25px">已入住<?=floor($days)?>天</div>
                    </div>    
                </div>
        		<div id="card-button">
                <?php if (!$visitor->id){?>
        <a href="#login" role="button" data-toggle="modal" class="btn btn-red btn-block" >登录后可关注 TA</a>
        <?php }?>
                <?php if ($visitor->id){
		if (Action::isLiked($visitor, $user)) {?>
        <a href="/ajax/like.php?id=<?=$user->id?>&cancel=1" role="button" class="btn btn-inverse btn-block" >取消收藏</a>
		<? } else { ?>
        <a href="/ajax/like.php?id=<?=$user->id?>" role="button" class="btn btn-red btn-block" >关注 TA</a>
		<?php }}?>
      		</div>	

        </div>
        
        
        <? if(($visitor->id != $user->id)&&($visitor->group==1)) {  ?>
        <!--管理权限 -->

        <div class="shadow" style="padding:15px; margin-top:30px">
		<strong>用户组</strong>  <? if($user->group == 1){ echo "管理员" ; } elseif($user->group == 9){ echo "选辑编辑" ; } else { echo "普通镇民" ;}; ?><br />
		<strong>认证组</strong>  <? if($user->verify == 1){ echo "认证作者" ; } elseif($user->verify == 2) { echo "认证机构" ; } else { echo "普通镇民" ;}; ?><br />
		<strong>户籍组</strong>  <? if($user->guest == 0){ echo "在籍镇民" ; } else { echo "游客" ;}; ?>
        <p> </p>
			  <div class="btn-group">
              
                <a href="#" role="button" class="btn btn-inverse btn dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" style="width:153px">管理员无敌按钮 <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class="nav-header">用户组</li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=1">管理员权限</a></li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=2">选辑编辑权限</a></li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=9">普通镇民</a></li>
                  <li class="divider"></li>
                <li class="nav-header">认证组</li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=11">认证作者</a></li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=12">认证机构</a></li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=19">普通镇民</a></li>
                  <li class="divider"></li>
                <li class="nav-header">游客组</li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=91">在籍镇民</a></li>
                  <li><a href="/ajax/adminaction.php?id=<?=$user->id?>&type=99">游客</a></li>
                </ul>
              </div>
</div>

        <!--管理权限 -->
        <?  } ?>
        
        
        
        </div>
      
      <!--左侧个人名片 -->
      
              <div class="span9"> 
     	<?
		$video = new Video();
		$video->userid = $user_id;
		$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
      <!-- 作品-->
		<?php include HTDOCS_DIR . "/view/base/post.php"; ?>
      <!-- /作品--> 
	<?
		}
	?>

			  </div>
      </div>
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/user/".$user->id."/videos/?p=",2);
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
