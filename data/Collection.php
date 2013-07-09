<?php

//lianghonghao@baixing.com 

class Collection extends Mysql{

	public $name;

	public $count;
	
	public $userid;
	
	public $thumbid;
	
	public $UpdateTime;

	public $pre;



	public static function getAllCollections($opt = array()){

		$loader = new self();

		return $loader->find($opt);

	}

}

