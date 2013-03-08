<?php

$to = "fuxiaopang@msn.com";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "admin@aimozhen.com";
$headers = "From: $from";
mail($to,$subject,$message,$headers);
echo "Mail Sent.";

?>