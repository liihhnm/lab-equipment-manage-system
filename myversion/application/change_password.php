<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>修改密码</title>
</head>
<script>
    function check()
    {
        if(document.form1.ymm.value=="")
        {
            alert("请输入原密码");
            document.form1.ymm.focus();
            return false;
        }
        if(document.form1.xmm1.value=="")
        {
            alert("请输入新密码");
            document.form1.xmm1.focus();
            return false;
        }
        if(document.form1.xmm2.value=="")
        {
            alert("请输入确认密码");
            document.form1.xmm2.focus();
            return false;
        }
        if (document.form1.xmm1.value!=document.form1.xmm2.value)
        {
            alert("对不起，两次密码不一至，请重新输入");
            document.form1.xmm1.value="";
            document.form1.xmm2.value="";
            document.form1.xmm1.focus();
            return false;
        }
        if (document.form1.ymm.value == document.form1.xmm1.value)
        {
            alert("新密码不能等于老密码");
            document.form1.xmm1.value = "";
            document.form1.xmm2.value = "";
            document.form1.xmm1.focus();
            return false;
        }
    }

</script>
<body>

<form id="form1" name="form1" method="post" action="update.php">
    <table width="41%" height="126" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="9DC9FF" style="border-collapse:collapse">
        <tr>
            <td colspan="2"><div align="center">修改密码</div></td>
        </tr>
        <tr>
            <td>原密码：</td>
            <td>
                <input name="old_password" type="password" id="ymm" />
                <input name = "type" type = "hidden" value = "password"/>
            <td/>
        </tr>
        <tr>
            <td>新密码：</td>
            <td>
                <input name="new_password" type="password" id="xmm1" />
            </td>
        </tr>
        <tr>
            <td>确认密码：</td>
            <td>
                <input name="repeat" type="password" id="xmm2" />
            </td>
        </tr>
        <tr>
            <td align="right"><input type="submit" name="Submit" value="确定" onClick="return check()" /></td>
            <td align="left"><input type="reset" name="Submit2" value="重置" /></td>
        </tr>
    </table>
</form>
</body>
</html>

