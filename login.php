<?php
//��֤��½��Ϣ
session_start();
include_once 'conn.php';
$login=$_POST["login"];
$username=$_POST['username'];
$pwd=$_POST['pwd'];
if($_POST['device']=='ios')
 {
 	$cx=$_POST['cx'];
    $cx=mb_convert_encoding($cx,'GBK','UTF-8');
 }
else
 {
 	$cx=$_POST['cx'];
 }
//$userpass=md5($userpass);
if($login=="1")
{
	if ($username!="" && $pwd!="")
	{
		if($cx=="ϵͳ����Ա")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd'";
		}
		if($cx=="���ʹ���Ա")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd'";
		}
		if($cx=="��ͨ�û�")
		{
			$sql="select * from yonghuzhuce where username='$username' and password='$pwd' ";
		}
		$query=mysql_query($sql);
		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			$_SESSION['username']=$username;
			$_SESSION['cx']=$cx;
			if($_POST['device']=='ios')
			{
				header("content-type:application/json");
				$answer['flag']=1;
        		$answer=json_encode($answer);
        		echo $answer;
			}
			else
			{
				echo "<script language='javascript'>alert('��½�ɹ���');location='main.php';</script>";
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
				echo "<script language='javascript'>alert('�û������������');history.back();</script>";
			}
		}
	}
	else
	{
		echo "<script language='javascript'>alert('������������');history.back();</script>";
	}
}
?>