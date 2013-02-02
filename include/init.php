<?php

$pagename = "index" ;
session_start();
function __autoload($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	require_once __DIR__ . '/../lib/' . $class . '.php';
}
$visitor = Visitor::user();
define('HTDOCS_DIR', __DIR__ . '/..');
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);