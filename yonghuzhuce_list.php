<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>普通用户信息列表</title><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有用户列表</p>
<form id="form1" name="form1" method="post" action="">
  搜索
  :姓名:
  <input name="bh" type="text" id="bh" />
  学号:
  <input name="mc" type="text" id="mc" />
  <input type="submit" name="Submit" value="查询" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#EBE2FE">序号</td>
    <td width="94" bgcolor='#EBE2FE'>用户名</td>
    <td width="94" bgcolor='#EBE2FE'>姓名</td>
    <td width="94" bgcolor='#EBE2FE'>学号</td>
    <td width="94" bgcolor='#EBE2FE'>性别</td>
    <td width="204" bgcolor='#EBE2FE'>Email</td>
    <td width="86" bgcolor='#EBE2FE'>电话</td>
    <td width="120" align="center" bgcolor="#EBE2FE">修改时间</td>
    <td width="70" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
  <?php 
    $sql="select * from yonghuzhuce where 1=1";
  if ($_POST["bh"]!="")
{
  	$nreqbh=$_POST["bh"];
  	$sql=$sql." and name like '%$nreqbh%'";
}
     if ($_POST["mc"]!="")
{
  	$nreqmc=$_POST["mc"];
  	$sql=$sql." and stu_number like '%$nreqmc%'";
}
  $sql=$sql." order by id desc";
  
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;
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
    <td width="25"><?php echo $i+1; ?></td>
    <td>
      <?php echo mysql_result($query,$i,username);?>
    </td>
    <td>
      <?php echo mysql_result($query,$i,name);?>
    </td>
    <td>
      <?php echo mysql_result($query,$i,stu_number);?>
    </td>
    <td>
      <?php echo mysql_result($query,$i,sex);?>
    </td>
    <td>
      <?php echo mysql_result($query,$i,email);?>
    </td>
    <td>
      <?php echo mysql_result($query,$i,phone);?>
    </td>
    <td width="120" align="center">
      <?php echo mysql_result($query,$i,"addtime");?>
    </td>
    <td width="70" align="center">
      <a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=yonghuzhuce" onclick="return confirm('删除成功！')">删除</a> 
    </td>
  </tr>
<?php
	}
}
?>
</table>
<p>以上数据共<?php
    echo $rowscount;
  ?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="tushuxinxi_list.php?pagecurrent=1">首页</a>, <a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>
<p>&nbsp; </p>


</body>
</html>

