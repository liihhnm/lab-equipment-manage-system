<?php
include_once 'constant.inc';

function getRoleCNName($englishName) {
    if (!$englishName)
        return "";
    else if ($englishName == 'manager')
        return "系统管理员";
    else if ($englishName == 'normalmanager')
        return "器材管理员";
    else if ($englishName == 'normaluser')
        return "普通用户";
    else
        return "";
}

function isManager($roleName) {
    if ($roleName == "manager")
        return true;
    else
        return false;
}

function hasManagerRight() {
    session_start();
    if (!empty($_SESSION['role']) && $_SESSION['role'] == constant("AUTH_MANAGER"))
        return true;
    else
        return false;
}

function noRightError() {
    echo "<script language = 'javascript'>alert('没有权限！');history.back();</script>";
}

function showErrorAndBack($error_msg) {
    echo "<script language = 'javascript'>alert('$error_msg');history.back();</script>";
}
?>