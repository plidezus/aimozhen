<?php
include "../include/init.php";
$pagename = "collection";
include '../view/base/header.php';

$video = new Video();

$page_size = 24;
$url=explode("?p=",$_SERVER['REQUEST_URI']);
$page = isset($url[1]) ? intval($url[1]) : 1;
?>


    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
      <div class="row">
      
<div class="span8 breadcrumb"> <a href="/"><?=$sitename?></a> > <a href="#">选辑</a> </div></div>
    
      <div class="row">
  <div class="span12" style="margin:0"> 
  
     	<?
		$collection = new Collection();
		$collections = $collection->find(array('order' => '`UpdateTime` desc, id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
		foreach ($collections as $collection) {
			$user = new User($collection->userid);
	?>
      <!-- 作品-->
		<?php if ($collection->id != 1) { include HTDOCS_DIR . "/view/base/post_collection.php"; }?>
      <!-- /作品--> 
	<?
		}
	?>
		  </div>
      </div>
        
		<div class="row">
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";;
                    $subPagess=new SubPages($page_size,10,$page,10,"/collection/?p=",2);
                ?>
            </div>
 		</div>
        
    </div> <!-- /上方 -->
<?php
include '../view/base/footer.php';
?>
