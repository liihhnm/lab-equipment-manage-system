<?php
//验证登陆信息

include_once 'conn.php';
//if($_POST['submit']){
	$id=$_GET["id"];
	$tablename=$_GET['tablename'];
	//$userpass=md5($userpass);
	//删除ziduanshuxing的表内容
	$sql="delete from $tablename where ziduanid=".'\''.$id.'\'';
	mysql_query($sql);
    //更新tushuxinxi的表结构
    $sql="alter table tushuxinxi drop column ".$id;
    mysql_query($sql);
	$comewhere=$_SERVER['HTTP_REFERER'];
	echo "<script language='javascript'>alert('删除成功！');location.href='$comewhere';</script>";
	
//}
?>