<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$code = $_GET['code'];
$codeincode = $_GET['codeincode'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{

	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	$sql = "SELECT NUMBER_ORDER from book_share WHERE CODE = '$code'&&CODEINCODE = '$codeincode'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);

	if($row)
	{
		echo "<shareid>$row[0]</shareid><result>true</result>";
	}
	else
	{
		echo "<result>false</result>";
	}
}
?>
