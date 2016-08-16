<?php  
$mysql_hostname = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stu_id = $_GET['studentID'];
$q = $_GET['question'];
$d = $_GET['describe'];

$link = mysql_connect($mysql_hostname,$mysql_username,$mysql_password);
if($link&&$stu_id!=''&&$q!='')
{
	if($d=='')
	{
		$d = '';
	}
	mysql_select_db('tushuliulang')or die('select db');
	mysql_query('set names utf8');

	$result = mysql_query("SELECT questions FROM god")or die('16');
	$row = mysql_fetch_row($result);

	$nq = $row[0] + 1;

	$sql = "INSERT INTO questions(questionid,stu_id,date,answers) VALUES('$nq',$stu_id,now(),0)";
	mysql_query($sql)or die('22');
	mysql_query("UPDATE god SET questions = '$nq'");

	$question = "<question>$q</question><describe>$d</describe>";

	$dir = "/var/www/html/tushuliulang/db/question/question/".$nq.".txt";
	$file = fopen($dir,'w');
	fwrite($file,$question);
	fclose($file);

	$result = mysql_query("SELECT date FROM questions WHERE questionid = '$nq'");
	$row = mysql_fetch_row($result);
	echo "<ask>$question<questionid>$nq</questionid><date>$row[0]</date></ask>";
}
else
{

	echo '36';
}

?>
