<?php
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "311258";

$order = $_GET['order'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8'); 
    
	if(isset($order))
	{
		$sql = "SELECT	ORDER,BOOK_NAME,ISBN,CODE,CODEINCODE,NUMBER_ORDER,AVAILABLE,PHONE,QQ,date FROM book_info WHERE NUMBER_ORDER = $order";
		$result=mysql_query($sql);

		if($row = mysql_fetch_row($result))
		{
			$dir = "/var/www/html/tushuliulang/db/book_share/intro/$order.txt";
			$intro = file_get_contents($dir);

			$result = "
				<result>true</result>
				<book_share>
				<owner>$row[0]</owner>
				<bookname>$row[1]</bookname>
				<isbn>$row[2]</isbn>
				<code>$row[3]</code>
				<codeincode>$row[4]</codeincode>
				<number>$row[5]</number>
				<available>$row[6]</available>
				<phone>$row[7]</phone>
				<qq>$row[8]</qq>
				<date>$row[9]</date>
				<intro>$intro</intro>
				</book_share>
 				";	

			echo $result;
		}
		else
		{
			echo "<result>false</result>";
		}
	}
}
?>
