<?php   
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$questionid = $_GET['questionid'];
$answerid = $_GET['answerid'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link)
{

	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');
	
	$sql = "SELECT answers FROM  questions WHERE questionid='$questionid'";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$start = $row[0];

	if($answerid=='')
	{
		$answerid = $start;
		if($answerid>20)
		{
			getanswers($answerid,$answerid-20,$questionid);
		}
		else
		{
			getanswers($answerid,0,$questionid);
		}

	}
	else
	{
		if($answerid>20)
		{
			getanswers($answerid,$answerid-20,$questionid);
		}
		else
		{
			getanswers($answerid,0,$questionid);
		}
	}
}
function getanswers($start,$end,$questionid)
{
	echo "<ask>";
	for($n = $start;$n>$end;$n--)
	{
		
			$sql = "SELECT stu_id,date FROM answer WHERE questionid = '$questionid'&&answerid = '$n'";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);

			$dir = "/var/www/html/tushuliulang/db/question/answer/$questionid/".$n.'.txt';
			$r = file_get_contents($dir);

			$result = "<respondall><questionid>$questionid</questionid><date>$row[1]</date><studentID>$row[0]</studentID><respond>$r</respond></respondall>";

			echo $result;
		
	}
	$next = $end ;
	echo "<next>$next</next></ask>";
}
?>
