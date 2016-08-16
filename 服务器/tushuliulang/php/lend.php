<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stuid = $_GET['stuid'];
$shareid = $_GET['shareid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($stuid!='' && $shareid !='')
	{
		$sql = "SELECT OWNER FROM book_share WHERE NUMBER_ORDER = '$shareid'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$owner = $row[0]; 

		$sql = "SELECT lendinfo FROM stu_info WHERE STU_ID = $owner";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$n = $row[0]+1;
		$sql = "UPDATE stu_info SET lendinfo = $n WHERE STU_ID = $owner";
		mysql_query($sql);


		$dir = "/var/www/html/tushuliulang/db/library/lend/$owner/";
		if(!file_exists($dir))
		{
 		mkdir($dir);
		}
		
		$dir1 = $dir."$shareid.txt"; 
		$dir2 = $dir."lend.txt";    

		$oldcontent = file_get_contents($dir1);
		$time = date("Y-m-d H:i:s");
		$newcontent = "<lend>
			<shareid>$shareid</shareid>
			<lender>$stuid</lender>
			<time>$time</time>
			</lend>";

		$newcontent1 = $newcontent.$oldcontent;
		$file = fopen($dir1,'w');
		fwrite($file,$newcontent1);
		fclose($file);

		$oldcontent = file_get_contents($dir2);
		$newcontent2 = $newcontent.$oldcontent;
		$file = fopen($dir2,'w');
		fwrite($file,$newcontent2);
		fclose($file);

		echo '<result>true</result>';
	}
	else
	{
		echo '<result>false</result>';
	}
}
?>
