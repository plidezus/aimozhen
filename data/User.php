<?php
class User extends Mysql{
	public $username;
	public $password;
	public $email;
	public $group;
	public $createdTime;
	public $verify;
	public $exteremail;
	public $exterweibo;
	public $exterblog;
	public $location;
	public $career;
	public $aboutme;
	public $validate;
	public $weiboId;
	public $duoshuoId;
	public $guest;
	public $post;
	public $postOriginal;
	public $fav;
	public $like;
	public $viewed;
	
	
	public function avatar() {
		if ($this->weiboId) {
			return new WeiboAvatar($this->weiboId);
		} else {
			return new Avatar($this->email);
		}
	}

	public function weibo() {
		if ($this->weiboId) {
			return new Weibo($this->weiboId);
		} else {
			return false;
		}
	}
}

class Weibo {
	public $id;
}

class WeiboAvatar {
	private $id;
	public function __construct($id) {
		$this->id = $id;
	}
	public function link() {
		return "http://tp1.sinaimg.cn/{$this->id}/180/0/1";
	}

	public function editLink() {
		return "javascript:alert('这个就是微博头像……');";
	}
}