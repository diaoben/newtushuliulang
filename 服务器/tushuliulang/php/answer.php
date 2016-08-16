<?php
$mysql_host = 'localhost';
$mysql_username = 'root';
$mysql_password = '311258';

$stu_id = $_GET['studentID'];
$respond = $_GET['respond'];
$qid = $_GET['questionID'];

$link = mysql_connect($mysql_host,$mysql_username,$mysql_password);

if($link&&$stu_id!=''&&$respond!=''&&$qid!='')
{
	mysql_select_db('tushuliulang');
	mysql_query('set names utf8');

	$result=mysql_query('SELECT answers FROM god');
	$row = mysql_fetch_row($result);
	$n_a = $row[0] + 1;

	mysql_query("UPDATE god SET answers = $n_a");

	$result  = mysql_query("SELECT answers FROM questions WHERE questionid = '$qid'");
	$row = mysql_fetch_row($result);
	$n_a = $row[0] + 1;

	$dir = '/var/www/html/tushuliulang/db/question/answer/'.$qid;
	if(!file_exists($dir))
	{
		mkdir($dir);
	}
	
	$dir = $dir.'/'.$n_a.'.txt';
	$file = fopen($dir,'w');
	fwrite($file,$respond);
	fclose($file);

	$sql = "INSERT INTO answer(questionid,answerid,stu_id,date) VALUES('$qid','$n_a',$stu_id,now())";
	mysql_query($sql);
	mysql_query("update questions set answers = $n_a where questionid = '$qid'");
	
	$result = mysql_query("SELECT stu_id,date FROM answer WHERE questionid = '$qid'&&answerid = '$n_a'");
	$row = mysql_fetch_row($result);
	$result = "<ask><respondall><questionID>$qid</questionID><studentID>$row[0]</studentID><respond>$respond</respond><date>$row[1]</date></respondall></ask>";
	echo $result;

}
?>
