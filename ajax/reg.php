<?
$email = $_POST['email'];
	if ($email=="") { 
	header('LOCATION:/?noemail');
	} else {
	echo "<script>window.location = '/reg.php?email=" .$email. "&s=" .md5($email . 'check'). "'</script>";
	}