<?php
session_start();
?>
<?php 
include_once 'conn.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������Ϣ</title>
<script language="javascript" src="js/Calendar.js"></script>
<link rel="stylesheet" href="css.css" type="text/css">
<style type="text/css">
#TableForm td{padding-right:25px;}
</style>
</head>
<body>

<p>����������Ϣ�б�</p>
<form id="form1" name="form1" method="post" action="">
  <div id="TableForm">
  <table>
    <tr>
      <td>������</td>
    </tr>
    <tr>
      <td></td>
      <td>�������ƣ�
        <input name="qicainame" type="text" id="qicainame" />
      </td>
      <td>���ķ��ࣺ
        <select name="qicaifenlei" id="qicaifenlei">
          <option value="">����</option>
          <?php getoption("shangpinleibie","leibie")?>
        </select>
      </td>
      <td>�����Ϣ��
        <input name="kucunxinxi" type="text" id="kucunxinxi" />
      </td>
    </tr>
    <?php
      $sql="select * from ziduanshuxing where ismoren='no'";
      $query=mysql_query($sql);
      $rowscount=mysql_num_rows($query);
      $n=intval($rowscount/3);
      $d=0;
      for($i=0;$i<$n;$i++)
      {
        echo "<tr>";
        echo "<td></td>";
        for($c=0;$c<3;$c++)
        {
          $name=mysql_result($query,$d,"ziduanname");
          $id=mysql_result($query,$d,"ziduanid");
          echo "<td>".$name.":";
          echo "<input name='$id' type='text' id='$id'>"."</td>";
          $d++;
        }
        echo "</tr>";
      }
      echo "<tr>";
      echo "<td></td>";
      for($i=3*$n;$i<$rowscount;$i++)
      {
        $name=mysql_result($query,$d,"ziduanname");
        $id=mysql_result($query,$d,"ziduanid");
        echo "<td>".$name.":";
        echo "<input name='$id' type='text' id='$id'>"."</td>";
        $d++;
      }
      echo "</tr>";
    ?>
  </table>
  </div>
  <center><input type="submit" name="Submit" value="����" style='border:solid 1px #000000; color:#666666'/></center>
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">���</td>
    <?php
      $sql="select * from ziduanshuxing";
      $query=mysql_query($sql);
      $count=mysql_num_rows($query);
      for($i=0;$i<$count;$i++)
      {
        echo "<td>";
        echo mysql_result($query,$i,"ziduanname");
        echo "</td>";
        $ziduanid[$i]=mysql_result($query,$i,"ziduanid");
      }
    ?>
    <td>����</td>
  </tr>
  <?php 
    $sql="select * from tushuxinxi where 1=1";
    for($i=0;$i<$count;$i++)
    {
      if($_POST[$ziduanid[$i]]!="")
      {
      $sql=$sql." and ".$ziduanid[$i]." like ".'\'%'.$_POST[$ziduanid[$i]].'%\'';
      }
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
    <td width="25"><?php echo $i+1; ?></td>
    <?php
      for($d=0;$d<$count;$d++)
      {
        echo "<td>";
        echo mysql_result($query,$i,$ziduanid[$d]);
        echo "</td>";
      }  
    ?>
    <td width="90" align="center">
      <script language="javascript">
        function jienumber_sub(){
          var jienumber = prompt("���������������","20");
          var number= document.getElementById("jienumber").value;
          if(number=='0')
          {
            document.getElementById("jienumber").value=jienumber;
          }
          document.getElementById("form2").submit();    
        }  
      </script>
      <form id="form2" name="form2" method="post" action="jieyuejilu_add.php">
      <input id="jienumber" type="hidden" name="jienumber" value="0">
      <input id="id" type="hidden" name="id" value="<?php echo mysql_result($query,$i,"id");?>">
      </form>
      <a href="javascript:void(0);" onclick='jienumber_sub()'>��ȡ</a>
      <a href="tushuxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">��ϸ</a></td>
     
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
<p align="center"><a href="tushuxinxi_list.php?pagecurrent=1">��ҳ</a>, <a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecurrent-1;?>">ǰһҳ</a> ,<a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecurrent+1;?>">��һҳ</a>, <a href="tushuxinxi_list.php?pagecurrent=<?php echo $pagecount;?>">ĩҳ</a>, ��ǰ��<?php echo $pagecurrent;?>ҳ,��<?php echo $pagecount;?>ҳ </p>
<p>&nbsp; </p>

</body>
</html>

