<?php 
include_once 'conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ͼ����Ϣ</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>����ͳ�ƣ�</p>
<form id="form1" name="form1" method="post" action="">
  ����: �������ƣ�<input name="qicainame" type="text" id="qicainame" />
  	    ���ķ��ࣺ
  	    <select name='qicaifenlei' id='qicaifenlei'>
  	    <option value="">����</option>
  	    <?php getoption("shangpinleibie","leibie")?>
  	    </select>
  	    <input type="submit" name="Submit" value="����" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">���</td>
    <td bgcolor='#CCFFFF'>��������</td>
    <td bgcolor='#CCFFFF'>���ķ���</td>
    <td bgcolor='#CCFFFF'>��һ����</td>
    <td bgcolor='#CCFFFF'>�ڶ�����</td>
    <td bgcolor='#CCFFFF'>��������</td>
    <td bgcolor='#CCFFFF'>���ļ���</td>
    <td bgcolor='#CCFFFF'>����</td>
  </tr>
  <?php 
    $sql="select * from tushuxinxi where 1=1";
  	if ($_POST["qicainame"]!="")
  		{
  			$nreqtushudaima=$_POST["qicainame"];
  			$sql=$sql." and qicainame like '%$nreqtushudaima%'";
  		}
	if ($_POST["qicaifenlei"]!="")
		{
			$nreqtushumingcheng=$_POST["qicaifenlei"];
			$sql=$sql." and qicaifenlei like '%$nreqtushumingcheng%'";
		}
  $sql=$sql." order by id desc";
  $query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//ÿҳ������
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
  ?>
  <tr>
    <td width="25"><?php
	echo $i+1;
?></td>
    <td>
    	<?php echo mysql_result($query,$i,'qicainame');?>
    </td>
    <td>
    	<?php echo mysql_result($query,$i,'qicaifenlei');?>
    </td>
    <td>
    	<?php echo getxsl("1",mysql_result($query,$i,'qicainame'));?>
    </td>
    <td>
    	<?php echo getxsl("2",mysql_result($query,$i,'qicainame'));?>
    </td>
    <td>
    	<?php echo getxsl("3",mysql_result($query,$i,'qicainame'));?>
    </td>
    <td>
    	<?php echo getxsl("4",mysql_result($query,$i,'qicainame'));?>
    </td>
    <td>
    	<?php echo getxslz(mysql_result($query,$i,'qicainame'));?>
    </td>
  </tr>
  	<?php
	}
}
?>
</table>
<p>�������ݹ�<?php
		echo $rowscount;
	?>��,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="tushuxinxi_list2.php?pagecurrent=1">��ҳ</a>, <a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="tushuxinxi_list2.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>

<p>&nbsp; </p>
<?php
function getxsl($njd,$nbh)
{
	if ($njd=="1")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where qicainame='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-1-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-3-31'";
	}
	if ($njd=="2")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where qicainame='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-4-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-6-30'";
	}
	if ($njd=="3")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where qicainame='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-7-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-9-30'";
	}
	if ($njd=="4")
	{
		$hsgsql="select count(id) as ss from jieyuejilu where qicainame='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-10-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-12-31'";
	}
	//echo $hsgsql;
	$query=mysql_query($hsgsql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
		echo mysql_result($query,0,ss);
	}
}
function getxslz($nbh)
{
	
		$hsgsql="select count(id) as ss from jieyuejilu where qicainame='$nbh' and addtime >='".date('Y', strtotime(date("Y-m-d")))."-1-1' and addtime <='".date('Y', strtotime(date("Y-m-d")))."-12-31'";
	
	//echo $hsgsql;
	$query=mysql_query($hsgsql);
	$rowscount=mysql_num_rows($query);
	if($rowscount>0)
	{
		echo mysql_result($query,0,ss);
	}
}
?>
</body>
</html>

