<?php
include '../include/init.php';
	
$exists_user = new Register();
$exists_user->email = htmlentities($_POST['email'], 0, 'UTF-8');
	if ($exists_user->count()){
		header('LOCATION:/?re');
	} else {
		$register = new Register();
		$register->name = htmlentities($_POST['name'], 0, 'UTF-8');
		$register->email = htmlentities($_POST['email'], 0, 'UTF-8');
		$register->sex = htmlentities($_POST['sex'], 0, 'UTF-8');
		$register->reason = htmlentities($_POST['reason'], 0, 'UTF-8');
		$register->createdTime = time();
		$validate == md5(rand(10,100));
		$register->validate = $validate;
		$register->ip = htmlentities($_SERVER["REMOTE_ADDR"], 0, 'UTF-8');
		$register->save();
	
		$register = new Register();
		$registers = $register->find(array('email' => '123'));
		foreach ($registers as $register) {
			echo $register->id ;
		}

	
}