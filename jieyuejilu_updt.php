<?php 
$id=$_GET["id"];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{

	$tushudaima=$_POST["tushudaima"];$tushumingcheng=$_POST["tushumingcheng"];$tushufenlei=$_POST["tushufenlei"];$tushuzuozhe=$_POST["tushuzuozhe"];$kucun=$_POST["kucun"];$jieyongshuliang=$_POST["jieyongshuliang"];$yujietianshu=$_POST["yujietianshu"];$shifouguihuan=$_POST["shifouguihuan"];$guihuanshijian=$_POST["guihuanshijian"];$beizhu=$_POST["beizhu"];$jieyueren=$_POST["jieyueren"];
	$sql="update jieyuejilu set tushudaima='$tushudaima',tushumingcheng='$tushumingcheng',tushufenlei='$tushufenlei',tushuzuozhe='$tushuzuozhe',kucun='$kucun',jieyongshuliang='$jieyongshuliang',yujietianshu='$yujietianshu',shifouguihuan='$shifouguihuan',guihuanshijian='$guihuanshijian',beizhu='$beizhu',jieyueren='$jieyueren' where id= ".$id;
	mysql_query($sql);
	echo "<script>javascript:alert('修改成功!');location.href='jieyuejilu_list.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改借阅记录</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改借阅记录： 当前日期： <?php echo $ndate; ?></p>
<?php
$sql="select * from jieyuejilu where id=".$id;
$query=mysql_query($sql);
$rowscount=mysql_num_rows($query);
if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 

      <tr><td>图书代码：</td><td><input name='tushudaima' type='text' id='tushudaima' value='<?php echo mysql_result($query,$i,tushudaima);?>' /></td></tr><tr><td>图书名称：</td><td><input name='tushumingcheng' type='text' id='tushumingcheng' size='50' value='<?php echo mysql_result($query,$i,tushumingcheng);?>' /></td></tr><tr><td>图书分类：</td><td><input name='tushufenlei' type='text' id='tushufenlei' value='<?php echo mysql_result($query,$i,tushufenlei);?>' /></td></tr><tr><td>图书作者：</td><td><input name='tushuzuozhe' type='text' id='tushuzuozhe' value='<?php echo mysql_result($query,$i,tushuzuozhe);?>' /></td></tr><tr><td>库存：</td><td><input name='kucun' type='text' id='kucun' value='<?php echo mysql_result($query,$i,kucun);?>' /></td></tr><tr><td>借用数量：</td><td><input name='jieyongshuliang' type='text' id='jieyongshuliang' value='<?php echo mysql_result($query,$i,jieyongshuliang);?>' /></td></tr><tr><td>预借天数：</td><td><input name='yujietianshu' type='text' id='yujietianshu' value='<?php echo mysql_result($query,$i,yujietianshu);?>' /></td></tr><tr><td>是否归还：</td><td><select name='shifouguihuan' id='shifouguihuan'></select></td></tr><script language="javascript">document.form1.shifouguihuan.value='<?php echo mysql_result($query,$i,shifouguihuan);?>';</script><tr><td>归还时间：</td><td><input name='guihuanshijian' type='text' id='guihuanshijian' value='<?php echo mysql_result($query,$i,guihuanshijian);?>' /></td></tr><tr><td>备注：</td><td><textarea name='beizhu' cols='50' rows='8' id='beizhu'><?php echo mysql_result($query,$i,beizhu);?></textarea></td></tr><tr><td>借阅人：</td><td><input name='jieyueren' type='text' id='jieyueren' value='<?php echo mysql_result($query,$i,jieyueren);?>' /></td></tr>
   
   
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#666666' />
      <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' /></td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

