<?php
include "../include/init.php"; 
$pagename = "verify" ;$headname = "discover";
include '../view/base/header.php';
$video = new Video();
$video->verify = 1;
$video_count = $video->count();

$page_size = 24;
$amzpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
if (isset($_GET['amzpage'])) { $page = $_GET['amzpage']; } else { $page = ($amzpage-1)*3+1 ;}
?>

    <?php include HTDOCS_DIR . "/view/base/headerbar/page.php"; ?>
      <div class="row amzcontent">
      
			<?
			$video = new Video();
			$video->verify = '1';
			$videos = $video->find(array('order' => 'id desc', 'limit' =>($page-1)* $page_size . ', ' . $page_size));
					foreach ($videos as $video) {
						$user = new User($video->userid);
			?>
                <?php include HTDOCS_DIR . "/view/base/post/single.php"; ?>
			<? } ?>
              

      </div>
        
		
		<div class="row amznavigation">
            <div class="amznext" style="text-align:center">
            <a href="/verify/?amzpage=<?=$page+1;?>">下一页</a> </div>
 		</div>
      
		<div id="realpagination" class="row" style=" margin-top:50px;display:none">
        <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
				$subPagess=new SubPages($page_size,($video_count/3),$amzpage,10,"/verify/?p=",2);  
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
    
    
<?php
require_once '../view/base/footer.php';
?>
