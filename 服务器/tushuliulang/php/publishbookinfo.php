<?php   
$mysql_host = 'localhost';
$mysql_password = '311258';
$mysql_username = 'root';

$owner = $_GET['owner'];
$book_name = $_GET['bookname'];
$isbn = $_GET['isbn'];
$phone = $_GET['phone'];
$qq = $_GET['qq'];
$intro = $_GET['intro'];
$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link&&$owner!=''&&$book_name!=''&&$isbn!=''&&$phone!=''&&$qq!='')
{
	mysql_select_db('tushuliulang')or die('9');
	mysql_query("set names utf8");

	$sql = "SELECT CODE,AVAILABLE,total FROM book_info WHERE ISBN = '$isbn'";
	$result = mysql_query($sql);
	
	if($row = mysql_fetch_row($result))
	{
		$na = $row[1]+1;
		$nt = $row[2]+1;
		mysql_query("UPDATE book_info SET AVAILABLE = $na,total = $nt  WHERE CODE = $row[0]");
		
		$code = $row[0];

	}
	else
	{
		$sql = "SELECT book from god";
		$result = mysql_query($sql);

		$row = mysql_fetch_row($result);
		$code = $row[0] + 1;
		
		$sql = "INSERT INTO book_info(NAME,CODE,ISBN,AVAILABLE,total) 
			VALUES('$book_name','$code','$isbn',1,1)";
		mysql_query($sql);
	    mysql_query("UPDATE god SET book = $code");	

		$dir = "/var/www/html/tushuliulang/db/book_info/intro/$code.txt";
		$file = fopen($dir,'w');
		fwrite($file,$intro);
		fclose($file);

		$nt = 1;
	}

	$sql = "INSERT INTO allbooks(CODE,CODEINCODE,OWNER,AVAILABLE)
		VALUES('$code','$nt',$owner,'true')";
	mysql_query($sql);


	$sql = "SELECT book_share FROM god";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$number_order = $row[0] + 1;

	$sql = "INSERT INTO book_share
		(OWNER,BOOK_NAME,ISBN,CODE,CODEINCODE,NUMBER_ORDER,AVAILABLE,PHONE,QQ,date,comment_total)
		VALUES($owner,'$book_name','$isbn','$code','$nt','$number_order','true',$phone,$qq,now(),0)";
	mysql_query($sql);
	mysql_query("UPDATE god SET book_share = '$number_order'");

	saveintro($number_order,$intro);

	echo "<number>$number_order</number><code>$code</code>";
	echo "<success>true</success>";
}
else
{
	echo "<success>false</success>";
}

function saveintro($name,$intro)
{
	$dir = "/var/www/html/tushuliulang/db/book_share/intro/".$name.".txt";
	$file = fopen($dir,'w');
	fwrite($file,$intro);
	fclose($file);
}
?>
