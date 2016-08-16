<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$code = $_GET['code'];
$codeincode = $_GEt['codeincode'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	$sql = "SELECT DATEOFLEND,DATEOFRETURN,AVAILABLE FROM allbooks WHERE CODE = '$code' & CODEINCODE = '$codeincode'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);

	$d1 = $row[0]; 
	$d2 = $row[1]; 
	$available = $row[2]; 

	if($available=='false')
	{

		echo "<d1>$d1</d1><d2>$d2</d2><result>true</result>";
	}
	else
	{
		echo "<result>false</result>";
	}

}
?>
