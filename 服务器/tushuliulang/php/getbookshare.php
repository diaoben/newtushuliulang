<?php
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "311258";

$num = $_GET['order'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if(isset($num))	
	{
		if($num>20)
		{
			
			getbookshare($num,$num-20);
		}
		else
		{
			getbookshare($num,1);
		}
	}
	else
	{
		$sql = "SELECT book_share FROM god";
		$result = mysql_query($sql);

		$row = mysql_fetch_row($result);
echo 'ok';
		$n = $row[0];
		if($n>20)
		{
			getbookshare($n,$n-20);
		}
		else
		{
			getbookshare($n,1);
		}
	}
}
function getbookshare($num,$end)
{
	for($n = $num ; $n>=$end ; $n--)
	{
		$sql = "SELECT OWNER,BOOK_NAME,NUMBER_ORDER,date FROM book_share WHERE NUMBER_ORDER = '$n'";
		$result = mysql_query($sql);

		if($row = mysql_fetch_row($result))
		{
			$dir = "/var/www/html/tushuliulang/db/book_share/intro/".$n.".txt";
			$file = fopen($dir,'r');
			$intro = fgets($file,100);

			$result = "<bookshare>
				<owner>$row[0]</owner>
				<bookname>$row[1]</bookname>
				<numberorder>$row[2]</numberorder>
				<date>$row[3]</date>
				<intro>$intro</intro>
				</bookshare>";

			echo $result;
		}
	}
	$end--;
	echo "<gets>$end</gets>";
	$n = $num - $end ;
	echo "<total>$n</total>";
}
?>
