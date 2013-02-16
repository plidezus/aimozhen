<?php
class User extends Mysql{
	public $username;
	public $password;
	public $email;
	public $group;
	public $createdTime;
	public $first;

	public function avatar() {
		return new Avatar($this->email);
	}
}

?>
