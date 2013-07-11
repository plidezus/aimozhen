<?php
include "../include/init.php"; 
$pagename = "discover" ;$headname = "discover";
include '../view/base/header.php';
$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>

    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row amzcontent">
            
              <div class="span12" style="margin:0"> 

			<?
			$video = new Video();
			$videos = $video->find(array('order' => 'RAND( )', 'limit' =>($page-1)* $page_size . ', ' . $page_size));
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
            <a href="/discovert/">再换一批</a> </div>
 		</div>
        
    </div> <!-- /上方 -->
    
    <script type="text/javascript">
        $(document).ready(function() {
            jQuery.ias({
                container : '.amzcontent',
                item: '.amzvideo',
                pagination: '.amznavigation',
                next: '.amznext a',
				loaderDelay: 1500 ,
				triggerPageThreshold: 2 ,
				trigger: '<div class="row"><div style="text-align:center"><a href="#">再换一批</a> </div></div>',
                loader: '<img style="margin-left:30px" src="http://static.xiangqu.com/res1/images/core/loading_xq.gif"/>',
            });
        });
    </script>


<?php

require_once '../view/base/footer.php';
?>
