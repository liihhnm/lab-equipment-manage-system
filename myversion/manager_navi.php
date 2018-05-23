<?php
session_start();

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>标题</title>
    <link rel="stylesheet" href="skin/css/base.css" type="text/css" />
    <link rel="stylesheet" href="skin/css/menu.css" type="text/css" />
    <script language='javascript'>var curopenItem = '1';</script>
    <script language="javascript" type="text/javascript" src="skin/js/frame/menu.js"></script>
    <base target="main" />
</head>

<body target="main">
<table width='99%' height="100%" border='0' cellspacing='0' cellpadding='0'>
    <tr>
        <td style='padding-left:3px;padding-top:8px' valign="top">
            <!-- Item 1 Strat -->
            <dl class='bitem'>
                <dt onClick='showHide("items1_1")'><b>用户管理</b></dt>
                <dd style='display:block' class='sitem' id='items1_1'>
                    <ul class='sitemu'>
                        <li>
                            <div class='items'>
                                <div class='fllct'><a href='application/manager.php' target='main'>系统管理员</a></div>
                            </div>
                        </li>
                        <li><a href='application/add_normaluser.php' target='main'>添加普通用户</a> </li>
                        <li><a href='application/list_normaluser.php' target='main'>管理普通用户</a> </li>
                        <li>
                            <div class='items'>
                                <div class='fllct'><a href='application/change_password.php' target='main'>修改密码</a></div>
                            </div>
                        </li>
                    </ul>
                </dd>
            </dl>
            <dl class='bitem'>
                <dt onClick='showHide("items5_1")'><b>借阅信息</b></dt>
                <dd style='display:block' class='sitem' id='items5_1'>
                    <ul class='sitemu'>
                        <li><a href='application/borrow_record.php' target='main'>借阅记录</a></li>
                        <!--
                        <li><a href='tushuxinxi_list2.php' target='main'>借阅统计</a></li>
                        -->
                    </ul>
                </dd>
            </dl>
            <!-- Item 1 End -->
            <!-- Item 2 Strat -->
            <dl class='bitem'>
                <dt onClick='showHide("items3_1")'><b>器材属性类别管理</b></dt>
                <dd style='display:block' class='sitem' id='items3_1'>
                    <ul class='sitemu'>
                        <li><a href = 'application/manage_item_attr.php' target = "main">器材属性管理</a></li>
                        <li><a href='application/manage_item_type.php' target='main'>器材类别管理</a></li>
                    </ul>
                </dd>
            </dl>

            <dl class='bitem'>
                <dt onClick='showHide("items4_1")'><b>器材信息管理</b></dt>
                <dd style='display:block' class='sitem' id='items4_1'>
                    <ul class='sitemu'>
                        <li><a href='application/list_item.php' target='main'>器材信息查询</a></li>
                        <li><a href='application/add_item.php' target='main'>器材信息添加</a></li>
                    </ul>
                </dd>
            </dl>
        </td>
    </tr>
</table>
</body>
</html>