<?php
include "../include/init.php"; 
if (!$visitor->id) header("LOCATION:/");

$pagename = "follow" ;$headname = "discover";
include '../view/base/header.php';
$page_size = 24;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;

$action = new Action();
$action->type = Action::TYPE_LIKE_USER;
$action->userid = $visitor->id;
$user_ids = array_map(function($action){return $action->target;}, $action->find());
$users = join(',', $user_ids);

$video = new Video();
$video_count = $video->count(array('multiuser' => $users));

?>


    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row">
      
              <div class="span12" style="margin:0"> 

			<?
            $video = new Video();
            $videos = $video->find(array('order' => 'id desc','multiuser' => $users, 'limit' => ($page-1) * $page_size . ', ' . $page_size));
            foreach ($videos as $video) {
                $user = new User($video->userid);
        ?>
        <!-- 作品-->
                <? require HTDOCS_DIR . '/view/base/post.php';?>
        <!-- /作品--> 
			<? } ?>
              

			  </div>
      </div>
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,$video_count,$page,10,"/hot/?p=",2);
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
    
<?php
require_once '../view/base/footer.php';
?>
