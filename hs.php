<?php
session_start();
include_once 'conn.php';
if($_POST['device']=='ios')
{
	$id=$_POST['id'];
	$username=$_POST['username'];
}
else
{
	$id=$_GET["id"];
}
$sql="select * from jieyuejilu where id=$id";
$query=mysql_query($sql);
$qicainame=mysql_result($query,0,'qicainame');
$jienumber=mysql_result($query,0,'jienumber');
$sql="update jieyuejilu set isguihuan='yes',guihuanshijian='".date('Y-m-d H:i:s',time())."' where id=".$id;
if(mysql_query($sql))
{
	$sql="update tushuxinxi set kucunxinxi=kucunxinxi+".$jienumber." where qicainame='$qicainame'";
	if(mysql_query($sql))
	{
		$comewhere=$_SERVER['HTTP_REFERER'];
		if($_POST['device']=='ios')
		{
			header("content-type:application/json");
			$answer['flag']=1;
	    	$answer=json_encode($answer);
	    	echo $answer;
		}
		else
		{
			echo "<script language='javascript'>alert('²Ù×÷³É¹¦£¡');location.href='$comewhere';</script>";
		}
	}
	else
	{
		header("content-type:application/json");
	    $answer['flag']=0;
	    $answer=json_encode($answer);
	    echo $answer;
	}
}
else
{
	header("content-type:application/json");
	$answer['flag']=0;
	$answer=json_encode($answer);
	echo $answer;
}
?>