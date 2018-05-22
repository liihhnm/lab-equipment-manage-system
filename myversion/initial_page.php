<?php
session_start();
require_once 'utility.php';

?>
<html>
<head>
    <title>welcome</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <base target="_self">
    <link rel="stylesheet" type="text/css" href="skin/css/base.css" />
    <link rel="stylesheet" type="text/css" href="skin/css/main.css" />
</head>
<body leftmargin="8" topmargin='8'>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td><div style='float:left'> <img height="14" src="skin/images/frame/book1.gif" width="20" />&nbsp;欢迎使用本器材管理系统 </div>
            <div style='float:right;padding-right:8px;'>
                <!--  //保留接口  -->
            </div></td>
    </tr>
    <tr>
        <td height="1" background="skin/images/frame/sp_bg.gif" style='padding:0px'></td>
    </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px;margin-top:8px;">
    <tr>
        <td background="skin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'><span>消息</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&gt;&gt;欢迎使用 实验室器材管理系统 ，有问题请联系系统管理员！ </td>
    </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
    <tr>
        <td colspan="2" background="skin/images/frame/wbg.gif" bgcolor="#EEF4EA" class='title'>
            <div style='float:left'><span>快捷操作</span></div>
            <div style='float:right;padding-right:10px;'></div>
        </td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td height="30" colspan="2" align="center" valign="bottom"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                    <td width="15%" height="31" align="center"><img src="skin/images/frame/qc.gif" width="90" height="30" /></td>
                    <td width="85%" valign="bottom"><p>作者：李洋</p>
                        <p>指导老师：朱亚琨</p>
                        <p>所在学院：控制工程学院</p></td>
                </tr>
            </table></td>
    </tr>
</table>
<table width="98%" align="center" border="0" cellpadding="4" cellspacing="1" bgcolor="#CBD8AC" style="margin-bottom:8px">
    <tr bgcolor="#EEF4EA">
        <td colspan="2" background="skin/images/frame/wbg.gif" class='title'><span>系统基本信息</span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td width="25%" bgcolor="#FFFFFF">您的级别：</td>
        <td width="75%" bgcolor="#FFFFFF"><?php echo getRoleCNName($_SESSION['role'])?></td>
    </tr>
    <tr bgcolor="#FFFFFF">
        <td>今日时间：</td>
        <td><?php echo date("Y-m-d");?></td>
    </tr>
</table>
</body>
</html>