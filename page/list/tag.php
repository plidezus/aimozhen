<?php
include "../../include/init.php";
$pagename = "tag";$headname = "discover";
include '../../view/base/header.php';
$tag_id = $_GET['id'];
$tag = new Tag($tag_id);
$video_count = $tag->count;

$video = new Video();

$page_size = 24;
$url=explode("?p=",$_SERVER['REQUEST_URI']);$page = isset($url[1]) ? intval($url[1]) : 1;
$url2=explode("?amzpage=",$_SERVER['REQUEST_URI']);$page = isset($url[1]) ? intval($url[1]) : 1;
$amzpage = isset($url[1]) ? intval($url[1]) : 1;
if (isset($url2[1])) { $page = $url2[1]; } else { $page = ($amzpage-1)*3+1 ;}
?>


    <?php include HTDOCS_DIR . "/view/base/headerbar/page.php"; ?>
	<div class="row">
		<div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">标签</a> > <a href="#"><?=$tag->name?></a></div>
	</div>
    
	<div class="row amzcontent">
  
     	<?
		$video = new Video();
		$video->pre_tag = $tag_id;
		$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
		foreach ($videos as $video) {
			$user = new User($video->userid);
	?>
		<?php include HTDOCS_DIR . "/view/base/post/single.php"; ?>
	<?
		}
	?>

	</div>
        
		<div class="row amznavigation">
            <div class="amznext" style="text-align:center">
            <a href="/tag/<?=$tag_id?>/?amzpage=<?=$page+1;?>">下一页</a> </div>
 		</div>
      
		<div id="realpagination" class="row" style=" margin-top:50px;display:none">
        <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
				$subPagess=new SubPages($page_size,($video_count/3),$amzpage,10,"/tag/".$tag_id."/?p=",2);  
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
    

<?php
include '../../view/base/footer.php';
?>
