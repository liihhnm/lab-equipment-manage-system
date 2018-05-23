<?php

include_once '../connection.php';
include_once '../constant.inc';
include_once '../utility.php';

$type = $_REQUEST['type'];
$comeFrom = $_SERVER['HTTP_REFERER'];

//$userpass=md5($userpass);
if ($type == constant('USER_TYPE')) {
    addUser();
} else if ($type == constant('ITEM_TYPE')) {
    addItem();
} else {
    showErrorAndBack('发生未知错误！');
    exit;
}

function addUser() {
    global $comeFrom;

    if (!hasManagerRight()) {
        noRightError();
        exit;
    }
    checkUserParamAndRepeat();

    $auth = $_REQUEST['auth'];
    $user_name = $_REQUEST['username'];
    $password = $_REQUEST['pwd1'];
    //get last id
    $sql = "select id from users order by id desc limit 1";
    $res = mysql_query($sql);
    $next_id = mysql_fetch_row($res)[0] + 1;
    //start insert transaction
    $sql1 = "insert into users(id, user_name, password, role) values($next_id, '$user_name', '$password', '$auth')";
    if ($auth == 'normaluser')
        $sql2 = getUserInfoSql($next_id);
    else
        $sql2 = "insert into user_info(user_id) values($next_id)";
    $sql_arr = array($sql1, $sql2);

    if (operate_trans($sql_arr)) {
        echo "<script language='javascript'>alert('添加成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('添加失败！！');location.href='$comeFrom';</script>";
    }
}

function addItem() {
    if (!hasManagerRight()) {
        noRightError();
        exit;
    }

    $subtype = $_REQUEST['subtype'];
    if (!empty($subtype)) {
        if ($subtype == 'item_attribute') {
            addItemAttr();
        } elseif ($subtype == 'item_type') {
            addItemType();
        } elseif ($subtype == 'item_info') {
            addItemInfo();
        }
    }
}

function getUserInfoSql($user_id) {
    $name = $_REQUEST['name'];
    $student_id = $_REQUEST['student_id'];
    $sex = $_REQUEST['sex'];
    $email = !$_REQUEST['email'] ? $_REQUEST['email'] : '';
    $phone = !$_REQUEST['phone'] ? $_REQUEST['phone'] : '';

    return "insert into user_info(user_id, name, student_id, sex, email, phone) 
             values($user_id, '$name', '$student_id', '$sex', '$email', '$phone')";
}

function checkUserParamAndRepeat() {
    $auth = $_REQUEST['auth'];
    if (empty($auth) || ($auth != 'manager' && $auth != 'normaluser')) {
        showErrorAndBack('添加失败');
        exit;
    }
    //check repeat
    $user_name = $_REQUEST['username'];
    #$sql = "select * from users where binary user_name = '" . $user_name ."' and role = '" . $auth ."'";
    $sql = "select * from users where binary user_name = '$user_name' and role = '$auth'";
    $res = mysql_query($sql);
    if ($res && mysql_num_rows($res) != 0) {
        showErrorAndBack('已经存在的用户名');
        exit;
    }
}

function checkValueExist($table, $attr, $value) {
    $query_res = mysql_query("select * from $table where $attr = '$value'");
    if ($query_res && mysql_num_rows($query_res) != 0)
        return true;
    else
        return false;
}

function addItemAttr() {
    global $comeFrom;
    $key = $_REQUEST['attribute_key'];
    if (empty($key)) {
        showErrorAndBack("属性不能为空");
        exit;
    }
    $describe = $_REQUEST['attribute_describe'];
    if (checkValueExist("item_attribute", "attribute_key", $key)) {
        showErrorAndBack("已经存在的属性！");
        exit;
    }
    $sql1 = "insert into item_attribute(attribute_key, attribute_describe) values('$key', '$describe')";
    $sql2 = "alter table item_info add column $key varchar(50) NOT NULL DEFAULT ''";
    $sql_arr = array($sql1, $sql2);

    if (operate_trans($sql_arr)) {
        echo "<script language='javascript'>alert('添加成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('添加失败！！');location.href='$comeFrom';</script>";
    }
}

function addItemType(){
    global $comeFrom;
    $type_name = $_REQUEST['type_name'];
    if (empty($type_name)) {
        showErrorAndBack("类型不能为空");
        exit;
    }
    $sql = "insert into type_info(type_name) values('$type_name')";

    if (mysql_query($sql)) {
        echo "<script language='javascript'>alert('添加成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('添加失败！！');location.href='$comeFrom';</script>";
    }
}

function addItemInfo() {
    global $comeFrom;
    $sql = "select attribute_key from item_attribute";
    $query_res = mysql_query($sql);
    if (!$query_res)
        showErrorAndBack("添加失败");

    if (checkValueExist('item_info', 'item_name', $_REQUEST['item_name']))
        showErrorAndBack("已经存在此器材");

    $row_count = mysql_num_rows($query_res);
    $sql="insert into item_info(";

    for ($i = 0; $i < $row_count; $i++) {
        $value[$i] = $_REQUEST[mysql_result($query_res, $i, 0)];
        $sql = $sql . mysql_result($query_res, $i, 0);
        if ($i != $row_count - 1)
            $sql = $sql . ', ';
    }
    $sql = $sql.") values(";

    for ($i = 0; $i < $row_count; $i++) {
        $sql = $sql . "'" . $value[$i] . "'";
        echo $value[$i] . "\n";
        if ($i != $row_count - 1)
            $sql = $sql . ', ';
    }
    $sql = $sql.")";
    echo $sql;
    if (mysql_query($sql)) {
        echo "<script language='javascript'>alert('添加成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('添加失败！！');location.href='$comeFrom';</script>";
    }
}
?>
