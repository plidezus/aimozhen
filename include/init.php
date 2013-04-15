<?php

$pagename = "index" ;$headname = "index" ;
$siteoption = new Siteoption(3);$siteurl = $siteoption->value ;
$siteoption = new Siteoption(4);$sitename = $siteoption->value ;
$siteoption = new Siteoption(5);$sitetitle = $siteoption->value ;
$siteoption = new Siteoption(6);$sitedescription = $siteoption->value ;
$siteoption = new Siteoption(7);$admin_email = $siteoption->value ;

session_start();
function __autoload($class) {
	$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
	$dir_array = array('lib', 'data');
	foreach ($dir_array as $each_dir) {
		$file_name = __DIR__ . "/../{$each_dir}/" . $class . '.php';
		if (is_file($file_name)) {
			require_once $file_name;
			break;
		}
	}
}
$visitor = Visitor::user();
define('HTDOCS_DIR', __DIR__ . '/..');
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT']);