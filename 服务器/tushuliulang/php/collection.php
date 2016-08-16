<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$kind = $_GET['k'];
$code = $_GET['code'];
$stuid = $_GET['stuid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');


	if($kind!='' && $code!='' && $stuid!='')
	{
		$dir = '/var/www/html/tushuliulang/db/collection/'.$stuid.'/';
		if(!file_exists($dir))
		{
			mkdir($dir);
		}
		$dir = $dir.'collection.txt';
		$old = file_get_contents($dir);
		$file = fopen($dir,'w');
		$time = date("Y-m-d H:i:s");
		$content = "
					<collection> 
					<kind>$kind</kind>
					<code>$code</code>
					<time>$time</time>
					</collection>	
					".$old;
		fwrite($file,$content);
		fclose($file);

		$sql = "SELECT collection FROM stu_info WHERE STU_ID = $stuid";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$n = $row[0]+1;
		$sql = "UPDATE stu_info SET collection = $n WHERE STU_ID = $stuid";
		mysql_query($sql);

		echo "<result>true</result><error>no_error</error>";

	}
	else
	{
		echo '<error>input_wrong</error><result>false</result>';
	}
}
?>
