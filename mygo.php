<?php
session_start();
	if($_SESSION['cx']=="普通用户")
	{
		echo "<script>javascript:location.href='left2.php';</script>";
	}
	else if($_SESSION['cx']=="物资管理员")
	{
		echo "<script>javascript:location.href='left1.php';</script>";
	}
	else
	{
		echo "<script>javascript:location.href='left.php';</script>";
	}

?>