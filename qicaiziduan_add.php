<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$ziduanid=$_POST["ziduanid"];
	$ziduanname=$_POST["ziduanname"];
	ischongfu("select id from ziduanshuxing where ziduanid='".$ziduanid."'");
	$sql="insert into ziduanshuxing(ziduanid,ziduanname) values('$ziduanid','$ziduanname')";
	mysql_query($sql);
	$sql="alter table tushuxinxi add column $ziduanid varchar(255)";
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='qicaiziduan_add.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加器材属性： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
function check()
{
	if(document.form1.ziduanid.value=="")
		{
			alert("请输入字段id");
			document.form1.ziduanid.focus();
			return false;
		}
	if(document.form1.ziduanname.value=="")
		{
			alert("请输入字段名称");
			document.form1.ziduanname.focus();
			return false;
		}
}
</script>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr>
		<td>字段ID：</td>
		<td>
			<input name='ziduanid' type='text' id='ziduanid' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*
		</td>
	</tr>
	<tr>
		<td>字段名称：</td>
		<td>
			<input name='ziduanname' type='text' id='ziduanname' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*
		</td>
	</tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	function ischongfu($sql)
	{
		$query=mysql_query($sql);
 		$rowscount=mysql_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('对不起，该器材属性已经存在，请不要重复添加!');history.back();</script>";
		}
		
	}
?>
</body>
</html>

