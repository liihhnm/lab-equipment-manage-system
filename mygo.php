<?php
session_start();
	if($_SESSION['cx']=="��ͨ�û�")
	{
		echo "<script>javascript:location.href='left2.php';</script>";
	}
	else if($_SESSION['cx']=="���ʹ���Ա")
	{
		echo "<script>javascript:location.href='left1.php';</script>";
	}
	else
	{
		echo "<script>javascript:location.href='left.php';</script>";
	}

?>