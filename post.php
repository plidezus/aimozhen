<?php
include 'view/base/header.php';
?>
<div class="container">
	<? include 'view/base/navbar.php';?>
	<div class="row">
		<div class="span9">
			<form class="form-horizontal" action="post_video.php" methdo="POST">
				<div class="control-group">
					<label class="control-label" for="input01">Video Url:</label>
					<div class="controls">
						<input type="text" class="input span4" id="input01" name="url" placeholder="Only youku & tudou are supported now.">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Category:</label>
					<div class="controls">
						<select name="category" class="span2">
							<option value="Adult">Adult</option>
							<option value="Animate">Animate</option>
							<option value="Joke">Joke</option>
						</select>
						or <input name="category_other" value="" class="span2" />
						<p class="help-block">Choose one or you can just enter one.</p>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Title:</label>
					<div class="controls">
						<input type="text" class="input" id="input01" name="url" placeholder="You can live this empty.">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input01">Comment:</label>
					<div class="controls">
						<textarea placeholder="say sth." class="span4"></textarea>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" class="btn btn-primary" value="Post" />
				</div>
			</form>
		</div>
		<div class="span3">
			<form action="login.php" method="post">
				<label>User Name: </label><input type="text" name="username" class="span2"/>
				<label>Password: </label><input type="password" name="password" class="span2"/>
				<div>
					<input type="submit" value="Login" class="btn btn-primary"/>
					<a href="" class="btn">Forget Password</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include 'view/base/footer.php';
?>
