<?php
session_start();
include_once '../connection.php';
$id=$_GET["id"];
?>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>&nbsp;</p>
<table  border="1" align="center" bordercolor="#708090" style="border-collapse:collapse">
    <?php
    $sql="select attribute_key, attribute_describe from item_attribute";
    $attr_query = mysql_query($sql);
    $count=mysql_num_rows($attr_query);
    $item_query = fetchSingleRow("item_info", "id", "$id");

    for($i=0;$i<$count;$i++)
    {
        $name=mysql_result($attr_query,$i,"attribute_describe");
        $key=mysql_result($attr_query,$i,"attribute_key");

        if ($key == 'item_type_id') {
            ?>
            <tr>
                <td width='11%' height=22><?php echo $name ?>:</td>
                <td width='39%' height="22">
                    <?php
                    $type_id = mysql_result($item_query, 0, "$key");
                    echo fetchSingleValue("type_info", "id", $type_id, "type_name");
                    ?>
                </td>
            </tr>
            <?php
        } else if ($key == 'item_picture') {
            ?>
            <tr>
                <td width='11%' height=22><?php echo $name ?>:</td>
                <td width='39%' height="22">
                    <img src='<?php echo mysql_result($item_query, 0, "$key"); ?>' width=228 height=215 border=0></a>
                </td>
            </tr>
    <?php
        } else {
            ?>
            <tr>
                <td width='11%' height=22><?php echo $name ?>:</td>
                <td width='39%' height="22"><?php echo mysql_result($item_query, 0, "$key"); ?></td>
            </tr>
            <?php
        }
    }
    ?>
    <tr>
        <td colspan=3 align=center>
            <input type=button name=Submit5 value=返回 onClick="javascript:history.back()"  class="btn btn-primary"/>
        </td>
    </tr>
</table>

</body>
</html>
