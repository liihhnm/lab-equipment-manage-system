<?php
//注销登录
session_start();
$_SESSION['username']="";
$_SESSION['role']="";

echo "<script language='javascript'>alert('注销成功！');location='index2.html';</script>";
?>