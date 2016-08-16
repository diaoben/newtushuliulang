<?php
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "311258";

$stuid = $_GET['stuid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{

	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');
	if($stuid!='')
	{
		$sql = "SELECT NAME,USERNAME,COLLEGE,MAJOR,CLASS,GRADE,motto,PHONE,EMAIL,SEX FROM stu_info WHERE STU_ID = $stuid";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);

		if($row)
		{
			$result = "
					<stuinfo>
					<name>$row[0]</name>
					<username>$row[1]</username>
					<college>$row[2]</college>
					<major>$row[3]</major>
					<class>$row[4]</class>
					<grade>$row[5]</grade>
					<motto>$row[6]</motto>
					<phone>$row[7]</phone>
					<email>$row[8]</email>
					<sex>$row[9]</sex>
					</stuinfo>
					<result>true</result>
					";
			echo $result;

		}
		else
		{
			echo '<result>no_such_id</result>';
		}
	}
	else
	{
		echo '<result>input_wrong</result>';
	}
}
else
{

	echo '<result>mysql_connect_wrong</result>';
}
?>
