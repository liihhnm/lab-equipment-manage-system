<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$sql="select * from ziduanshuxing";
    $query=mysql_query($sql);
  	$count=mysql_num_rows($query);
  	for($i=0;$i<$count;$i++)
  	{
  		$ziduanid[$i]=mysql_result($query,$i,'ziduanid');
  		$content[$i]=$_POST[$ziduanid[$i]];
  	}
	
	$sql="update tushuxinxi set ";
	for($i=0;$i<$count;$i++)
	  {
	  	$sql=$sql.$ziduanid[$i]."="."'".$content[$i]."'";
	  	if($i!=$count-1)
	  	{
	  		$sql=$sql.',';
	  	}
	  }
	$sql=$sql." where id=".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='tushuxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改图书信息</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
</head>
<script language="javascript">
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>修改图书信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
	{
		<?php
			$sql="select * from ziduanshuxing";
    		$query=mysql_query($sql);
  			$count=mysql_num_rows($query);
  			for($i=0;$i<$count;$i++)
  			{		
  		?>
  		if(document.form1.<?php echo mysql_result($query,$i,"ziduanid") ?>.value=="")
			{	
				var info="请输入"+<?php echo "\"".mysql_result($query,$i,"ziduanname")."\""?>+"!";
				alert(info);
				document.form1.<?php echo mysql_result($query,$i,"ziduanid") ?>.focus();
				return false;
			}
  		<?php
  			}	
		?>
	}
</script>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
<?php
	$sql2="select * from tushuxinxi where id=$id";
	$query2=mysql_query($sql2);
?>
	<tr>
		<td>器材名称：</td>
		<td>
			<input name='qicainame' type='text' id='qicainanme' value='<?php echo mysql_result($query2,0,'qicainame')?>' style='border:solid 1px #000000; color:#666666' />&nbsp;
		</td>
	</tr>
	<tr>
		<td>图书分类：</td>
		<td>
			<select name='qicaifenlei' id='qicaifenlei' ><?php getoption("shangpinleibie","leibie")?>
			</select>
		</td>
	</tr>
	<tr>
		<td>库存信息：</td>
		<td>
			<input name='kucunxinxi' type='text' id='kucunxinxi' value='<?php echo mysql_result($query2,0,'kucunxinxi')?>' style='border:solid 1px #000000; color:#666666' />
		</td>
	</tr>
	<?php
  		$sql="select * from ziduanshuxing where ismoren='no'";
  		$query=mysql_query($sql);
  		$rowscount=mysql_num_rows($query);
  		for($i=0;$i<$rowscount;$i++)
  		{
  	?>
  	<tr>
  	<?php		
  		$name=mysql_result($query,$d,"ziduanname");
  		$id=mysql_result($query,$d,"ziduanid");
  		echo "<td>".$name.":"."</td>";
  	?>
  		<td>
  			<input name='<?php echo $id?>' type='text' value='<?php echo mysql_result($query2,0,$id)?>' style='border:solid 1px #000000; color:#666666' id='<?php echo $id?>'>
  		</td>
  	</tr>
  	<?php		
  		}
  	?>
    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>

