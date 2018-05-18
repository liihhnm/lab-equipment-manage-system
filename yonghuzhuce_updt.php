<?php
session_start();

?>
<?php 
$username=$_SESSION['username'];
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
  $password=$_POST["password"];
  $name=$_POST["name"];
  $stu_number=$_POST["stu_number"];
  $sex=$_POST["sex"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $sql="update yonghuzhuce set password='$password',name='$name',stu_number='$stu_number',sex='$sex',email='$email',phone='$phone' where username='$username'";
  mysql_query($sql);
  echo "<script>javascript:alert('修改成功!');location.href='yonghuzhuce_updt.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改用户注册</title><link rel="stylesheet" href="css.css" type="text/css"><script language="javascript" src="js/Calendar.js"></script>
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
<p>修改普通用户： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
  function check()
  {
  if(document.form1.password.value=="")
    {
      alert("请输入密码！");
      document.form1.password.focus();
      return false;
    }
    if(document.form1.repassword.value=="")
    {
      alert("请输入确认密码！");
      document.form1.repassword.focus();
      return false;
    }
  if(document.form1.password.value!=document.form1.repassword.value)
    {
      alert("对不起，两次密码不一致，请重试");
      document.form1.password.focus();
      document.form1.password.value="";
      document.form1.repassword.value="";
      return false;
    }
  if(document.form1.name.value=="")
    {
      alert("请输入姓名！");
      document.form1.name.focus();
      return false;
    }
  if(document.form1.stu_number.value=="")
    {
      alert("请输入学号！");
      document.form1.stu_number.focus();
      return false;
    }  
  var strEmail = document.getElementById("email").value;  
  var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
  var email_Flag = reg.test(strEmail);
  if(!email_Flag)
    {
      if(strEmail=="")
      {  
      }
      else
      {
        alert("对不起，您输入的邮箱地址格式错误。");
        document.form1.email.focus();
        return false;
      }
    }
  var phone=document.getElementById("phone").value;
  if(!(/^1[34578]\d{9}$/.test(phone)))
    {
       if(phone=="")
      {  
      }
      else
      {
        alert("手机号码有误，请重填！");
        document.form1.phone.focus();
        return false; 
      }
    }

}
</script>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
  <tr>
    <td>密码：</td>
    <td>
      <input name='password' type='password' id='password' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>确认密码：</td>
    <td> 
        <input name='repassword' type='password' id='repassword' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>姓名：</td>
    <td>
      <input name='name' type='text' id='name' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>学号：</td>
    <td>
      <input name='stu_number' type='text' id='stu_number' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>性别：</td>
    <td>
      <select name='sex' id='sex'>
        <option value="男">男</option>
        <option value="女">女</option>
    </td>
  </tr>
  <tr>
    <td>Email：</td>
    <td>
      <input name='email' type='text' id='email' value='' />&nbsp;
    </td>
  </tr>
  <tr>
    <td>电话：</td>
    <td>
      <input name='phone' type='text' id='phone' value='' />&nbsp;
    </td>
  </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="addnew" type="hidden" id="addnew" value="1" />
      <input type="submit" name="Submit" value="修改" onclick="return check();" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>

