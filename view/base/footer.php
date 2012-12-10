<script src="/media/js/amz.js"></script>
</body>
<div id='login' class="modal hide">
    <div class="modal-header"><h4>登录</h4></div>
    <form action="/login.php" method="POST">
        <div class="modal-body">
            用户名：<input type="text" name="username" /> <br />
            　密码：<input type="password" name="password" /> <br />
            <input type="submit" value="登录" class="btn btn-primary"/>
        </div>
    </form>
</div>
<div id='share' class="modal hide">
    <div class="modal-header"><h4>分享动画</h4></div>
    <form action="ajax/post.php" method="POST">
        <div class="modal-body">
            URL: <input type="text" name="url" />
            <input type="submit" value="发布" class="btn btn-primary"/>
        </div>
    </form>
</div>
</html>