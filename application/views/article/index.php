<!DOCTYPE html>
<html>
<head>
	<title>LIST</title>
</head>
<body>
<?php 
$this->load->helper('cookie');
$uid = get_cookie('uid');
if($uid !== null):?>
	<p><?php echo 'uid：'.get_cookie('uid');?>
	<a href="http://www.newlog.com/index.php/user/logout"><?php echo '退出登录';?></a></p>
<?php else:?>
	<a href="http://www.newlog.com/index.php/user/login"><p><?php echo "请登录";?></p></a>
<?php endif;?>
<a href="http://www.newlog.com/index.php/article/post"><p><?php echo '发布文章';?></p></a>
<?php  foreach($list as $detail):?>
	<p><a href="http://www.newlog.com/index.php/article/detail?<?php echo 'id='.$detail['id'];?>"><?php echo $detail['title'];?></a></p>
	<?php echo $detail['content'];?>
	<?php echo $detail['create_time'];?>
<?php endforeach;?>

</body>
</html>
