<?php
session_start();
include_once 'conn.php';
$username=$_SESSION['username'];
$sql="select * from yonghuzhuce where username='$username'";
$query=mysql_query($sql);
$jiename=mysql_result($query,0,'name');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>借取记录</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>已有借取记录列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索: 器材名称：<input name="qicainame" type="text" id="qicainame" size="15" /> 
  器材分类：
  <select name="qicaifenlei" id="qicaifenlei">
  	<option value="">所有</option>
  	<?php getoption("shangpinleibie","leibie")?>
  </select>
  是否归还：
  <select name='isguihuan' id='isguihuan' style='border:solid 1px #000000; color:#666666'>
    <option value="">所有</option>
    <option value="no">否</option>
    <option value="yes">是</option>
  </select>
  <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666' />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
    <td bgcolor='#CCFFFF'>器材名称</td>
    <td bgcolor='#CCFFFF'>器材分类</td>
    <td bgcolor='#CCFFFF'>借取数量</td>
    <td bgcolor='#CCFFFF'>是否归还</td>
    <td bgcolor='#CCFFFF'>借用时间</td>
    <td bgcolor='#CCFFFF'>归还时间</td>
    <td width="70" align="center" bgcolor="#CCFFFF">操作</td>
  </tr>
  <?php 
    $sql="select * from jieyuejilu where jiename='".$jiename."'";
  	if ($_POST["qicainame"]!="")
  		{
  			$nreq=$_POST["qicainame"];
  			$sql=$sql." and qicainame like '%$nreq%'";
  		}
	if ($_POST["qicaifenlei"]!="")
		{
			$nreq=$_POST["qicaifenlei"];
			$sql=$sql." and qicaifenlei like '%$nreq%'";
		}
	if ($_POST["isguihuan"]!="")
		{
			$nreq=$_POST["isguihuan"];
			$sql=$sql." and isguihuan like '%$nreq%'";
		}
  	$sql=$sql." order by id desc"; 
	$query=mysql_query($sql);
  	$rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
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
    <td width="25"><?php echo $i+1;?></td>
    <td><?php echo mysql_result($query,$i,'qicainame');?></td>
    <td><?php echo mysql_result($query,$i,'qicaifenlei');?></td>
    <td><?php echo mysql_result($query,$i,'jienumber');?></td>
    <td><?php echo mysql_result($query,$i,'isguihuan');?></td>
    <td width="120" align="center"><?php echo mysql_result($query,$i,"addtime");?></td>
    <td width="120" align="center"><?php echo mysql_result($query,$i,"guihuanshijian");?></td>
    <td width="70" align="center" style="color:red">
    <?php
    	if(mysql_result($query,$i,'isguihuan')=='no')
    	{
    ?>
    		需要归还！
    <?php
        }
        else
        {
    ?>
			<a href="del.php?id=<?php echo mysql_result($query,$i,"id");?>&tablename=jieyuejilu" onclick="return confirm('真的要删除？')">删除</a> 
	<?php
		}
	?>
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
<p align="center"><a href="jieyuejilu_list2.php?pagecurrent=1">首页</a>, <a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

