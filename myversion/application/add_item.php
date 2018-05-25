<?php
session_start();
include_once '../connection.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>
<p>添加器材信息：</p>
<script language="javascript">
    function check()
    {
        <?php
        $sql="select * from item_attribute";
        $query=mysql_query($sql);
        $count=mysql_num_rows($query);
        for($i=0;$i<$count;$i++)
        {
        ?>
        if(document.form1.<?php echo mysql_result($query,$i,'attribute_key') ?>.value=="")
        {
            var info="请输入"+<?php echo "\"".mysql_result($query,$i,'attribute_describe')."\""?>+"!";
            alert(info);
            document.form1.<?php echo mysql_result($query,$i,'attribute_key') ?>.focus();
            return false;
        }
        <?php
        }
        ?>
    }
</script>
<form id="form1" name="form1" method="post" action="add.php">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#708090" style="border-collapse:collapse">
        <tr>
            <td>器材名称：</td>
            <td>
                <input name='item_name' type='text' id='item_name' value='' style='border:solid 1px #000000; color:#666666' />
            </td>
        </tr>
        <tr>
            <td>器材分类：</td>
            <td>
                <select name='item_type_id' id='item_type_id' >
                    <?php getMyOption("type_info","id", "type_name")?>
                </select>
            </td>
        </tr>
        <tr>
            <td>库存信息：</td>
            <td>
                <input name='amount' type='text' id='amount' value='' style='border:solid 1px #000000; color:#666666' />
            </td>
        </tr>
        <tr>
            <td>器材单价：</td>
            <td>
                <input name = 'item_price' id = 'item_price' value = '' style='border:solid 1px #000000; color:#666666'/>
            </td>
        </tr>
        <tr>
            <td>器材描述：</td>
            <td>
                <textarea name = 'item_describe' id = 'item_describe' style='border:solid 1px #000000; color:#666666'></textarea>
            </td>
        </tr>
        <?php
        $sql="select * from item_attribute where is_default = 0";
        $query=mysql_query($sql);
        $rowscount=mysql_num_rows($query);
        for($i=0;$i<$rowscount;$i++)
        {
            echo "<tr>";
            $name=mysql_result($query,$i,'attribute_describe');
            $id=mysql_result($query,$i,'attribute_key');
            echo "<td>".$name.":"."</td>";
            echo "<td>"."<input name='$id' type='text' value='' style='border:solid 1px #000000; color:#666666' id='$id'>"."</td>";
            echo "</tr>";
        }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td>
                <input type="submit" name="Submit" value="添加" onclick="return check();"  class="btn btn-primary"/>
                <input type="reset" name="Submit2" value="重置"  class="btn btn-primary"/>
                <input type = "hidden" name = "type" value = "item"/>
                <input type = "hidden" name = "subtype" value = "item_info"/>
            </td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>
</body>
</html>

