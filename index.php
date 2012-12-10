<?php
include "include/init.php";
include 'view/base/header.php';
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <ul class="thumbnails">
				<? if (!$visitor->id) { ?>
                <li class="span3">
                    <div class="thumbnail">
                        <div style="padding:11px;">
                            <p>欢迎您来到艾墨镇，如果您是第一次来到这里，我建议您随意逛逛。</p>

                            <p>如果您开始喜欢这里，那或许您更愿意<a>住在这里</a>。</p>

                            <p>如果您已经在这里安家，欢迎您<a data-toggle="modal" data-title="lala" href="#login">回来</a>。</p>
                        </div>
                    </div>
                </li>
				<? } ?>
				<?
				$video = new Video();
				$videos = $video->find(array('order' => 'id desc'));

				foreach ($videos as $video) {
					$user = new User($video->userid);
					?>
                    <li class="span3">
                        <div class="thumbnail">
                            <a href="detail.php?id=<?= $video->id ?>"><img src="<?= $video->imageUrl ?>"
                                                                           style="width:100%;height:160px;"/></a>
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
include 'view/base/footer.php';
?>
