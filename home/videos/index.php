<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "videos" ;
include '../../view/base/header.php';

	$video = new Video();
	$video->userid = $visitor->id;
	$videos = $video->find();
	$video_count = count($videos);

$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <?php include HTDOCS_DIR . "/view/home/sidebar.php"; ?>
      <!--左侧个人名片 -->
              <div class="span9"> 
     	<?
		$video = new Video();
		$video->userid = $visitor->id;
		$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
      <!-- 作品-->
		<?php include HTDOCS_DIR . "/view/base/post.php"; ?>
      <!-- /作品--> 
      	<? } ?>
                
			  </div>
      </div>
      
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/home/videos/?p=",2);
                ?>
            </div>
 		</div>
      
    </div> <!-- /上方 -->
<?php
include '../../view/base/footer.php';
?>
