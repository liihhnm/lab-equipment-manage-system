<?php
include_once 'read.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>添加器材类别：</p>
<script language="javascript">
    function check()
    {
        if(document.form1.type_name.value=="") {
            alert("请输入类别");
            document.form1.type_name.focus();
            return false;
        }
    }
</script>
<form id="form1" name="form1" method="post" action="add.php">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
        <tr>
            <td>类别：</td>
            <td>
                <input name='type_name' type='text' id='leibie' value='' />&nbsp;*
                <input name = "type" type = "hidden" value = "item"/>
                <input name = "subtype" type = "hidden" value = "item_type"/>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="Submit" value="添加" onclick="return check();"  class="btn btn-primary"/>
                <input type="reset" name="Submit2" value="重置"  class="btn btn-primary"/>
            </td>
        </tr>
    </table>
</form>

<hr>

<p>器材类别列表：</p>
<form id="form1" name="form1" method="post" action="">
    搜索:</br>类别:
    <input name="type_name" type="text" id="bh" />
    <input type="submit" name="Submit" value="查找" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
    <tr>
        <td width="25" bgcolor="#4682B4">序号</td>
        <td width = "240" bgcolor='#4682B4' align = "center">类别</td>
        <td width="240" align="center" bgcolor="#4682B4">添加时间</td>
        <td width="70" align="center" bgcolor="#4682B4">操作</td>
    </tr>
    <?php
    $query = findItemType($_POST['type_name']);
    $rowscount = mysql_num_rows($query);
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
                <td width="25"><?php
                    echo $i+1;
                    ?></td>
                <td align="center"><?php echo mysql_result($query,$i,'type_name');?></td>
                <td width="120" align="center"><?php
                    echo mysql_result($query,$i,'add_time');
                    ?></td>
                <td width="70" align="center">
                    <a href="delete.php?id=<?php
                    echo mysql_result($query,$i,"id");
                    ?>&type=item&subtype=type" onclick="return confirm('真的要删除？')" class="btn">删除</a>

                    <a href="shangpinleibie_updt.php?id=<?php
                    echo mysql_result($query,$i,"id");
                    ?>"  class="btn">修改</a></td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<p>以上数据共<?php
    echo $rowscount;
    ?>条,
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center">
    <a href="manage_item_type.php?pagecurrent=1">首页</a>,
    <a href="manage_item_type.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,
    <a href="manage_item_type.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>,
    <a href="manage_item_type.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第
    <?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>


<p>&nbsp;</p>
</body>
</html>

