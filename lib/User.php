<?php
class User extends Mysql{
	public $username;
	public $password;
	public $email;
	public $group;

	public function avatar() {
		return new Avatar($this->email);
	}
}

?>
