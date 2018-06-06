<?php

session_start();
include_once '../utility.php';
if($_SESSION['role']!="manager")
{
    echo "<script>javascript:alert('对不起，您没有该权限');history.back();</script>";
    exit;
}
include_once '../connection.php';
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <!--
    <link rel="stylesheet" href="../css.css" type="text/css">
    -->
    <link rel = "stylesheet" href = "css.css" type = "text/css">

    <script language="javascript">
        function check()
        {
            if(document.form1.username.value=="")
            {
                alert("请输入用户名");
                document.form1.username.focus();
                return false;
            }
            if(document.form1.pwd1.value=="")
            {
                alert("请输入密码");
                document.form1.pwd1.focus();
                return false;
            }
            if(document.form1.pwd2.value=="")
            {
                alert("请输入确认密码");
                document.form1.pwd2.focus();
                return false;
            }
            if(document.form1.pwd1.value!=document.form1.pwd2.value)
            {
                alert("两次密码不一致，请重试");
                document.form1.pwd1.value="";
                document.form1.pwd2.value="";
                document.form1.pwd1.focus();
                return false;
            }
        }
    </script>
</head>

<body>
<p>添加新管理员：</p>
<form id="form1" name="form1" method="post" action="add.php">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
        <tr>
            <td align="right">用户名：</td>
            <td>
                <input name="username" type="text" id="username" />
                <input name = "type" type = "hidden" id = "type" value = "user"/>
                <input name = "auth" type = "hidden" id = "auth" value = "manager"/>
            <td>
        </tr>
        <tr>
            <td align="right">密码：</td>
            <td><input name="pwd1" type="password" id="pwd1" /></td>
        </tr>
        <tr>
            <td align="right">确认密码：</td>
            <td><input name="pwd2" type="password" id="pwd2" /></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit" value="提交" onClick="return check();" class="btn btn-primary"/>
                <input type="reset" name="Submit2" value="重置" class="btn btn-primary"/></td>
        </tr>
    </table>
</form>

<hr>

<p>管理员列表：</p>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
    <tr>
        <td bgcolor="#4682B">序号</td>
        <td bgcolor="#4682B">用户名</td>
        <td bgcolor="#4682B">权限</td>
        <td bgcolor="#4682B">添加时间</td>
        <td bgcolor="#4682B">操作</td>
    </tr>
    <?php
    $sql="select * from users where role = 'manager' order by id";
    $query = mysql_query($sql);
    if (!$query) exit();
    $rowscount = mysql_num_rows($query);
    for($i=0; $i<$rowscount; $i++)
    {
        ?>
        <tr>
            <td><?php
                echo $i+1;
                ?></td>
            <td><?php
                echo mysql_result($query,$i,"user_name");
                ?></td>
            <td><?php
                echo getRoleCNName(mysql_result($query,$i,"role"));
                ?></td>
            <td><?php
                echo mysql_result($query,$i,"add_time");
                ?></td>
            <td><a href="delete.php?id=<?php
                echo mysql_result($query,$i,"id");
                ?>&type=user" onClick="return confirm('确认删除')" class="btn">删除</a> </td>
        </tr>
        <?php
    }
    ?>
</table>
<p>&nbsp; </p>
</body>
</html>
