<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$order = $_GET['shareid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($order != '')
	{
		$sql = "SELECT OWNER,BOOK_NAME,ISBN,CODE,CODEINCODE,AVAILABLE,PHONE,QQ,date,comment_total FROM book_share WHERE NUMBER_ORDER = '$order'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_row($result))
		{
			$owner = $row[0];
			$book_name = $row[1];
			$isbn = $row[2];
			$code = $row[3];
			$codeincode = $row[4];
			$available = $row[5];
			$phone = $row[6];
			$qq = $row[7];
			$date = $row[8];
			$comment_total = $row[9];

			$dir = "/var/www/html/tushuliulang/db/book_share/intro/".$order.'.txt';
			$intro = file_get_contents($dir);

			$result = 
				"
				<bookshare>
				<owner>$owner</owner>
				<bookname>$book_name</bookname>
				<isbn>$isbn</isbn>
				<code>$code</code>
				<codeincode>$codeincode</codeincode>
				<available>$available</available>
				<phone>$phone</phone>
				<qq>$qq</qq>
				<date>$date</date>
				<intro>$intro</intro>
				<comments>$comment_total</comments>
				</bookshare>
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
		echo '<result>input_error</result>';
	}
}
else
{
	echo '<result>mysql_connect_error</result>';
}
?>
