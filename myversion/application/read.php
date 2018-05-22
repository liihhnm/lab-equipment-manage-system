<?php

include_once '../connection.php';
include_once '../utility.php';
include_once '../constant.inc';

function findNormalUserInfo($name, $student_id) {
    $baseSql = "select u.id, u.user_name, u.add_time, ui.name, ui.student_id, ui.sex, ui.email, ui.phone
                from users as u left join user_info as ui on u.id = ui.user_id 
                where u.role = 'normaluser' order by id";

    $sql = "select * from (" . $baseSql . ") as normaluserInfo where 1 = 1 ";
    if (!empty($name))
        $sql = $sql . "and normaluserInfo.name like '%$name%' ";
    if (!empty($student_id))
        $sql = $sql . "and normaluserInfo.student_id like'%$student_id%' ";

    return mysql_query($sql);
}

