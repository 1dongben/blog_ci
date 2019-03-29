<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>
	<?php echo form_open('article/post');?>
    <form>
        <input type="title" name="title"><br>
        <?php echo form_error('title');?>
    	
    	<input type="content" name="content"><br>
    	<?php echo form_error('content');?>
    	
    	<input type="category" name="category"><br>
    	<?php echo form_error('category');?>
    	<input type="submit" name="submit" value='发布'>
    </form>
</body>
</html>
