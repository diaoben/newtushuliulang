<?php 
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$share_id = $_GET['shareid'];
$stu_id = $_GET['stuid'];
$comment = $_GET['comment'];

$link = mysql_connect($$mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');
	
	if($share_id != '' && $stu_id != '' && $comment != '')
	{
		$sql = "SELECT book_share_comment FROM god";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$book_share_comment_in_god = $row[0] + 1;
		$sql = "UPDATE god SET book_share_comment = $book_share_comment_in_god";
		mysql_query($sql);

		$sql = "SELECT comment_total FROM book_share WHERE NUMBER_ORDER = '$share_id'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$comment_total_in_book_share = $row[0] + 1;
		$sql = "UPDATE book_share SET comment_total = $comment_total_in_book_share WHERE NUMBER_ORDER = '$share_id'";
		mysql_query($sql);

		$sql = "INSERT INTO book_share_comments(NUMBER_ORDER,CODE,STU_ID,DATE) VALUES ('$share_id','$comment_total_in_book_share',$stu_id,now())";
		mysql_query($sql);
		
		$dir = '/var/www/html/tushuliulang/db/book_share/comments/'.$share_id;
		if(!file_exists($dir))
		{
			mkdir($dir);
		}

		$dir = $dir.'/'.$comment_total_in_book_share.'.txt';
		$file = fopen($dir,'w');
		fwrite($file,$comment);
		fclose($file);

		echo '<result>true</result>';

	}
	else
	{

		echo '<result>false<result>';
	}

}
else
{
	echo '<result>false</result>';
}
?>
