<?php
include "../include/init.php";$pagename = "tag";
include '../view/base/header.php';
$page_size = 23;
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
$search = urldecode($_GET['s']);
$video = new Video();
$video_count = $video->count(array('search' => $search));


?>
 <div class="container">
	<div style="text-align:center; width:100%; color:#AAA">共有 <?=$video_count; ?> 个视频标题含有 “<?=$search; ?>”</div>

	<div class="row"> 
    	<div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">搜索结果</a> > <a href="#"><?=$search; ?></a></div>
	</div>
    
	<div class="row">
	  <?php include HTDOCS_DIR . "/view/base/login.php"; ?>
          <?
                    $video = new Video();
                    $videos = $video->find(array('order' => 'id desc', 'search' => $search , 'limit' => ($page-1) * $page_size . ', ' . $page_size));
    
                    foreach ($videos as $video) {
                        $user = new User($video->userid);
            ?>
            <?php include HTDOCS_DIR . "/view/base/post/single.php"; ?>
        <?
            }
        ?>
	</div>
        
	<div class="row">
		<div class="pagination pagination-small pagination-centered">
			<?php require_once HTDOCS_DIR . "/include/page.php";;
                $subPagess=new SubPages($page_size,$video_count,$page,10,"/search/?s=".$search."&p=",2);
            ?>
		</div>
	</div>
        
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
