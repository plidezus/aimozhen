<?php
include "../include/init.php";
$pagename = "tag";$headname = "discover";
include '../view/base/header.php';
$tag_id = $_GET['id'];
$tag = new Tag($tag_id);
$video_count = $tag->count;

$video = new Video();

$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>


    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row">
      
<div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">标签</a> > <a href="#"><?=$tag->name?></a></div></div>
    
      <div class="row">
  <div class="span12" style="margin:0"> 
  
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
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/tag/id".$tag_id."-",2);
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
