<?php
class Action extends Mysql{
	const TYPE_FAV = 1;
	const TYPE_LIKE_USER = 2;

	public $userid;
	public $type;
	public $target;
	public $createdTime;

	public static function isFav($user, $video) {
		$finder = new self;
		$finder->type = self::TYPE_FAV;
		$finder->userid = $visitor->id;
		$finder->target = $video->id;
		return $finder->count() > 0 ;
	}
}

?>
