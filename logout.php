<?php
	include "include/init.php";
	unset($_SESSION['user_id']);
	echo "<script>window.location = '" . ($_SERVER['HTTP_REFERER'] ?: '/') . "?bye'</script>";
