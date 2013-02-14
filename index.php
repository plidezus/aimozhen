<?php
include "include/init.php";
include 'view/base/header.php';
$page_size = 23;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>
	<div style="text-align:center; width:100%; color:#AAA"><?=$sitename?>共有 <?=$video_count?> 部视频作品与您分享</div>
    <div class="container" style="margin:20px auto 20px auto">
    
      <div class="row">
  <div class="span12" style="margin:0"> 

	<?php include HTDOCS_DIR . "/view/base/login.php"; ?>
      <?
				$video = new Video();
				$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));

				foreach ($videos as $video) {
					$user = new User($video->userid);
		?>
        <!-- 作品-->

        <? require 'view/base/post.php';?>

        <!-- /作品--> 
		<? }?>
		  </div>
      </div>
      <div class="row"><p style="text-align: center">

<? for ($i=1; $i<=ceil($video_count / $page_size); $i++) {?>
<a href="?p=<?=$i?>"><span <? if(($i == $page)||(($i == 1)&&($page == 1))) { ?> class="btn btn-red disabled" <? } else { ?> class="btn btn-red" <? }?>><?=$i?></span></a> 
<? }?>

        </p> </div>
    </div> <!-- /上方 -->
    
<?php
require_once 'view/base/footer.php';
?>