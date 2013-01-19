<?php
include "include/init.php";
include 'view/base/header.php';
if (!$visitor->id) header("LOCATION:index.php");

$user_id = $_GET['id'];
$user = new User($user_id);

$video = new Video();
$video->userid = $user->id;;
$video_count = $video->count();
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <div class="span3"> 
        	<div class="shadow" style="padding:15px;">
                <div id="card-top" style="margin-bottom:65px">
                    <div id="avatar" class="float-left"><img src="<?=$user->avatar()->link(50)?>" width="50" height="50" /></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><?=$user->username?></div>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">分享了<?=$video_count?>部作品</div>
                    </div>    
                </div>
        		<div id="card-button">
                <a href="ajax/like.php?id=<?=$user->id?>" role="button" class="btn btn-block btn-red">关注 Ta</a>
      		</div>	

        </div></div>
      
      <!--左侧个人名片 -->
              <div class="span9"> 
     	<?
		$video = new Video();
		$video->userid = $user_id;
		$videos = $video->find(array('order' => 'id desc'));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
      <!-- 作品-->
		<?php include HTDOCS_DIR . "/view/base/post.php"; ?>
      <!-- /作品--> 
	<?
		}
	?>

			  </div>
      </div>
    </div> <!-- /上方 -->
<?php
include 'view/base/footer.php';
?>
