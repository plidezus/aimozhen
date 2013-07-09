<?php
include "../../include/init.php";
if (!$visitor->id) header("LOCATION:/");
$homename = "settings" ;
include '../../view/base/header.php';
?>
    <div class="container" style="margin:30px auto 20px auto">

      <div class="row">
      <!--左侧个人名片 -->
        <?php include HTDOCS_DIR . "/view/home/sidebar.php"; ?>
      <!--左侧个人名片 -->


      <div class="span9 shadow" style=" margin-left:40px;width:735px"> 
                          <?
					$duoshuoinfo = DuoShuo::syncUser($visitor->id);
					echo '<p style="float: right; color: white; font-size: 12px;">'.$duoshuoinfo.'</p>';
					?>
      <div id="title" style="padding:20px;">
      	<span style="color: #2C2C2C; font-size: 18px; font-weight: bold;">修改信息</span><br />
      	<span style="color: #7F7F7F; font-weight: bold;">请分项修改</span>

	  </div>
            <div class="tabbable" style="padding:0px 0px 20px 20px;"> <!-- Only required for left/right tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">基础信息</a></li>
                <li><a href="#tab2" data-toggle="tab">我的名片</a></li>
                <li><a href="#tab3" data-toggle="tab">个人密码</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                  <!-- 编辑区域--> 
                  <div class="span6" style="margin-left:0;"> 
            
                  <form class="form-horizontal" id="basic" action="/ajax/edit_user.php?type=basic" method="POST">
                  <input type="hidden" id="id" name="id" value="<?=$visitor->id?>" />
                  			<div class="control-group">
                                <label class="control-label2">头像 </label>
                                <div class="controls2">
                                <? if ($visitor->weiboId == "") { ?>
                                <a href="https://api.weibo.com/oauth2/authorize?client_id=2517727821&response_type=code&redirect_uri=http://aimozhen.com/ajax/oauth/weibo.php" role="button" class="btn" >使用微博头像</a>
                                <? } else { ?>
                                <a href="#" role="button" class="btn disabled" >已经绑定微博头像</a>
                                <? } ?>
                                </div>
                            </div>
                            <div class="control-group" id="namegroup">
                                <label class="control-label2" for="name">昵称 </label>
                                <div class="controls2">
                                    <input type="text" class="input-xlarge" id="name" name="name" value="<?=$visitor->username?>" placeholder="好名字是好生活的开始~">
                                     <span class="help-inline" id="nameInfo"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label2" for="input01">Email </label>
                                <div class="controls2">
                                    <input class="input-xlarge" id="email" name="email" type="text" readonly value="<?=$visitor->email?>" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label2" for="input01">UID </label>
                                <div class="controls2">
                                    <input class="input-xlarge" id="uid" name="uid" type="text" readonly value="<?=$visitor->id?>" />
                                </div>
                            </div>
                            
                            <div style="margin:10px 0 0 60px;">
                                <input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />
                                
                            </div>
                    </form>
                    </div>
                    <!-- /编辑区域-->
                    <script src="/include/validation/edit_user/basic.js"></script>
                </div>
                <div class="tab-pane" id="tab2">
                  <!-- 编辑区域--> 
                  <div class="span6" style="margin-left:0;"> 
            
                  <form class="form-horizontal" id="extre" action="/ajax/edit_user.php?type=extra" method="POST">
                  <input type="hidden" id="id" name="id" value="<?=$visitor->id?>" />
                            <div class="control-group">
                                <label class="control-label2" for="input01">电邮 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" id="exteremail" name="exteremail" type="text" value="<?=$visitor->exteremail?>" />
                                </div>
                            </div>
                           <div class="control-group">
                                <label class="control-label2" for="input01">微博 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" id="exterweibo" name="exterweibo" type="text" value="<?=$visitor->exterweibo?>"  />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label2" for="input01">博客 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" id="exterblog" name="exterblog" type="text" value="<?=$visitor->exterblog?>" />
                                </div>
                            </div>
                            
                            <div style="margin:10px 0 0 60px;">
                                <input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />
                                
                            </div>
                    </form>
                    </div>
                    <!-- /编辑区域-->
                </div>
                <div class="tab-pane" id="tab3">
                  <!-- 编辑区域--> 
                  <div class="span6" style="margin-left:0;"> 
            
                  <form class="form-horizontal" id="password" action="/ajax/edit_user.php?type=password" method="POST">
                  <input type="hidden" id="id" name="id" value="<?=$visitor->id?>" />
                            <div class="control-group" id="pass1group">
                                <label class="control-label2" for="pass1">密码 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" type="password" id="pass1" name="pass1" />
                                    <span class="help-inline" id="pass1Info"></span>
                                </div>
                            </div>
                            <div class="control-group" id="pass2group">
                                <label class="control-label2" for="pass2">重复 </label>
                                <div class="controls2">
                                    <input class="input-xlarge" type="password" id="pass2" name='pass2' />
                                    <span class="help-inline" id="pass2Info"></span>
                                </div>
                            </div>
                            
                            <div style="margin:10px 0 0 60px;">
                                <input id="send" name="send" type="submit" class="btn btn-red" value="恩，就这样吧！" />

                            </div>
                    </form>

                    </div>
                    <!-- /编辑区域-->
                    <script src="/include/validation/edit_user/password.js"></script>
                </div>
              </div>
            </div>
      
      
      </div>

      </div>
    </div> <!-- /上方 -->
    
    
<?php
include '../../view/base/footer.php';
?>
