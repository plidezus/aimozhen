<?php

include "./include/init.php";



var_dump(Config::get('env.mysql.user'), Config::get('env.mysql.password'));

var_dump(new Video(123));

$duoshuoinfo= DuoShuo::syncUser($visitor->id);
					var_dump ($duoshuoinfo);