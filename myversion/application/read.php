<?php

include_once '../connection.php';
include_once '../utility.php';
include_once '../constant.inc';

if (!empty($_REQUEST['test'])) {
    findBorrowRecord($_REQUEST['item_name'], $_REQUEST['item_type_id'],
        $_REQUEST['name'], $_REQUEST['student_id'], $_REQUEST['has_returned']);
}

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

function findItemAttr($key, $describe) {
    $sql = "select * from item_attribute where 1 = 1 ";
    if (!empty($key))
        $sql = $sql . "and attribute_key like '%$key%' ";
    if (!empty($describe))
        $sql = $sql . "and attribute_describe like '%$describe%' ";

    $sql = $sql . "order by is_default desc";

    return mysql_query($sql);
}

function findItemType($type_name) {
    $sql = "select * from type_info where 1 = 1 ";
    if (!empty($type_name))
        $sql = $sql . "and type_name like '%$type_name%'";

    return mysql_query($sql);
}

//user user_info type_info item_info borrow_record
//相关联表的连接，再过滤，然后再连接成一个目标表
//唉，我只想到了这种实现 真TM垃圾
function findBorrowRecord($item_name, $item_type_id, $name, $student_id, $has_returned) {
    $whole_sql = "select ub.name, ub.student_id, ub.has_returned, ub.borrow_amount, ub.return_time,
  ub.add_time, i.item_name, i.type_name
from
  (select u.name, u.student_id, br.item_id, br.has_returned, br.borrow_amount, br.return_time, br.add_time
   from
     (select ui.name, ui.student_id, ui.user_id
      from user_info as ui
      where name like '%%' and student_id like '%%') as u
     inner join
     (select br.item_id, br.user_id, br.has_returned, br.borrow_amount, br.return_time, br.add_time
      from borrow_record as br
      where has_returned = 0) as br
       on u.user_id = br.user_id) as ub
  inner join
  (select ii.id as item_id, ii.item_name, ti.type_name
   from item_info as ii left join type_info as ti
       on ii.item_type_id = ti.id
   where item_name like '%%' and item_type_id = 2) as i
    on ub.item_id = i.item_id;";



    $first = "select ub.name, ub.student_id, ub.has_returned, ub.borrow_amount, ub.return_time,
  ub.add_time, i.item_name, i.type_name
from
  (select u.name, u.student_id, br.item_id, br.has_returned, br.borrow_amount, br.return_time, br.add_time
   from
     (select ui.name, ui.student_id, ui.user_id
      from user_info as ui";
    $second = ") as u
     inner join
     (select br.item_id, br.user_id, br.has_returned, br.borrow_amount, br.return_time, br.add_time
      from borrow_record as br";
    $third = ") as br
       on u.user_id = br.user_id) as ub
  inner join
  (select ii.id as item_id, ii.item_name, ti.type_name
   from item_info as ii left join type_info as ti
       on ii.item_type_id = ti.id";
    $fouth = ") as i
    on ub.item_id = i.item_id order by ub.add_time desc;";

    $first_where = " where name like '%$name%' and student_id like '%$student_id%' ";
    if ($has_returned >= 1) {
        $second_where = " where has_returned = $has_returned ";
    } else {
        $second_where = "  ";
    }
    if (!empty($item_type_id)) {
        $third_where = " where item_name like '%$item_name%' and item_type_id = $item_type_id ";
    } else {
        $third_where = " where item_name like '%$item_name%' ";
    }
    //echo "$has_returned";
    $final_sql = $first . $first_where . $second . $second_where .$third . $third_where .$fouth;
    //echo "$final_sql";
    /*
     * if ($query_res = mysql_query($final_sql)) {
        while ($row = mysql_fetch_array($query_res)) {
            foreach ($row as $value) {
                echo $value . "\t";
            }
            echo "\n";
        }
        echo mysql_num_rows($query_res);
    } else
        echo "failed";
    */
    return mysql_query($final_sql);
}

?>

