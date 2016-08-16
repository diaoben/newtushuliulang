<?php  
$msyql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$shareid = $_GET['shareid'];
$stuid = $_GET['stuid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{

	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	if($shareid!='' && $stuid != '')
	{
		$sql = "SELECT OWNER FROM book_share WHERE NUMBER_ORDER = '$shareid'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);
		$owner = $row[0];
		
		$dir = "/var/www/html/tushuliulang/db/library/lend/$owner/lend.txt";
		$oldcontent = file_get_contents($dir);

		$pattern = "/<lend>[^<>]*<shareid>$shareid<\/shareid>[^<>]*<lender>$stuid<\/lender>[^<>]*<time>[^<>]*<\/time>[^<>]*<\/lend>/";
		$n = preg_match_all($pattern,$oldcontent,$match);
		if($n!=0)
		{
			$newcontent = preg_replace($pattern,'',$oldcontent);  
			
			$file = fopen($dir,'w');
			fwrite($file,$newcontent);
			fclose($file);

			$sql = "SELECT lendinfo FROM stu_info WHERE STU_ID = $owner";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
		    $n = $row[0] - $n;  
			$sql = "UPDATE stu_info SET lendinfo = $n WHERE STU_ID = $owner";
			mysql_query($sql);

			echo '<result>true</result>';
		}
		else
		{
			echo '<result>false</result>';
		}
	}
}
?>
