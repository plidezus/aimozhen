<?php
include "../include/init.php";$pagename = "tag";
include '../view/base/header.php';
$tag_id = $_GET['id'];
$tag = new Tag($tag_id);
$video_count = $tag->count;

$video = new Video();

$page_size = 23;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>
	<div style="text-align:center; width:100%; color:#AAA">共有 <?=$video_count?> 部视频作品被标记为 <?=$tag->name?></div>

<div class="container">
<div class="row"> <div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">标签分类</a> > <a href="#"><?=$tag->name?></a></div></div>
    
      <div class="row">
  <div class="span12" style="margin:0"> 
  <?php include HTDOCS_DIR . "/view/base/login.php"; ?>
     	<?
		$video = new Video();
		$video->pre_tag = $tag_id;
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
<a href="/tag/?id=<?=$tag_id?>&p=<?=$i?>"><span <? if(($i == $page)||(($i == 1)&&($page == 1))) { ?> class="btn btn-red disabled" <? } else { ?> class="btn btn-red" <? }?>><?=$i?></span></a>

<? }?>

        </p> </div>
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
