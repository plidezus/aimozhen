<div class="row" style="margin-top:20px;">
<div class="span3" style="height:90px; width:235px;margin-bottom:20px">

  <div class="avatar">
    <img class="img-rounded" src="<?=$user->avatar()->link(80)?>" width="80" height="80" />
  </div>
  <div id="detailed" class="float-left" style="margin:5px 0 0 10px">
      <div id="name" >
        <? if ($user->verify) { ?>
        <div class="user-detail-title ellipsis float-left" style="max-width:120px;">
        <a href="#" id="username" data-pk="<?=$user_id;?>" data-placement="right" data-placeholder="好听的大名" data-title="请输入新名字"><?=$user->username?></a>
        </div>
        <i title="认证用户" class="icon2-verify float-left" style="margin-left:5px"></i>
        <? }  else  { ?>
        <div class="user-detail-title ellipsis float-left" style="max-width:150px;"><?=$user->username?></div>
        <? } ?>   
      </div>
       <div id="user-detail-infor" class="ellipsis">
            <i class="icon-map-marker" style="margin:4px 5px 0 0"></i>
            <a href="#" id="location" data-pk="<?=$user_id;?>" data-placement="right" data-placeholder="北京·朝阳" data-title="请输入所在地"><? if(!$user->location){ echo "尚未填写"; } else { echo $user->location; }?></a>
            <br />
            <i class="icon-briefcase" style="margin:4px 5px 0 0"></i> 
            <a href="#" id="career" data-pk="<?=$user_id;?>" data-placement="right" data-placeholder="苦逼的小美工" data-title="请输入您的职业"><? if(!$user->career){ echo "尚未填写"; } else { echo $user->career; }?></a>
       </div>
  </div>

</div>

<div class="span3" style="height:90px; width:225px;padding-left:10px; border-left:#D3D3D3 dotted 1px">
    <div class="user-detail-title" style="margin-top:5px">About</div>
    <div style="margin-top: 5px; line-height: 20px; font-size: 14px; color: #848484;">
        <a href="#" id="aboutme" data-pk="<?=$user_id;?>" data-placement="bottom" data-placeholder="很简短的介绍" data-title="请输入一段简短的介绍"><? if(!$user->aboutme){ echo "欢迎访问我的主页"; } else { echo $user->aboutme; }?></a>
    </div>
</div>

<div class="span3" style="height:90px; width:225px;padding-left:10px; border-left:#D3D3D3 dotted 1px">
    <div class="user-detail-title" style="margin-top:5px">Status</div>
    <div style="margin-top: 5px; line-height: 20px; font-size: 14px; color: #848484">
        被访问了<?=$user->viewed?>次，共有<?=$user->postOriginal;?>部创作，<?=($user->post - $user->postOriginal);?>部分享
    </div>
</div>

<div class="span3" style="height:90px; width:225px;padding-left:10px; border-left:#D3D3D3 dotted 1px">
    <? if ($visitor->id) {if(($visitor->id == $user_id)||($visitor->group == 1)) {  ?>
    <button id="enable" class="btn btn-mini btn-link float-right" style="color: #555555">编辑模式</button>
    <? }} ?>
    <div class="user-detail-title" style="margin-top:5px">Contact</div>
    <div style="margin-top: 5px; line-height: 20px; font-size: 14px; color: #848484">
        <? if ($user->exterweibo) {?>
                <a href="<?=$user->exterweibo?>" target="_blank">去TA微博看看</a>	
                <? };?>
    </div>
    
</div>

</div>


<script> $(function(){ UserEdit(); }); </script>

<div class="row" style="margin-bottom:20px">
  <ul id="user-detail-headerbar" >
    <? if ($pagename=="user"){ echo '<li class="active">';}else{echo '<li >';} ?><a href="/user/<?=$user_id;?>/">创作</a></li>
    <? if ($pagename=="share"){ echo '<li class="active">';}else{echo '<li >';} ?><a href="/user/<?=$user_id;?>/share/">分享</a></li>
    </ul>
  <div style="border-bottom:#C0C0C0 solid 1px; margin:20px; 0 0 0 "></div>
</div>