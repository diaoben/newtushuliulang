<?php 
$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';
 
$link = mysql_connect($mysql_hostname,$mysql_username,$mysql_password);
mysql_select_db("tushuliulang");
mysql_query("set names utf8");

$bookcode = $_GET['code'];

$result = mysql_query("select NAME,PRESS,CODE,ISBN,AVAILABLE,PRICE,intro,total FROM book_info WHERE CODE=$bookcode");
if($row=mysql_fetch_row($result))
{
	$dir = "/var/www/html/tushuliulang/db/book_info/intro/$bookcode.txt";
	$intro = file_get_contents($dir);

	echo "
		<found>true</found>
		<name>$row[0]</name>
		<press>$row[1]</press>
		<code>$row[2]</code>
		<isbn>$row[3]</isbn>
		<available>$row[4]</available>
		<price>$row[5]</price>
		<intro>$intro</intro>
		<total>$row[7]</total>
	";
}
else
{
	echo "<found>false</found>";
}

?>
