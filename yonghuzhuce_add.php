<?php
include_once 'conn.php';
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
  
  $username=$_POST["username"];
  $password=$_POST["password"];
  $stu_number=$_POST["stu_number"];
  if($_POST['device']=='ios')
    {
      $sex=$_POST["sex"];
      $name=$_POST["name"];
      $sex=mb_convert_encoding($sex,'GBK','UTF-8');
      $name=mb_convert_encoding($name,'GBK','UTF-8');
    }
  else
    {
      $sex=$_POST["sex"];
      $name=$_POST["name"];
    } 
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  if(ischongfu("select id from yonghuzhuce where username='$username'"))
  {
    $sql="insert into yonghuzhuce(username,password,name,stu_number,sex,email,phone) values('$username','$password',"."'".$name."'".",'$stu_number',"."'".$sex."','$email','$phone')";
    if(mysql_query($sql))
    {
      if($_POST['device']=='ios')
      { 
        header("content-type:application/json");
        $answer['flag']=1;
        $answer=json_encode($answer);
        echo $answer;
      }
      else
      {
        echo "<script>javascript:alert('��ӳɹ���');location.href='yonghuzhuce_add.php';</script>";
      }
    }
    else
    {
      if($_POST['device']=='ios')
      { 
        header("content-type:application/json");
        $answer['flag']=0;
        $answer['error_number']=mysql_errno();
        $answer['error_content']=mysql_error();
        $answer=json_encode($answer);
        echo $answer;
      }
    }
  }
}
if($_POST['device']!='ios')
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��ͨ�û���Ϣ���</title><script language="javascript" src="js/Calendar.js"></script>
<link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>����û���Ϣ <?php echo $ndate; ?></p>
<script language="javascript">
  function check()
  {
   if(document.form1.username.value=="")
    {
      alert("�������û�����");
      document.form1.username.focus();
      return false;
    }
  if(document.form1.password.value=="")
    {
      alert("���������룡");
      document.form1.password.focus();
      return false;
    }
    if(document.form1.repassword.value=="")
    {
      alert("��������һ�����룡");
      document.form1.repassword.focus();
      return false;
    }
  if(document.form1.password.value!=document.form1.repassword.value)
    {
      alert("�����������벻һ�£�");
      document.form1.password.focus();
      document.form1.password.value="";
      document.form1.repassword.value="";
      return false;
    }
  if(document.form1.name.value=="")
    {
      alert("������������");
      document.form1.name.focus();
      return false;
    }
  if(document.form1.stu_number.value=="")
    {
      alert("������ѧ�ţ�");
      document.form1.stu_number.focus();
      return false;
    }  
  var strEmail = document.getElementById("email").value;  
  var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
  var email_Flag = reg.test(strEmail);
  if(!email_Flag)
    {
      alert("��������ȷ�ĵ����ʼ���");
      document.form1.email.focus();
      return false;
    }
  var phone=document.getElementById("phone").value;
  if(!(/^1[34578]\d{9}$/.test(phone)))
    {
       alert("��������ȷ�ĵ绰���룡");
       document.form1.phone.focus();
       return false; 
    }

}
</script>
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
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
   <tr>
    <td>�û���</td>
    <td>
      <input name='username' type='text' id='username' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>����</td>
    <td>
      <input name='password' type='password' id='password' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>ȷ������</td>
    <td> 
        <input name='repassword' type='password' id='repassword' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>����</td>
    <td>
      <input name='name' type='text' id='name' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>ѧ��</td>
    <td>
      <input name='stu_number' type='text' id='stu_number' value='' />&nbsp;*
    </td>
  </tr>
  <tr>
    <td>�Ա�</td>
    <td>
      <select name='sex' id='sex'>
        <option value="��">��</option>
        <option value="Ů">Ů</option>
    </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <input name='email' type='text' id='email' value='' />&nbsp;
    </td>
  </tr>
  <tr>
    <td>�绰</td>
    <td>
      <input name='phone' type='text' id='phone' value='' />&nbsp;
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="hidden" name="addnew" value="1" />
      <input type="submit" name="Submit" value="�ύ" onclick="return check();" />
      <input type="reset" name="Submit2" value="����" /></td>
  </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
}
?>
<?php
  function ischongfu($sql)
  {
    $query=mysql_query($sql);
    $rowscount=mysql_num_rows($query);
    if($rowscount>0)
    {

      if($_POST['device']=='ios')
      {
        header("content-type:application/json");
        $answer['flag']=2;
        $answer=json_encode($answer);
        echo $answer;
        return false;
      }
      else
      {
        echo "<script>javascript:alert('���û����Ѿ����ڣ�');history.back();</script>";
        return false;
      }
    }
    return true;
  }
?>