<?php 
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$id = $_GET['id'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);
if($link)
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	$sql = "SELECT questions FROM god";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	$nq = $row[0];
	if($id=='')
	{
		if($nq>20)
		{
			getquestions($nq,$nq-20);
		}
		else
		{
			getquestions($nq,0);
		}
	}
	else
	{
		if($id>20)
		{
			getquestions($id,$id-20);
		}
		else
		{
			getquestions($id,0);
		}
	}
	
}
function getquestions($start,$end)
{
	echo "<ask>"; 
	for($n = $start;$n>$end;$n--)
	{
		$sql = "SELECT stu_id,date,answers FROM questions WHERE questionid = '$n'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);

		$dir = "/var/www/html/tushuliulang/db/question/question/".$n.".txt";
		$q = file_get_contents($dir);

		$result = "<questionall>
			<studentID>$row[0]</studentID>
			<questionid>$n</questionid>
			<date>$row[1]</date>
			<n_answer>$row[2]</n_answer>
					$q</questionall>
					";
		echo $result;
	}
	$n = $end;
	echo "<next>$n</next></ask>";
}
?>
