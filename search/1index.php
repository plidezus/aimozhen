<?php
include "../include/init.php";
include '../view/base/header.php';
$url=explode("?",$_SERVER['REQUEST_URI']);
$search_id= $url[1];

$video = new Video();

?>

<div class="container">
<div class="row"> <div class="span8 breadcrumb"> <a href="/">艾墨镇</a> > <a href="#">#</a></div></div>
    
      <div class="row">
  <div class="span12" style="margin:0"> 
     	<?
		$video = new Video();
		$video->title = $search_id;
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
      <div class="row"><p style="text-align: center">


        </p> </div>
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
