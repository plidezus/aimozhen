<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "settings" ;
include '../../view/base/header.php';
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <?php include HTDOCS_DIR . "/view/home/sidebar.php"; ?>
      <!--左侧个人名片 -->
              <div class="span9"> 
     	修改头像（正在制作）
                
			  </div>
      </div>
    </div> <!-- /上方 -->
<?php
include '../../view/base/footer.php';
?>
