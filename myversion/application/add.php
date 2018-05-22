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
    add_user();
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
        $sql2 = getUserInfo($next_id);
    else
        $sql2 = "insert into user_info(user_id) values($next_id)";
    $sql_arr = array($sql1, $sql2);
    if (operate_trans($sql_arr)) {
        echo "<script language='javascript'>alert('添加成功！');location.href='$comeFrom';</script>";
    } else {
        echo "<script language='javascript'>alert('添加失败！！');location.href='$comeFrom';</script>";
    }
}

function getUserInfo($user_id) {
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
?>
