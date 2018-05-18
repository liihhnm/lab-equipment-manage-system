<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<link rel="stylesheet" href="skin/css/base.css" type="text/css" />
<link rel="stylesheet" href="skin/css/menu.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
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
        <dt onClick='showHide("items1_1")'><b>个人资料管理</b></dt>
        <dd style='display:block' class='sitem' id='items1_1'>
          <ul class='sitemu'>
            <li>
              <div class='items'>
                <div class='fllct'><a href='yonghuzhuce_updt.php' target='main'>个人信息修改</a></div>
              </div>
            </li>
            
          </ul>
        </dd>
      </dl>
      <!-- Item 1 End -->
      <!-- Item 2 Strat -->
      <dl class='bitem'>
        <dt onClick='showHide("items2_1")'><b>器材借取管理</b></dt>
        <dd style='display:block' class='sitem' id='items2_1'>
          <ul class='sitemu'>
            <li><a href='tushuxinxi_list3.php' target='main'>器材查询借阅</a></li>
            <li><a href='jieyuejilu_list2.php' target='main'>借取记录管理</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <!--<dl class='bitem'>
        <dt onClick='showHide("items3_1")'><b>系统帮助</b></dt>
        <dd style='display:block' class='sitem' id='items3_1'>
          <ul class='sitemu'>
            <li><a href='http://www.865171.cn' target='main'>官方网站</a></li>
            <li><a href='http://www.865171.cn/admin-templates/' target='main'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items4_1")'><b>系统帮助</b></dt>
        <dd style='display:block' class='sitem' id='items4_1'>
          <ul class='sitemu'>
            <li><a href='http://www.865171.cn' target='main'>官方网站</a></li>
            <li><a href='http://www.865171.cn/admin-templates/' target='main'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items5_1")'><b>系统帮助</b></dt>
        <dd style='display:block' class='sitem' id='items5_1'>
          <ul class='sitemu'>
            <li><a href='http://www.865171.cn' target='main'>官方网站</a></li>
            <li><a href='http://www.865171.cn/admin-templates/' target='main'>更多后台模板</a></li>
          </ul>
        </dd>
      </dl>
	  
	  <dl class='bitem'>
        <dt onClick='showHide("items6_1")'><b>系统管理</b></dt>
        <dd style='display:block' class='sitem' id='items6_1'>
          <ul class='sitemu'>
            
            <li><a href='youqinglianjie_add.php' target='main'>友情连接添加</a></li>
            <li><a href='youqinglianjie_list.php' target='main'>友情连接查询</a></li>
            <li><a href='liuyanban_list.php' target='main'>留言管理</a></li>
            <li><a href='dx.php?lb=系统简介' target='main'>系统简介设置</a></li>
            <li><a href='dx.php?lb=系统公告' target='main'>系统公告设置</a></li>

          </ul>
        </dd>
      </dl>-->
      <!-- Item 2 End -->
	  </td>
  </tr>
</table>
</body>
</html>