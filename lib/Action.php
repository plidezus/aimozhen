<?php
class Action extends Mysql{
	const TYPE_FAV = 1;
	const TYPE_LIKE_USER = 2;

	public $userid;
	public $type;
	public $target;
	public $createdTime;

}

?>
