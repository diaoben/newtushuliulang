<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$code = $_GET['code'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($code!="")
	{
		$sql = "SELECT NUMBER_ORDER,OWNER,CODEINCODE FROM book_share WHERE CODE = '$code'&&AVAILABLE = 'true'";
		$result = mysql_query($sql); 
		$n =0;
		while($row = mysql_fetch_row($result))
		{
			$shareid = $row[0];
			$owner = $row[1];
			$codeincode = $row[2];
			
			$n++;

			$output = "
				<book>
				<shareid>$shareid</shareid>
				<owner>$owner</owner>
				<codeincode>$codeincode</codeincode>
				</book>	
				";
			echo $output;

		}
		echo "<found>$n</found><result>true</result>";

	}
	else
	{
	echo "<result>false</result>";
	}
}
?>
