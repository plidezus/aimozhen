<?php
include "../include/init.php"; 
$pagename = "hot" ;$headname = "discover";
include '../view/base/header.php';
$page_size = 24;
$amzpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
if (isset($_GET['amzpage'])) { $page = $_GET['amzpage']; } else { $page = ($amzpage-1)*3+1 ;}
?>


    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row amzcontent">
      
              <div class="span12" style="margin:0"> 

			<?
			$video = new Video();
			$videos = $video->find(array('order' => '`viewed` desc, id desc', 'limit' =>($page-1)* $page_size . ', ' . $page_size));
					foreach ($videos as $video) {
						$user = new User($video->userid);
			?>
        <!-- 作品-->
                <?php include HTDOCS_DIR . "/view/base/post.php"; ?>
        <!-- /作品--> 
			<? } ?>
              

			  </div>
      </div>
        
		<div class="row amznavigation">
            <div class="amznext" style="text-align:center">
            <a href="/hot/?amzpage=<?=$page+1;?>">下一页</a> </div>
 		</div>
      
		<div id="realpagination" class="row" style=" margin-top:50px;display:none">
        <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
				$subPagess=new SubPages($page_size,($video_count/3),$amzpage,10,"/hot/?p=",2);  
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
    
    
<?php
require_once '../view/base/footer.php';
?>
