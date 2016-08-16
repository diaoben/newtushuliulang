<?php
/*borrowbook.php
 * get stuid code codeincode date(借书期限) shareid
 */
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stuid = $_GET['stuid'];
$code = $_GET['code'];
$codeincode = $_GET['codeincode'];
$date = $_GET['date'];
$shareid = $_GET['shareid'];  

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($stuid != '' && $code != '' && $codeincode != ''&& $date != ''&& $shareid !=''  )
	{
		$sql = "SELECT AVAILABLE FROM allbooks WHERE CODE = '$code' && CODEINCODE = '$codeincode'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$available = $row[0];  
		
		if($available == 'true')
		{
			$sql = "UPDATE allbooks SET DATEOFLEND = now(),DATEOFRETURN = date_add(now(),interval $date month) , LENDER = $stuid,AVAILABLE = 'false' WHERE CODE = '$code'&& CODEINCODE = '$codeincode'";
			mysql_query($sql);

			$sql = "UPDATE book_share SET AVAILABLE = 'false' WHERE NUMBER_ORDER = '$shareid'";
			mysql_query($sql);
			
			$sql = "SELECT borrow,lend FROM stu_info WHERE STU_ID = $stuid";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			$n = $row[0] + 1; echo $n;
			$sql = "UPDATE stu_info SET borrow = $n WHERE STU_ID =$stuid"; 
			mysql_query($sql);
			$lend = $row[1]+1;

			$dir = '/var/www/html/tushuliulang/db/library/borrow/'.$stuid.'.txt';
//			if(!file_exists($dir))
//			{
//				mkdir($dir);
//			}

			$fileinput = "<book>
				<code>$code</code>
				<codeincode>$codeincode</codeincode>
				</book>";
			$content = file_get_contents($dir);
			$file = fopen($dir,'w');
			$new = $fileinput.$content;
			fwrite($file,$new);
			fclose($file);

			$sql = "SELECT OWNER FROM book_share WHERE NUMBER_ORDER = '$shareid'";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			$owner = $row[0];
			$sql = "UPDATE stu_info SET lend = $lend WHERE STU_ID = $owner";
			mysql_query($sql);

			$dir = "/var/www/html/tushuliulang/db/library/lend/$owner/book.txt";
			$add = "<book>
				<code>$code</code>
				<codeincode>$codeincode</codeincode>
				<lender>$stuid</lender>
				</book>
				";
			$content = file_get_contents($dir);
			$new = $add.$content;
			$file = fopen($dir,"w");
			fwrite($file,$new);
			fclose($file);
			
			echo '<result>true</result><error>no_error</error>';

		}
		else
		{
			echo '<result>false</result><error>book_unavailable</error>';
		}
		
	}
	else
	{
		echo '<result>false</result><error>input_error</error>';
	}
}
else
{
	echo '<result>false</result><error>mysql_error</error>';
}
?>
 
