<?php
//数据库链接文件
$host='127.0.0.1';//数据库服务器
$user='root';//数据库用户名
$password='342134';//数据库密码
$database='manage_system';//数据库名

$connection = @mysql_connect($host, $user, $password) or die
("<script charset = 'UTF-8' language = 'javascript'>alert('数据库登录失败！');history.back()</script>");
@mysql_select_db($database) or die
("<script charset = 'UTF-8' language = 'javascript'>alert('错误的数据库！');history.back()</script>");
mysql_query("set names 'utf8'");

define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "342134");
define("DATABASE", "manage_system");

//util functions
function getoption($ntable,$nzd)
{
    $sql="select ".$nzd." from ".$ntable." order by id desc";
    $query=mysql_query($sql);
    $rowscount=mysql_num_rows($query);
    if($rowscount>0)
    {
        for ($fi=0;$fi<$rowscount;$fi++)
        {
            ?>
            <option value="<?php echo mysql_result($query,$fi,0);?>"><?php echo mysql_result($query,$fi,0);?></option>
            <?php
        }
    }
}
function getoption2($ntable,$nzd)
{
    ?>
    <option value="">请选择</option>
    <?php
    $sql="select ".$nzd." from ".$ntable." order by id desc";
    $query=mysql_query($sql);
    $rowscount=mysql_num_rows($query);
    if($rowscount>0)
    {
        for ($fi=0;$fi<$rowscount;$fi++)
        {
            ?>
            <option value="<?php echo mysql_result($query,$fi,0);?>" <?php

            if($_GET[$nzd]==mysql_result($query,$fi,0))
            {
                echo "selected";
            }
            ?>><?php echo mysql_result($query,$fi,0);?></option>
            <?php
        }
    }
}
function getitem($ntable,$nzd,$tjzd,$ntj)
{
    if($_GET[$tjzd]!="")
    {
        $sql="select ".$nzd." from ".$ntable." where ".$tjzd."='".$ntj."'";
        $query=mysql_query($sql);
        $rowscount=mysql_num_rows($query);
        if($rowscount>0)
        {

            echo "value='".mysql_result($query,0,0)."'";

        }
    }
}

function operate_trans($arr) {
    if (empty($arr))
        return false;

    mysql_query("BEGIN");
    $trans_res = true;
    foreach($arr as $sql) {
        $res = mysql_query($sql);
        if (!$res) {
            $trans_res = false;
            break;
        }
    }
    if ($trans_res)
        mysql_query("COMMIT");
    else
        mysql_query("ROLLBACK");

    return $trans_res;
}

function getMyOption($table, $value, $option) {
    $sql = "select * from $table";
    $query_res = mysql_query($sql);
    if (!$query_res)
        return;
    $row_count = mysql_num_rows($query_res);
    for ($i = 0; $i < $row_count; $i++) {
        ?>
        <option value="<?php echo mysql_result($query_res, $i, $value);?>"><?php echo mysql_result($query_res, $i,$option);?></option>
        <?php
    }
}

?>