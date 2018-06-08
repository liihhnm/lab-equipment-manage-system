<?php

include_once '../connection.php';
include_once '../constant.inc';
include_once '../utility.php';

if (!hasManagerRight()) {
    noRightError();
    exit;
}

$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$comeFrom = $_SERVER['HTTP_REFERER'];

//$userpass=md5($userpass);
if ($type == constant('USER_TYPE')) {
    deleteUser($id);
} else if ($type == constant('ITEM_TYPE')) {
    deleteItem($id);
} else {
    echo "<script language='javascript'>alert('未知操作！');location.href='$comeFrom';</script>";
}

function deleteUser($id) {
    $sql1 = "delete from user_info where user_id = $id";
    $sql2 = "delete from users where id = $id";

    if (hasMultiRole($id)) {
        $sql_arr = array($sql2);
    } else {
        $sql_arr = array($sql1, $sql2);
    }


    $query_res = operate_trans($sql_arr);
    global $comeFrom;
    if ($query_res) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}

function hasMultiRole($id) {
    $sql = "select * from users where id = $id";
    $user_name = mysql_result(mysql_query($sql), 0, 'user_name');
    $sql2 = "select * from users where user_name = '$user_name'";

    if (mysql_num_rows(mysql_query($sql2)) > 1) {
        return true;
    } else {
        return false;
    }
}

function deleteItem($id) {
    global $comeFrom;
    $subtype = $_REQUEST['subtype'];
    if ($subtype == 'attr') {
        deleteItemAttr($id);
    } elseif ($subtype == 'type') {
        deleteItemType($id);
    } else if ($subtype == 'record') {
        deleteRecord($id);
    } else if ($subtype == 'iteminfo') {
        deleteItemInfo($id);
    } else {
        echo "<script language='javascript'>alert('未知操作！');location.href='$comeFrom';</script>";
    }
}

function deleteItemAttr($id) {
    global $comeFrom;
    $attribute_key = $_REQUEST['key'];
    if (empty($attribute_key)) {
        showErrorAndBack("删除属性失败");
        exit;
    }
    $sql1 = "alter table item_info drop column $attribute_key";
    $sql2 = "delete from item_attribute where id = $id";
    $sql_arr = array($sql1, $sql2);

    if (operate_trans($sql_arr)) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}

function deleteItemType($id) {
    global $comeFrom;
    $sql = "delete from type_info where id = $id";
    if (mysql_query($sql)) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}

function deleteRecord($id) {
    global $comeFrom;
    $sql = "delete from borrow_record where id = $id";
    if (mysql_query($sql)) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}

function deleteItemInfo($id) {
    global $comeFrom;
    $sql = "delete from item_info where id = $id";
    if (mysql_query($sql)) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}
?>