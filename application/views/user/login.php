<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>
<body>
	<?php echo validation_errors();?>
    <h2>请登录</h2>
    <form>
    	<input type="text" name="username"><br>
    	<input type="text" name="password"><br>
    	<input type="submit" value='登录'>
    </form>
    <a href="http://www.newlog.com/index.php/user/register">注册账号</a>
</body>
</html>