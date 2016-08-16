<?php
$mysql_username = 'root';
$mysql_password = '311258';
$mysql_hostname = 'localhost';

$link = mysql_connect($mysql_hostname,$mysql_username,$mysql_password)or die("8");
mysql_select_db("tushuliulang")or die("9");
mysql_query("set names utf8")or die("10");

$found;
//将关键字排列组和
function p($n,$array,$presult)
{
	if(count($array)==1)
	{
		
		$presult[$n]=$array[0];
		search_in_mysql($presult,$found);
	}
	else
	{
		for($i = 0 ;$i <= count($array)-1;$i++)
		{
			$presult[$n]=$array[$i];
			p($n+1,cut($i,$array),$presult);
		}
	}

}
//除去一个关键字
function cut($n,$array)
{
	$result = array_chunk($array,1);
	for($i = 0,$j = 0 ; $i<=count($array)-1;$i++)
	{
		if($i!=$n)
		{
			if($j == 0 )
			{
				$r = array_merge($result[$i]);
				$j++;
			}
			else
			{
				$r = array_merge($r,$result[$i]);
				$j++;
			}
		}
		
	}
	return $r;
}
//mysql 操作
function search_in_mysql($array)
{
	
	$likes = '%';
	for($n=0;$n<=count($array)-1;$n++)
	{
		$likes=$likes.$array[$n].'%';
	}
	$result = mysql_query("select NAME,PRESS,CODE,intro FROM book_info where NAME LIKE '$likes'")or die("wrong");
	
	while($row = mysql_fetch_row($result))
	{
		returnback($row);
		echo '</p>';
	}
}
//返回xml
function returnback($row)
{
	global $found;
	for($n = 0 ;$n<=count($found);$n++)
	{

		if($row[2]==$found[$n])
		{
			return;
		}
	}
	$code = $row[2];
	$dir = "/var/www/html/tushuliulang/db/book_info/intro/$code.txt";
	$intro = file_get_contents($dir);
	echo
		"
		<book>
		<name>$row[0]</name>
		<press>$row[1]</press>
		<code>$row[2]</code>
		<intro>$intro</intro>
		</book>
		";
	$found[count($found)]=$row[2];
}

$searchstr = $_GET['s'];
$array = explode('0tsll0',$searchstr);

var_dump($array);
if($searchstr!='')
{
	p(0,$array,$presult);
}
//p(0,cut(0,$array,$psult));
if(count($found)!=0)
{
	$count = count($found);
	echo "<founded>$count</founded>";
}
else
{
	echo '<founded>0</founded>';
}
?>
