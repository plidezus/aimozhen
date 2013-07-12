<?php
include "include/init.php";
$pagename = "index";$headname = "discover";
include 'view/base/header.php';
$amzpage = isset($_GET['p']) ? intval($_GET['p']) : 1;
if (isset($_GET['amzpage'])) { $page = $_GET['amzpage']; } else { $page = ($amzpage-1)*3+1 ;}
$page_size = 23;
?>

    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row amzcontent">
      
              <div class="span12" style="margin:0"> 

      <?
				$video = new Video();
				$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));

				$videonum = 0;
				foreach ($videos as $video) {
					$videonum = $videonum + 1 ;
					$user = new User($video->userid);
		?>
        <!-- 作品-->

        <? if ($videonum == 3) { require "view/base/post.php";?>
		<!-- 新用户-->
        ﻿<div class="span3 shadow amzvideo" style="height:318px; padding:10px; margin-bottom:20px;">
          <span style="font-size: 14px; color: #2A2A2A; font-weight: bold;">新入创作者:</span>
			<div style="margin:10px -10px 15px -10px;" class="hr1"></div>	
            
          <? 	$user = new User();
		  		$user->verify = "1" ;
				$users = $user->find(array('order' => 'id desc', 'limit' => '0, 4'));
		   		foreach ($users as $user) {  
		   		require "view/base/user.php";}
		  ?>
            

        </div>
        <!-- /新用户-->
        <? } else { require "view/base/post.php"; }
		;?>

        <!-- /作品--> 
		<? }?>
		  </div>
      </div>
      
      
		<div class="row amznavigation">
            <div class="amznext" style="text-align:center">
            <a href="/?amzpage=<?=$page+1;?>">下一页</a> </div>
 		</div>
      
		<div id="realpagination" class="row" style=" margin-top:50px;display:none">
        <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
				$subPagess=new SubPages($page_size,($video_count/3),$amzpage,10,"/",2);  
                ?>
            </div>
 		</div>

</div> <!-- /上方 -->

    
<?php
require_once 'view/base/footer.php';
?>