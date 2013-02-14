<?php
include "include/init.php";
include 'view/base/header.php';
if (!$visitor->id) header("LOCATION:/?login");

$user_id = $_GET['id'];
$user = new User($user_id);

$video = new Video();
$video->userid = $user->id;;
$video_count = $video->count();

$page_size = 33;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>
<div style="text-align:center; width:100%; color:#AAA">哟！你已经分享了 <?=$video_count?> 部视频作品！</div>

<div class="container">
<div class="row"> <div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">用户</a> > <a href="#"><?=$user->username?></a></div></div>

      <div class="row">
      <!--左侧个人名片 -->
        <div class="span3"> 
        	<div class="shadow" style="padding:15px;">
                <div id="card-top" style="margin-bottom:65px">
                    <div id="avatar" class="float-left"><img src="<?=$user->avatar()->link(50)?>" width="50" height="50" /></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><?=$user->username?></div>
                        <? $days = abs(time() - $user->createdTime)/86400;?>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">已入住<?=floor($days)?>天</div>
                    </div>    
                </div>
        		<div id="card-button">
                <a href="ajax/like.php?id=<?=$user->id?>" role="button" class="btn btn-block btn-red">关注 Ta</a>
      		</div>	

        </div></div>
      
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
      <div class="row"><p style="text-align: center">

<? for ($i=1; $i<=ceil($video_count / $page_size); $i++) { ?>
<a href="/user.php?id=<?=$user->id?>&p=<?=$i?>"><span <? if(($i == $page)||(($i == 1)&&($page == 1))) { ?> class="btn btn-red disabled" <? } else { ?> class="btn btn-red" <? }?>><?=$i?></span></a>

<? }?>

        </p> </div>
    </div> <!-- /上方 -->
<?php
include 'view/base/footer.php';
?>
