<?php
include "../../include/init.php";
$pagename = "share" ;

$user_id = $_GET['id'];
$user = new User($user_id);
include '../../view/base/header.php';

$page_size = 24;
$url=explode("?p=",$_SERVER['REQUEST_URI']);
$page = isset($url[1]) ? intval($url[1]) : 1;

if($visitor->id != $user_id) {$user->viewed += 1;$user->save();}
$video_count = $user->post - $user->postOriginal ; ?>


<div class="container">

  <?php include HTDOCS_DIR . "/view/base/headerbar/user.php"; ?>
  <div class="row">
      
   	<?
		$video = new Video();
		$video->userid = $user_id;
		$video->verify = 0;
		$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
		if ($video->count()) {
			foreach ($videos as $video) {
				$user = new User($video->userid);
				include HTDOCS_DIR . "/view/base/post/single.php"; 
			}
		} else { 	
	?>
		
        <div class="row" style=" margin:30px 0 100px 0;text-align: center">
            <p style="color: #2D2D2D; font-weight: bold; font-size: 18px;">还木有作品</p>
            <p><?=$user->username?>还木有分享作品<br />
                <br />
            </p>
        </div>

	<? } ?>

      </div>
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/user/".$user->id."/?p=",2);
                ?>
            </div>
 		</div>
        
</div> <!-- /上方 -->


<?php
include '../../view/base/footer.php';
?>
