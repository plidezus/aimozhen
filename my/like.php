<?php
include "../include/init.php";
if (!$visitor->id) header("LOCATION:index.php");

include '../view/base/header.php';

$action = new Action();
$action->type = Action::TYPE_LIKE_USER;
$action->userid = $visitor->id;
$user_ids = array_map(function($action){
	return $action->target;
}, $action->find());

$users = User::loads($user_ids);
?>
<div class="container">
    <div class="row">
        <div class="span3">
			<?php include HTDOCS_DIR . "/view/my/sidebar.php"; ?>
        </div>
        <div class="span9">
            <div style="text-align: right;line-height: 37px;margin-bottom: 10px;color:#999">

            </div>
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
</div>
<?php
include '../view/base/footer.php';
?>
