<?php

include_once 'conn.php';
	$id=$_GET["id"];
	//if ($id=="")
//	{
//		$id=$_POST["id"];
//	}
	$xj=$_POST["xj"];
	$ymm=$_POST["ymm"];
	if($xj=="1")
	{
		
		$sql="update jieyuejilu set yujietianshu=yujietianshu+".$ymm." where id=".$id."";
	 	mysql_query($sql);
		$comewhere=$_SERVER['HTTP_REFERER'];
		echo "<script language='javascript'>alert('续借成功！');location.href='$comewhere';</script>";
	}

?>
<script>
function check()
{
	if(document.form1.ymm.value=="")
	{
		alert("请输入续借天数");
		document.form1.ymm.focus();
		return false;
	}
	
}

</script>

<form id="form1" name="form1" method="post" action="">
  <table width="41%" height="126" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="9DC9FF" style="border-collapse:collapse">
    <tr>
      <td colspan="2"><div align="center">续借</div></td>
    </tr>
    <tr>
      <td>续借天数：</td>
      <td><input name="ymm" type="text" id="ymm" />
      <input name="xj" type="hidden" id="xj" value="1" />
      <input name="id" type="hidden" id="id" value="<?php echo $id;?>" /></td>
    </tr>
    <tr>
      <td><input type="submit" name="Submit" value="确定" onclick="return check()" /></td>
      <td><input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
