<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>
<body>
	<?php echo form_open('user/login');?>
    <h2>请登录</h2>
    <form>
    	<input type="text" name="username"><br>
        <?php echo form_error('username');?>
    	<input type="text" name="password"><br>
    	<?php echo form_error('password');?>
    	<input type="submit" value='登录'>
    </form>
    <a href="http://www.newlog.com/index.php/user/register">注册账号</a>
</body>
</html>