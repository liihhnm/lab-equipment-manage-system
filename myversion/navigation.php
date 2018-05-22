<?php
session_start();
if($_SESSION['role']=="manager")
{
    echo "<script>javascript:location.href='manager_navi.php';</script>";
}
else if($_SESSION['role']=="normalmanager")
{
    echo "<script>javascript:location.href='normalmanager_navi.php';</script>";
}
else
{
    echo "<script>javascript:location.href='normaluser_navi.php';</script>";
}

?>