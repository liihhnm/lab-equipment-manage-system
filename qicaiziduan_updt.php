<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$tushudaima=$_POST["tushudaima"];$tushumingcheng=$_POST["tushumingcheng"];$tushufenlei=$_POST["tushufenlei"];$tushuzuozhe=$_POST["tushuzuozhe"];$chubanshe=$_POST["chubanshe"];$chubanriqi=$_POST["chubanriqi"];$yeshu=$_POST["yeshu"];$jiage=$_POST["jiage"];$tupian=$_POST["tupian"];$heshinianlingduan=$_POST["heshinianlingduan"];$dianjilv=$_POST["dianjilv"];$beizhu=$_POST["beizhu"];
	$sql="update tushuxinxi set tushudaima='$tushudaima',tushumingcheng='$tushumingcheng',tushufenlei='$tushufenlei',tushuzuozhe='$tushuzuozhe',chubanshe='$chubanshe',chubanriqi='$chubanriqi',yeshu='$yeshu',jiage='$jiage',tupian='$tupian',heshinianlingduan='$heshinianlingduan',dianjilv='$dianjilv',beizhu='$beizhu' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('�޸ĳɹ�!');location.href='tushuxinxi_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸�ͼ����Ϣ</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>�޸�ͼ����Ϣ�� ��ǰ���ڣ� <?php echo $ndate; ?></p>
<?php
$sql="select * from tushuxinxi where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
	<tr>
		<td>�ֶ�ID��</td>
		<td>
			<input name='tushudaima' type='text' id='tushudaima' value='<?php echo mysql_result($query,$i,tushudaima);?>' />
		</td>
	</tr>
	<tr>
		<td>�ֶ����ƣ�</td>
		<td>
			<input name='tushumingcheng' type='text' id='tushumingcheng' size='50' value='<?php echo mysql_result($query,$i,tushumingcheng);?>' />
		</td>
	</tr>
    <tr>
      <td>&nbsp;</td>
      <td>
      	<input name="addnew" type="hidden" id="addnew" value="1" />
      	<input type="submit" name="Submit" value="�޸�" style='border:solid 1px #000000; color:#666666' />
      	<input type="reset" name="Submit2" value="����" style='border:solid 1px #000000; color:#666666' />
     </td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

