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
    delete_item($id);
} else {
}

function deleteUser($id) {
    $sql1 = "delete from user_info where user_id = $id";
    $sql2 = "delete from users where id = $id";
    $sql_arr = array($sql1, $sql2);

    $query_res = operate_trans($sql_arr);
    global $comeFrom;
    if ($query_res) {
        echo "<script language='javascript'>alert('删除成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('删除失败！');location.href='$comeFrom';</script>";
    }
}

?>