<?php
include "../include/init.php";
if (!$visitor->id) header("LOCATION:index.php");
include '../view/base/header.php';
$video = new Video();
$video->userid = $visitor->id;
$video_count = $video->count();
?>
<div class="container">
    <div class="row">
        <div class="span3">
            <div class="span3">
		        <?php include HTDOCS_DIR . "/view/my/sidebar.php"; ?>
            </div>
        </div>
        <div class="span9">
            <div style="text-align: right;line-height: 37px;margin-bottom: 10px;color:#999">

            </div>
            <ul class="thumbnails">
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
                    <li class="span3">
                        <div class="thumbnail">
                            <a href="/detail.php?id=<?=$video->id?>"><img src="<?=$video->imageUrl?>" style="width:100%;height:160px;" /></a>
                        </div>
                    </li>
					<?
				}
				?>
            </ul>
        </div>
    </div>
</div>
<?php
include '../view/base/footer.php';
?>
