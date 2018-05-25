<?php

session_start();
header("content-type:text/html; charset=utf-8");
include_once 'connection.php';
include_once 'utility.php';

$user_name=$_POST['username'];
$pwd=$_POST['password'];
$role = $_POST['role'];

if (empty($user_name) || empty($pwd)) {
    echo "<script language = 'javascript'>alert('用户名或密码不能为空！');history.back()</script>";
} else {
    //connect and query user info
    $table = "users";
    $sql = "select * from $table where binary user_name = '" . $user_name ."' and role = '" . $role ."'";
    $query_res = mysql_query($sql, $connection);
    $row_count = mysql_num_rows($query_res);
    if (!$query_res) {
        echo "<script language = 'javascript'>alert('数据库查询失败！');history.back()</script>";
        exit;
    } elseif ($row_count <= 0) {
        echo "<script language = 'javascript'>alert('不存在的用户！');history.back()</script>";
        exit;
    } elseif ($row_count > 1) {
        //multi same user!
        echo "<script language = 'javascript'>alert('后台错误！请稍后再重试。');history.back()</script>";
        exit;
    } else {
        //judge password
        $row = mysql_fetch_assoc($query_res);
        if (getCryptPassword($pwd) != $row['password']) {
            echo "<script language='javascript'>alert('错误的密码！');history.back();</script>";
            exit;
        }

        $_SESSION['username']=$user_name;
        $_SESSION['role']=$role;
        echo "<script language = 'javascript'>location = 'home.php';</script>";
    }
}

?>