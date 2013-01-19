<div class="span3"> 
        	<div class="shadow" style="padding:15px;">
                <div id="card-top" style="margin-bottom:50px">
                    <div id="avatar" class="float-left"><a href="<?=$visitor->avatar()->editLink()?>"><img src="<?=$visitor->avatar()->link(50)?>" width="50" height="50" /></a></div>
                    <div id="detailed" class="float-left" style="margin-left:10px">
                        <div id="name"><?=$visitor->username?></div>
                        <div id="birday" style="color: #ABABAB; font-size: 12px">2010年11月08日加入</div>
                    </div>    
                </div>
      		</div>	
        	<div id="my-list" style="margin-top:30px">
            <ul class="nav nav-list">
                <?php if ($homename=="videos"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/videos/"><i class="icon-home icon-white"></i> 我的分享</a></li>
                <?php if ($homename=="likes"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/likes/"><i class="icon-heart"></i> 我的收藏</a></li>
				<?php if ($homename=="following"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/following/"><i class="icon-user"></i> 关注的人</a></li>
                <li><a data-toggle="modal" href="#invite"><i class="icon-gift"></i> 邀请入住</a></li>
                <?php if ($homename=="settings"){ echo '<li class="active">';}else{echo '<li>';} ?><a href="/home/settings/"><i class="icon-cog"></i> 修改信息</a></li>
                <li><a href="/logout.php"><i class="icon-off"></i> 登出</a></li>
			</ul>
            </div>
        </div>
        
<div id="invite" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">邀请注册</h3>
  </div>
    <div class="modal-body">
    <form class="form">
            <input class="span4" type="email" id="email_input" placeholder="如果你喜欢这里，写下他/她的Email，把他/她拉来陪你吧。"/><br />
            <a id="get_invite" href="###" class="btn btn-red">获取邀请信</a>
        </form>
    </div>
</div>
<script>
    $('#get_invite').click(function(){
        jQuery.get('/ajax/invite.php', {email : $('#email_input').val()}, function(data){
            $('#message').html(data);
        });
    });
	$('#my-sidebar a[href="<?=$_SERVER['REQUEST_URI']?>"]').parent().addClass('active');
</script>