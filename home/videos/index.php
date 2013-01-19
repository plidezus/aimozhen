<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "videos" ;
include '../../view/base/header.php';
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
		$videos = $video->find(array('order' => 'id desc'));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
      <!-- 作品-->
		<?php include HTDOCS_DIR . "/view/base/post.php"; ?>
      <!-- /作品--> 
      	<? } ?>
                
			  </div>
      </div>
    </div> <!-- /上方 -->
<?php
include '../../view/base/footer.php';
?>
