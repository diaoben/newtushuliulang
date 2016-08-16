<?php echo 'ok';
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$order = $_GET['shareid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($order!=null)
 	{

		$sql = "SELECT comment_total FROM book_share WHERE NUMBER_ORDER = '$order'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$comments = $row[0];

		for( $n = $comments; $n>0;$n--)
		{
			getcomment($n,$order);
		}
	}
	echo "<founded>$comments</founded>";
}

function getcomment($n,$order)
{
	$sql = "SELECT STU_ID,DATE FROM book_share_comments WHERE NUMBER_ORDER = '$order' && CODE = '$n'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	$stu_id = $row[0];
	$date = $row[1];

	$dir = '/var/www/html/tushuliulang/db/book_share/comments/'.$order.'/'.$n.'.txt';
	$comment = file_get_contents($dir);

	$result = "
			<comments>
			<order>$order</order>
			<code>$n</code>
			<stuid>$stu_id</stuid>
			<date>$date</date>
			<comment>$comment</comment>
			</comments>		
			";
	 echo $result;

}

?>
