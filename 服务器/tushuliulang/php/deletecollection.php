<?php  echo 'ok1';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stuid = $_GET['stuid'];
$kind = $_GET['k'];
$code = $_GET['code'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
mysql_select_db('tushuliulang');
mysql_query('set names utf8');

if($stuid!=''&&$kind!=''&&$code!='')
{
	
	$dir = "/var/www/html/tushuliulang/db/collection/$stuid/collection.txt";

	$content = file_get_contents($dir);
	$pattern = "/<collection>[^<>]*<kind>$kind<\/kind>[^<>]*<code>$code<\/code>[^<>]*<time>[^<>]*<\/time>[^<>]*<\/collection>/";
	$n = preg_match_all($pattern,$content,$match);
	if($n>0)
	{
//	echo $content.'<\p><\p><\p><\p>';
	$newcontent= preg_replace($pattern,"",$content);
//	echo $newcontent;
	$file = fopen($dir,'w');
	fwrite($file,$newcontent);
	fclose($file);

	$sql = "SELECT collection FROM stu_info WHERE STU_ID = $stuid";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$n = $row[0]-$n;
	
	$sql=  "UPDATE stu_info SET collection = $n WHERE STU_ID = $stuid";
	mysql_query($sql);
	echo '<result>true</result>';
	}
	else
	{
		echo '<result>false</result>';
	}
}
else
{
	echo '<result>false</result>';
}
}
?>
