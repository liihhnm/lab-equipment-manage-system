<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$id=$_POST['id'];
if($_POST['device']=='ios')
{
	$username=$_POST['username'];
}
else
{
	$username=$_SESSION['username'];
}
$sql="select * from tushuxinxi where id=".$id;
$query=mysql_query($sql);
$qicainame=mysql_result($query,0,qicainame);
$qicaifenlei=mysql_result($query,0,qicaifenlei);
$kucunxinxi=mysql_result($query,0,kucunxinxi);
if($_POST['search']==1)
{
	header("content-type:application/json");
	$qicainame=mb_convert_encoding($qicainame,'UTF-8','GBK');
    $qicaifenlei=mb_convert_encoding($qicaifenlei,'UTF-8','GBK');
	$answer['qicainame']=$qicainame;
	$answer['qicaifenlei']=$qicaifenlei;
	$answer['kucunxinxi']=$kucunxinxi;
    $answer=json_encode($answer);
    echo $answer;
}
else
{
	$sql="select * from yonghuzhuce where username='$username'";
	$query=mysql_query($sql);
	$jiename=mysql_result($query,0,name);
	$stu_number=mysql_result($query,0,stu_number);
	$jienumber=$_POST['jienumber'];
	if(intval($jienumber)>intval($kucunxinxi))
	{
		if($_POST['device']=='ios')
		{
			header("content-type:application/json");
			$answer['flag']=2;
			$answer['jienumber']=$jienumber;
	        $answer=json_encode($answer);
	        echo $answer;
		}
		else
		{
			echo "<script>javascript:alert('对不起，库存不足，操作失败!');history.back();</script>";
		}
	}
	else
	{
		$sql="insert into jieyuejilu (qicainame,qicaifenlei,jiename,stu_number,jienumber) values('$qicainame','$qicaifenlei','$jiename','$stu_number','$jienumber')";
		if(mysql_query($sql))
		{
			$number=$kucunxinxi-$jienumber;
			$sql="update tushuxinxi set kucunxinxi='$number' where qicainame='$qicainame'";
			if(mysql_query($sql))
			{
				if($_POST['device']=='ios')
				{
					header("content-type:application/json");
					$answer['flag']=1;
		        	$answer=json_encode($answer);
		        	echo $answer;
				}
				else
				{
					echo "<script>javascript:alert('操作成功!');location.href='tushuxinxi_list3.php';</script>";
				}	
			}
		}
		else
		{
			if($_POST['device']=='ios')
				{
					header("content-type:application/json");
					$answer['flag']=0;
		        	$answer=json_encode($answer);
		        	echo $answer;
				}
				else
				{
					echo "<script>javascript:alert('操作失败!');location.href='tushuxinxi_list3.php';</script>";
				}	
		}
		
	}
}
?>
