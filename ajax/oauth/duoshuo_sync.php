<?php
/**
 * 同步多说
 */
include '../../include/init.php';

		$allid = DuoShuo::syncCommentContent(1);
		echo $allid;
		$duoshuoinfo = DuoShuo::syncCommentNum($allid);
	 	echo $duoshuoinfo;

?>