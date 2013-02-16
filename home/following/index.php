<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "following" ;
include '../../view/base/header.php';

if($visitor->first == 1)
	{
	$action = new Action();
	$action->userid = $visitor->id;
	$action->type = 1;
	$action->target = 423;
	$action->createdTime = time();
	$action->save();
	
	$action = new Action();
	$action->userid = $visitor->id;
	$action->type = 2;
	$action->target = 3 ;
	$action->createdTime = time();
	$action->save();
	
	$user = new User($visitor->id);
	$user->first = 0;
	$user->save();
		}


$action = new Action();
$action->type = Action::TYPE_LIKE_USER;
$action->userid = $visitor->id;
$user_ids = array_map(function($action){
	return $action->target;
}, $action->find());

$users = User::loads($user_ids);
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <?php include HTDOCS_DIR . "/view/home/sidebar.php"; ?>
      <!--左侧个人名片 -->
              <div class="span9"> 
     <ul class="thumbnails">
				<?
				foreach ($users as $user) {
					?>
                    <li class="span2">
                        <div class="thumbnail">
                            <a href="/user.php?id=<?=$user->id?>">
	                            <img src="<?=$user->avatar()->link(160)?>" style="width:100%;" />
                            </a>
	                        <span class="username"><?=$user->username?> </span>
                        </div>
                    </li>
					<?
				}
				?>
            </ul>
                
			  </div>
      </div>
    </div> <!-- /上方 -->
<?php
include '../../view/base/footer.php';
?>
