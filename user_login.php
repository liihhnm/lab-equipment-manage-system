<?php
//验证登陆信息
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

if (isempty($username) || isempty($pwd)) {
    echo "<script lanuage = 'javascript'>alert('用户名或密码不能为空！');history.back()</script>";
} else {
    $sql = "select * from "
}

?>

<!--
//$userpass=md5($userpass);
if($login=="1")
{
	if ($username!="" && $pwd!="")
	{
		if($cx=="系统管理员")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd'";
		}
		if($cx=="物资管理员")
		{
			$sql="select * from allusers where username='$username' and pwd='$pwd'";
		}
		if($cx=="普通用户")
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
				echo "<script language='javascript'>alert('登陆成功！');location='main.php';</script>";
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
				echo "<script language='javascript'>alert('用户名或密码错误！');history.back();</script>";
			}
		}
	}
	else
	{
		echo "<script language='javascript'>alert('请输入完整！');history.back();</script>";
	}
}
-->