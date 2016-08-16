<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password= '311258';

$stuid = $_GET['stuid'];
$old = $_GET['old'];
$new = $_GET['new'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($stuid!=''&& $old!=''&&$new!= '')
	{
		$sql = "SELECT password FROM login WHERE stu_id = $stuid";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$password = $row[0];

		if($old == $password)
		{
			$sql = "UPDATE login SET password = '$new' WHERE stu_id = $stuid";
			mysql_query($sql);

			echo '<result>true</result><error>no_error</error>';
		}
		else
		{
			echo '<result>false</result><error>password_wrong</error>';
		}
	}
	else
	{
		echo "<result>false</result><error>input_wrong</error>";
	}
}
?>
