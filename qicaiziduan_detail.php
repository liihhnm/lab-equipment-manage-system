<?php 
include_once 'conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
	<p>�������������б�</p>
	<form id="form1" name="form1" method="post" action="">
	  ����:����:
	  <input name="bh" type="text" id="bh" />
	  <input type="submit" name="Submit" value="����" />
	</form>
	<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
	  <tr>
	    <td width="40"  align="center" bgcolor="#EBE2FE">���</td>
	    <td bgcolor='#EBE2FE' align="center">����id</td>
	    <td width="400" align="center" bgcolor="#EBE2FE">��������</td>
	    <td width="150" align="center" bgcolor="#EBE2FE">����</td>
	  </tr>
	<?php 
	  $sql="select * from ziduanshuxing";
	  if ($_POST["bh"]!="")
	  {
	      $nreqbh=$_POST["bh"];
	      $sql=$sql.' '.'where ziduanname ='.'\''.$nreqbh.'\'';
	  } 
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
	 ?>
	 <?php
	  for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
	  {
	 ?>
	  <tr>
	    <td width="40" align="center"><?php echo $i+1;?></td>
	    <td align="center"><?php echo mysql_result($query,$i,"ziduanid");?></td>
	    <td width="400" align="center">
	    <?php
	      echo mysql_result($query,$i,"ziduanname");
	    ?></td>
	    <td width="150" align="center">
	    <?php 
	    $flag=mysql_result($query,$i,"ismoren");
	    if($flag=="yes")
	    {	
	    	echo "Ĭ���ֶ�";
	    }
	    else
	    {
	    	$ziduanid=mysql_result($query,$i,"ziduanid");
	    	echo "<a href=\"qicaiziduan_del.php?id=$ziduanid&tablename=ziduanshuxing\" onclick=\"return confirm('���Ҫɾ����')\">ɾ��</a>";
	    }
	  ?>
	    </td> 
	  </tr>
	  <?php
		}
	  }
	?>
	</table>
	<p>�������ݹ�<?php echo $rowscount;?>��,
	  <input type="button" name="Submit2" onclick="javascript:window.print();" value="��ӡ��ҳ" />
	</p>
	<p align="center"><a href="shangpinleibie_list.php?pagecurrent=1">��ҳ</a>, <a href="shangpinleibie_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="shangpinleibie_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="shangpinleibie_list.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>
	<p>&nbsp; </p>
</body>
</html>

