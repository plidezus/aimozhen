<?php
include "include/init.php";
if (isset($_GET['v'])) {
	if ($_GET['v'] == 'new') { $pagename = "new";$page_size = 24; }
	}else{ $pagename = "index";$page_size = 23; }
	
include 'view/base/header.php';
$page = isset($_GET['p']) ? intval($_GET['p']) : 1;
?>
<script type="text/javascript">
function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
}
</script>


    <div class="container" style="margin:0 auto">

    <?php include HTDOCS_DIR . "/view/base/headerbar.php"; ?>
    <div class="row">
  	<div class="span12" style="margin:0"> 

	<?php if ($pagename=="index"){ include HTDOCS_DIR . "/view/base/login.php"; } ?>
      <?
				$video = new Video();
				if (isset($_GET['v'])) {
					if (($_GET['v']) == 'new') {
					$videos = $video->find(array('order' => 'id desc', 'limit' => ($page-1) * $page_size . ', ' . $page_size));} 
				} else {
				$videos = $video->find(array('order' => 'RAND( )', 'limit' => ($page-1) * $page_size . ', ' . $page_size));
				}

				foreach ($videos as $video) {
					$user = new User($video->userid);
		?>
        <!-- 作品-->

        <? require 'view/base/post.php';?>

        <!-- /作品--> 
		<? }?>
		  </div>
      </div>
		<div class="row">
        <? if ($pagename == "new") { ?>
            <div class="pagination pagination-small pagination-centered">
                <?php require_once HTDOCS_DIR . "/include/page.php";
				$subPagess=new SubPages($page_size,$video_count,$page,10,"/?v=new&p=",2);  
                ?>
            </div>
         <? } else { ?>
         	<div style="text-align:center">
            <a href="#" onclick="MM_callJS('parent.location.reload(); ')">再换一批</a> </div>
         <? }?>

 		</div>
</div> <!-- /上方 -->
    
<?php
require_once 'view/base/footer.php';
?>