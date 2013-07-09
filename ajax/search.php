<?php
include '../include/init.php';

$search = $_POST['search'];
header('LOCATION:/search/?s=' . urldecode($search) );