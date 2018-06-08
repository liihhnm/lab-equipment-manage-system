<?php

include_once '../connection.php';
include_once '../constant.inc';
include_once '../utility.php';


$type = $_REQUEST['type'];
$subtype = $_REQUEST['subtype'];
if ($type == 'password') {
    changePassword();
} else if ($type == 'item') {
    if ($subtype == 'record') {
        changeBorrowRecord();
    }
}

function changePassword() {
    session_start();
    $user_name = $_SESSION['username'];
    $old_password = $_REQUEST['old_password'];
    $new_password = $_REQUEST['new_password'];

    $query_res = mysql_query("select password from users where user_name = '$user_name'");
    if ($query_res && mysql_num_rows($query_res) != 0) {
        if (getCryptPassword($old_password) == mysql_result($query_res, 0, 'password')) {
            $new_password = getCryptPassword($new_password);
            $change_res = mysql_query("update users set password = '$new_password' where user_name = '$user_name'");
            if (!$change_res) {
                showErrorAndBack('更改密码失败！');
            } else {
                showErrorAndBack('修改密码成功！');
            }
        } else {
            showErrorAndBack('原密码不正确！');
        }
    } else {
        showErrorAndBack('没有找到用户！');
    }
}

//return operation
function changeBorrowRecord() {
    if (!hasManagerRight()) {
        noRightError();
        exit;
    }

    $id = $_REQUEST['id'];
    $borrow_amount = $_REQUEST['borrow_amount'];
    if (empty($id))
        showErrorAndBack('操作失败！');
    //find amount
    $item_id = fetchSingleValue("borrow_record", "id", "$id", "item_id");
    $left_amount = fetchSingleValue("item_info", "id", "$item_id", "amount");
    if ($item_id === false || $left_amount === false)
        showErrorAndback("操作失败！!");

    $total_amount = $borrow_amount + $left_amount;
    $sql1 = "update borrow_record set has_returned = 1, return_time = CURRENT_TIMESTAMP where id = $id";
    $sql2 = "update item_info set amount = $total_amount where id = $item_id";
    if (!operate_trans(array($sql1, $sql2))) {
        showErrorAndBack("操作失败！");
    } else {
        showErrorAndBack("操作成功！");
    }
}
?>