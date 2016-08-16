<form enctype="multipart/form-data" action="changeinfo.php" method = "POST">

	<input type = "hidden" name = "MAX_FILE_SIZE" value = "104857600" /><!--100m-->
	upload<input name= "picture" type="file" size="50" />
	<input type="submit" name="submit" value = "上传" />
</form>

<?php
echo 'ok';

$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';


$username = $_GET["username"];
$name  = $_GET["name"];
$password = $_GET["password"];

$stuid = $_GET["stuid"];
$class = $_GET["class"];
$grade = $_GET["grade"];
$college = $_GET["college"];
$major = $_GET['major'];
$motto = $_GET["motto"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$sex = $_GET["sex"];
$pic = $_GET["pic"];

if(!empty($_FILES['picture']['name']))
{

	switch($_FILES['picture']['error'])
	{
	case UPLOAD_ERR_OK:
		$dir = "/var/www/html/tushuliulang/db/pic/".$_FILES['picture']['name'];
		if(file_exists($dir))
		{
			
			unlink($dir);
		}
		if(move_uploaded_file($_FILES['picture']['tmp_name'],$dir))
		{
			echo '<result_pic>true</result_pic>' ;

		}
		else
		{
			echo '<result_pic>false</result_pic>';
		}
		break;
	default:
		echo '<result_pic>true</result_pic>';
	}
}
else
{
	echo '<result_pic>false</result_pic>';
}

$link = mysql_connect($mysql_hostname,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang')or die("76");
	mysql_query("set names utf8")or die("77");
	$sql = "select password from login where stu_id = $stuid";
	$result =  mysql_query($sql);
	$row = mysql_fetch_row($result);
	if($stuid!=""&&$password!=""&&$row[0]==$password&&mysql_affected_rows())
	{
//    $username = 'wjl';
//	$stuid=201419630314;
		$sql1 ="update stu_info set USERNAME = '$username',NAME='$name',COLLEGE='$college',MAJOR='$major',CLASS='$class',GRADE='$grade',motto='$motto',PHONE='$phone',EMAIL='$email',SEX='$sex',pic='$pic' where STU_ID= $stuid";	
		mysql_query($sql1);
			echo '<result_info>true</result_info>';
	}
	else
	{
		echo '<result_info>inputfalse</result_info>';
	}
}
else
{
	echo '<result_info>mysqlfalse</result_info';
}



?>
