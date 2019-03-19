<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>
<body>
	<?php echo form_open('user/register');?>
    <h2>请注册</h2>
    <form>
    	<input type="text" name="username"><br>
    	<?php echo form_error('username');?>
    	
    	<input type="text" name="password"><br>
    	<?php echo form_error('password');?>
    	
    	<input type="text" name="passconf"><br>
    	<?php echo form_error('passconf');?>
    	<input type="submit" value='注册'>
    </form>
    <a href="http://www.newlog.com/index.php/user/login">已有账号，去登录</a>
</body>
</html>