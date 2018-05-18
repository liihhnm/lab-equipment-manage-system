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
<title>器材信息</title>
<script language="javascript" src="js/Calendar.js"></script>
<link rel="stylesheet" href="css.css" type="text/css">
<style type="text/css">
#TableForm td{padding-right:25px;}
</style>
</head>
<body>

<p>已有器材信息列表：</p>
<form id="form1" name="form1" method="post" action="">
  <div id="TableForm">
  <table>
    <tr>
      <td>搜索：</td>
    </tr>
    <tr>
      <td></td>
      <td>器材名称：
        <input name="qicainame" type="text" id="qicainame" />
      </td>
      <td>器材分类：
        <select name="qicaifenlei" id="qicaifenlei">
          <option value="">所有</option>
          <?php getoption("shangpinleibie","leibie")?>
        </select>
      </td>
      <td>库存信息：
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
  <center><input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666'/></center>
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#CCFFFF">序号</td>
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
    <td>操作</td>
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
          var jienumber = prompt("请输入借阅数量！","20");
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
      <a href="javascript:void(0);" onclick='jienumber_sub()'>借取</a>
      <a href="tushuxinxi_detail.php?id=<?php echo mysql_result($query,$i,"id");?>">详细</a></td>
     
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

