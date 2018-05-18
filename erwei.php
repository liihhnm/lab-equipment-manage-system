<?php
session_start();
include_once 'conn.php';
include 'phpqrcode.php';
$id=$_GET["id"];
QRcode::png($id,false,'M',6,false);
?>

