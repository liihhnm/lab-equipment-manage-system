<?php
//��֤��½��Ϣ

include_once 'conn.php';
//if($_POST['submit']){
	$id=$_GET["id"];
	$tablename=$_GET['tablename'];
	//$userpass=md5($userpass);
	//ɾ��ziduanshuxing�ı�����
	$sql="delete from $tablename where ziduanid=".'\''.$id.'\'';
	mysql_query($sql);
    //����tushuxinxi�ı�ṹ
    $sql="alter table tushuxinxi drop column ".$id;
    mysql_query($sql);
	$comewhere=$_SERVER['HTTP_REFERER'];
	echo "<script language='javascript'>alert('ɾ���ɹ���');location.href='$comewhere';</script>";
	
//}
?>