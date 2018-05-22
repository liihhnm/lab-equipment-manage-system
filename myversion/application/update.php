<?php

include_once '../connection.php';
include_once '../constant.inc';
include_once '../utility.php';


$type = $_REQUEST['type'];
if ($type == 'password') {
    changePassword();
}

function changePassword() {
    session_start();
    $user_name = $_SESSION['username'];
    $old_password = $_REQUEST['old_password'];
    $new_password = $_REQUEST['new_password'];

    $query_res = mysql_query("select password from users where user_name = '$user_name'");
    if ($query_res && mysql_num_rows($query_res) != 0) {
        if ($old_password == mysql_result($query_res, 0, password)) {
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

?>