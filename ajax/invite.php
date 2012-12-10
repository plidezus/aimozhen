<?php
	if (empty($_GET['email'])) {
		die('请填写Email哦！');
	}
?>
<textarea style="width:90%;height:8em;">
	这是一段由于偷懒而没有完成的文字!_!，点下面的链接就能加入艾默镇哦~
	<a href="http://www.aimozhen.com/reg.php?email=<?=$_GET['email']?>&s=<?=md5($_GET['email'] . 'check')?>">http://www.aimozhen.com/reg.php?email=<?=$_GET['email']?>&s=<?=md5($_GET['email'] . 'check')?></a>
</textarea>
