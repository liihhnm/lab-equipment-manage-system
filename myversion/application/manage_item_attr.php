<?php
include_once 'read.php';
include_once '../constant.inc';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>添加器材属性： </p>
<script language="javascript">
    function check()
    {
        if(document.form1.attribute_key.value=="")
        {
            alert("请输入属性键值");
            document.form1.ziduanid.focus();
            return false;
        }
        if(document.form1.attribute_describe.value=="")
        {
            alert("请输入属性描述");
            document.form1.ziduanname.focus();
            return false;
        }
    }
</script>
<form id="form1" name="form1" method="post" action="add.php">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
        <tr>
            <td>属性键名：</td>
            <td>
                <input name='attribute_key' type='text' id='attribute_key' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*
                <input name = "type" type = "hidden" value = "item"/>
                <input name = "subtype" type = "hidden" value = "item_attribute"/>
            </td>
        </tr>
        <tr>
            <td>属性描述：</td>
            <td>
                <input name='attribute_describe' type='text' id='attribute_describe' value='' size='50' style='border:solid 1px #000000; color:#666666'  />&nbsp;*
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="Submit" value="添加" onclick="return check();"  class="btn btn-primary"/>
                <input type="reset" name="Submit2" value="重置" class="btn btn-primary"/>
            </td>
        </tr>
    </table>
</form>

<hr>

<p>已有器材属性列表：</p>
<form id="form1" name="form1" method="post" action="">
    搜索:</br>属性键名:
    <input name="key" type="text" id="bh" />
    属性描述：
    <input name = "describe" id = "describe"/>
    <input type="submit" name="Submit" value="查找"  class="btn btn-primary"/>
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
    <tr>
        <td width="40"  align="center" bgcolor="#4682B4">序号</td>
        <td bgcolor='#4682B4' align="center">属性键名</td>
        <td width="400" align="center" bgcolor="#4682B4">属性名称</td>
        <td width="150" align="center" bgcolor="#4682B4">操作</td>
    </tr>
    <?php
    $query = findItemAttr($_POST['key'], $_POST['describe']);
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
                <td width="40" align="center"><?php echo $i+1;?></td>
                <td align="center"><?php echo mysql_result($query,$i,'attribute_key');?></td>
                <td width="400" align="center">
                    <?php
                    echo mysql_result($query,$i,'attribute_describe');
                    ?></td>
                <td width="150" align="center">
                    <?php
                    $flag=mysql_result($query,$i,'is_default');
                    if($flag)
                    {
                        echo "不可更改";
                    }
                    else
                    {
                        $id=mysql_result($query,$i,'id');
                        $key = mysql_result($query, $i, 'attribute_key');
                        echo "<a href=\"delete.php?id=$id&type=item&subtype=attr&key=$key\" onclick=\"return confirm('确认删除？')\"  class=\"btn\">删除</a>";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>
</table>
<p>以上数据共<?php echo $rowscount;?>条,
    <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center">
    <a href="add_item_attr.php?pagecurrent=1">首页</a>,
    <a href="add_item_attr.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,
    <a href="add_item_attr.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>,
    <a href="add_item_attr.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>
<p>&nbsp; </p>
<p>&nbsp;</p>
</body>
</html>

