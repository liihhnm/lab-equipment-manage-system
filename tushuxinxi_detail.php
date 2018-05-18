<?php
session_start();
include_once 'conn.php';
$id=$_GET["id"];
?>
<html>
<head>
<title>图书信息</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="css.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
  <?php
$sql="select * from tushuxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
  $sql="select * from ziduanshuxing where 1=1";
  $query1=mysql_query($sql);
  $count=mysql_num_rows($query1);
?>
</p>
<p>&nbsp;</p>
<table width="70%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
  <tr>
    <td width='11%' height=22>器材名称：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,'qicainame');?></td>
    <td  rowspan=<?php echo $count?> align=center>
      <img src="erwei.php?id=<?php echo $id?>" width=228 height=215 border=0></a>
    </td>
  </tr>
  <tr>
    <td width='11%' height=22>器材分类：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,'qicaifenlei');?></td>
  </tr>
  <tr>
    <td width='11%' height=22>库存信息：</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,'kucunxinxi');?></td>
  </tr>
  <?php
      $sql="select * from ziduanshuxing where ismoren='no'";
      $query1=mysql_query($sql);
      $count=mysql_num_rows($query1);
      for($i=0;$i<$count;$i++)
      {
          $name=mysql_result($query1,$i,"ziduanname");
          $id=mysql_result($query1,$i,"ziduanid");
  ?>
  <tr>
    <td width='11%' height=22><?php echo $name?>:</td>
    <td width='39%' height="22"><?php echo mysql_result($query,0,$id);?></td>
  </tr> 
  <?php       
      }
  ?>
  <tr>
    <td colspan=3 align=center>
      <input type=button name=Submit5 value=返回 onClick="javascript:history.back()" style='border:solid 1px #000000; color:#666666'  />
    </td>
  </tr>
</table>
<?php
  }
?>

</body>
</html>
