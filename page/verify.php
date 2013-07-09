<?php
include "../include/init.php"; 
$pagename = "verify" ;$headname = "discover";
include '../view/base/header.php';
$video = new Video();
$video->verify = 1;
$video_count = $video->count();

$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>

    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row">
      
              <div class="span12" style="margin:0"> 

			<?
			$video = new Video();
			$video->verify = '1';
			$videos = $video->find(array('order' => 'id desc', 'limit' =>($page-1)* $page_size . ', ' . $page_size));
					foreach ($videos as $video) {
						$user = new User($video->userid);
			?>
        <!-- 作品-->
                <? require '../view/base/post.php';?>
        <!-- /作品--> 
			<? } ?>
              

			  </div>
      </div>
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/verify/?p=",2);
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
    
<?php
require_once '../view/base/footer.php';
?>
