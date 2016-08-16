<form enctype = "multipart/form-data" action = "publishbookinfouploadimg.php" method = "post" >
 <input type = "hidden" name = "MAX_FILE_SIZE" value = "104857600" /><!--100m-->
upload<input name = "img" type = "file" size = "50" />
	<input type = "submit" name = "submit" value = "上传"/>
<?php

if(!empty($_FILES['img']['name']))
{
	switch($_FILES['img']['error'])
	{

	case UPLOAD_ERR_OK:
		$dir = "/var/www/html/tushuliulang/db/book_share/pic/".$_FILES['img']['name'];
		if(move_uploaded_file($_FILES['img']['tmp_name'],$dir))
		{
			echo '<result>true</result>';
		}
		else
		{
			echo '<result>false</result>';
		}
	}
}
?>
