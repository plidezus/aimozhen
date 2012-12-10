<ul class="well nav nav-list" id="my-sidebar">
    <li class="nav-header">
        <a href="<?=$visitor->avatar()->editLink()?>">
            <img src="<?=$visitor->avatar()->link(238)?>" width="238" height="238"/>
        </a>
    </li>
    <li><a data-toggle="modal" href="#invite">邀请入住</a></li>
    <li><a href="/my/">我的分享</a></li>
    <li><a href="/my/like.php">喜欢的人</a></li>
    <li><a href="/my/fav.php">好片收藏</a></li>
    <li><a href="/my/comment.php" title="我的评论">闲言碎语</a></li>
    <li><a href="/logout.php">登出</a></li>
</ul>
<div id="invite" class="modal hide fade">
    <h4 class="modal-header">邀请朋友</h4>
    <div class="modal-body">
        <form class="form">
            <input class="span4" type="email" id="email_input" placeholder="如果你喜欢这里，写下他/她的Email，把他/她拉来陪你吧。"/><br />
            <a id="get_invite" href="###" class="btn btn-primary">获取邀请信</a>
        </form>
        <div id="message"></div>
    </div>
</div>
<script>
    $('#get_invite').click(function(){
        jQuery.get('ajax/invite.php', {email : $('#email_input').val()}, function(data){
            $('#message').html(data);
        });
    });
	$('#my-sidebar a[href="<?=$_SERVER['REQUEST_URI']?>"]').parent().addClass('active');
</script>