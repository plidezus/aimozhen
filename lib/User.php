<?php
class User extends Mysql{
	public $username;
	public $password;
	public $email;
	public $group;
	public $createdTime;
	public $verify;
	public $verifyinfo;
	public $exteremail;
	public $exterweibo;
	public $exterblog;
	public $validate;
	
	
	public function avatar() {
		return new Avatar($this->email);
	}
}

?>
