<?php
	if (empty($_GET['email'])) {
		die('请填写Email哦！');
	}
?>
<input style="width:90%;"
       value="http://www.aimozhen.com/reg.php?email=<?=$_GET['email']?>&s=<?=md5($_GET['email'] . 'check')?>" />

