<?php
include "../include/init.php"; 
$pagename = "discover" ;$headname = "discover";
include '../view/base/header.php';
$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>

    <?php include HTDOCS_DIR . "/view/base/headerbar/page.php"; ?>
      <div class="row amzcontent">

			<?
			$video = new Video();
			$videos = $video->find(array('order' => 'RAND( )', 'limit' =>($page-1)* $page_size . ', ' . $page_size));
					foreach ($videos as $video) {
						$user = new User($video->userid);
			?>
                <?php include HTDOCS_DIR . "/view/base/post/single.php"; ?>
			<? } ?>

      </div>
        
		<div id="realpagination"  class="row amznavigation" style=" margin-top:50px;">
            <div class="amznext" style="text-align:center">
            <a href="/discover/">再换一批</a> </div>
 		</div>
        
    </div> <!-- /上方 -->


<?php

require_once '../view/base/footer.php';
?>
