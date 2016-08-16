<?php

$wrong = "<login>false</login>";

$username = $_POST['username'];
$password = $_POST['password'];
$Mysql_hostname = 'localhost';
$Mysql_username = 'root';
$Mysql_password = '311258';
$link = mysql_connect($Mysql_hostname,$Mysql_username,$Mysql_password);
if($link)
{
	mysql_select_db('tushuliulang')or die($wrong);
	mysql_query("set names utf8")or die($wrong);
	$sql = "select  password from login where stu_id=$username ";
	$result = mysql_query($sql)or die($wrong);
	$row = mysql_fetch_row($result);
	if($row[0]==$password)
	{   
		mysql_query("set names utf8");
		$result = mysql_query("select NAME,USERNAME,COLLEGE,MAJOR,CLASS,GRADE,motto,PHONE,EMAIL,SEX,pic from stu_info where STU_ID = $username")or die("worng");
		
	    $row = mysql_fetch_row($result);
	
		$xml = "
			<login>true</login>
			<stu>
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
			<pic>$row[10]</pic>
			<stu_id>$username</stu_id>
			</stu>";
			echo $xml;
	}
	else
	{

		echo $wrong;
	}
}
?>
