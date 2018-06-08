<?php
session_start();
include_once '../connection.php';
include_once '../utility.php';
include_once 'read.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>借取记录</title>
    <script language="javascript" src="js/Calendar.js"></script>
    <link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>借取记录列表：</p>
<form id="form1" name="form1" method="post" action="">
    搜索: 器材名称：
    <input name="item_name" type="text" id="qicainame" size="15" />
    器材分类：
    <select name="item_type_id" id="qicaifenlei">
        <option value="">所有</option>
        <?php getMyOption("type_info","id", "type_name")?>
    </select>
    借取人：
    <input name="name" type="text" id="jiename" size="15" />
    借取学号：
    <input name="student_id" type="text" id="stu_number" size="15" />
    是否归还：
    <select name='has_returned' id='isguihuan' style='border:solid 1px #000000; color:#666666'>
        <option value="">所有</option>
        <option value="2">否</option>
        <option value="1">是</option>
    </select>
    <input type="submit" name="Submit" value="查找"   class="btn btn-primary"/>
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
    <tr>
        <td width="35" bgcolor="#4682B4">序号</td>
        <td bgcolor='#4682B4'>器材名称</td>
        <td bgcolor='#4682B4'>器材分类</td>
        <td bgcolor='#4682B4'>借取人</td>
        <td bgcolor='#4682B4'>借取学号</td>
        <td bgcolor='#4682B4'>借取数量</td>
        <td bgcolor='#4682B4'>是否归还</td>
        <td bgcolor='#4682B4'>借用时间</td>
        <td bgcolor='#4682B4'>归还时间</td>
        <td width="70" align="center" bgcolor="#4682B4">操作</td>
    </tr>
    <?php
    $query = findBorrowRecord($_REQUEST['item_name'], $_REQUEST['item_type_id'],
        $_REQUEST['name'], $_REQUEST['student_id'], $_REQUEST['has_returned']);
    $rowscount=mysql_num_rows($query);
    if($rowscount==0)
    {}
    else
    {
        $pagelarge=30;//每页行数；
        $pagecurrent=$_GET["pagecurrent"];
        if($rowscount%$pagelarge==0)
        {
            $pagecount=$rowscount/$pagelarge;
        }
        else
        {
            $pagecount=intval($rowscount/$pagelarge)+1;
        }
        if($pagecurrent=="" || $pagecurrent<=0)
        {
            $pagecurrent=1;
        }
        if($pagecurrent>$pagecount)
        {
            $pagecurrent=$pagecount;
        }
        $ddddd=$pagecurrent*$pagelarge;
        if($pagecurrent==$pagecount)
        {
            if($rowscount%$pagelarge==0)
            {
                $ddddd=$pagecurrent*$pagelarge;
            }
            else
            {
                $ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
            }
        }
        for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
        {
            ?>
            <tr>
                <td width="25"><?php echo $i+1;?></td>
                <td><?php echo mysql_result($query,$i,'item_name');?></td>
                <td><?php echo mysql_result($query,$i,'type_name');?></td>
                <td><?php echo mysql_result($query,$i,'name');?></td>
                <td><?php echo mysql_result($query,$i,'student_id');?></td>
                <td><?php echo mysql_result($query,$i,'borrow_amount');?></td>
                <td><?php echo hasReturnToCN(mysql_result($query,$i,'has_returned'));?></td>
                <td width="120" align="center"><?php echo mysql_result($query,$i,"add_time");?></td>
                <td width="120" align="center"><?php echo mysql_result($query,$i,"return_time");?></td>
                <td width="70" align="center">
                    <?php
                    if(mysql_result($query,$i,'has_returned') != 1)
                    {
                        ?>
                        <a href="update.php?id=<?php
                        echo mysql_result($query,$i,"id");
                        ?>&type=item&subtype=record&borrow_amount=<?php
                        echo mysql_result($query, $i, "borrow_amount");
                        ?>" onclick="return confirm('确定要执行此操作？')"  class="btn">归还</a>
                        <?php
                    }
                    else
                    {
                        ?>
                        <a href="delete.php?id=<?php
                        echo mysql_result($query,$i,"id");
                        ?>&type=item&subtype=record" onclick="return confirm('真的要删除？')"  class="btn">删除</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<p>以上数据共<?php
    echo $rowscount;
    ?>条,
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" style='border:solid 1px #000000; color:#666666' />
</p>
<p align="center"><a href="jieyuejilu_list2.php?pagecurrent=1">首页</a>, <a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="jieyuejilu_list2.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

