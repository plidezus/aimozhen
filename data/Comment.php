<?php

class Comment extends Mysql{

	public $userid;

	public $videoid;

	public $comment;

	public $createdTime;
	
	public $duoshuoId;

	

	public function user() {

		return new User($this->userid);

	}

	

}



?>

