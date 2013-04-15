<?php
//lianghonghao@baixing.com 
class Tag extends Mysql{
	public $name;
	public $count;
	public $pre;

	public static function getAllPreTags($opt = array()){
		$loader = new self();
		return $loader->find($opt);
	}
}
