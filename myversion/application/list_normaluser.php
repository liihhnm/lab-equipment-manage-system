<?php
include_once 'read.php';
include_once '../constant.inc';

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>普通用户信息列表</title><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有用户列表</p>
<form id="form1" name="form1" method="post" action="">
    搜索
    :姓名:
    <input name="name" type="text" id="bh" />
    学号:
    <input name="student_id" type="text" id="mc" />
    <input type="submit" name="Submit" value="查询" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">
    <tr>
        <td width="25" bgcolor="#4682B4">序号</td>
        <td width="94" bgcolor='#4682B4'>用户名</td>
        <td width="94" bgcolor='#4682B4'>姓名</td>
        <td width="94" bgcolor='#4682B4'>学号</td>
        <td width="94" bgcolor='#4682B4'>性别</td>
        <td width="150" bgcolor='#4682B4'>Email</td>
        <td width="86" bgcolor='#4682B4'>电话</td>
        <td width="150" bgcolor="#4682B4">修改时间</td>
        <td width="70" bgcolor="#4682B4">操作</td>
    </tr>
    <?php
    $query = findNormalUserInfo($_POST["name"], $_POST["student_id"]);
    $rowscount=mysql_num_rows($query);
    if($rowscount == 0) {
        ?>
        <tr align="center">
            没有找到结果！
        </tr>
        <?php
    } else {
        $pagecurrent=$_GET["pagecurrent"];
        $pagelarge = constant("ITEM_PER_PAGE");
        $pagecount = ceil($rowscount / constant("ITEM_PER_PAGE"));
        if(empty($pagecurrent) || $pagecurrent<=0) {
            $pagecurrent = 1;
        } else if ($pagecurrent >= $pagecount) {
            $pagecurrent = $pagecount;
        }
        $first_item = ($pagecurrent - 1) * $pagelarge;
        $last_item = $pagecurrent * $pagelarge;
        if ($pagecurrent == $pagecount && $rowscount %  $pagelarge != 0)
            $last_item = $first_item + ($rowscount % $pagelarge);

        for($i = $first_item; $i < $last_item; $i++)
        {
            ?>
            <tr>
                <td width="25"><?php echo $i+1; ?></td>
                <td>
                    <?php echo mysql_result($query,$i, 'user_name');?>
                </td>
                <td>
                    <?php echo mysql_result($query,$i,'name');?>
                </td>
                <td>
                    <?php echo mysql_result($query,$i,'student_id');?>
                </td>
                <td>
                    <?php echo mysql_result($query,$i,'sex');?>
                </td>
                <td>
                    <?php echo mysql_result($query,$i,'email');?>
                </td>
                <td>
                    <?php echo mysql_result($query,$i,'phone');?>
                </td>
                <td width="120">
                    <?php echo mysql_result($query,$i,'add_time');?>
                </td>
                <td width="70">
                    <a href="delete.php?id=<?php echo mysql_result($query,$i,id);?>&type=user" onclick="return confirm('确认删除')">删除</a>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<p>共找到<?php
    echo $rowscount;
    ?>条普通用户数据,
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center">
    <a href="list_normaluser.php?pagecurrent=1">首页</a>,
    <a href="list_normaluser.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,
    <a href="list_normaluser.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>,
    <a href="list_normaluser.php?pagecurrent=<?php echo $pagecount;?>">末页</a>,
    当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>
<p>&nbsp; </p>


</body>
</html>

