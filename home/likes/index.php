<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "likes" ;
include '../../view/base/header.php';

$video = new Video();
$video->userid = $visitor->id;
$video_count = $video->count();
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <?php include HTDOCS_DIR . "/view/home/sidebar.php"; ?>
      <!--左侧个人名片 -->
              <div class="span9"> 
     	<?
	            $action = new Action();
	            $action->userid = $visitor->id;
	            $action->type = Action::TYPE_FAV;
	            $favs = $action->find(array('limit' => 100));
				$video_loader = new Video();
	            $vids = array_map(function($action){return $action->target;}, $favs);
	            $videos = $video_loader->loads($vids);
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
