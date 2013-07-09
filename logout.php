<?php
	include "include/init.php";
	unset($_SESSION['user_id']);
Cookie::delete('__u');
Cookie::delete('__c');
Cookie::delete('duoshuo_token');
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "?bye'</script>";

