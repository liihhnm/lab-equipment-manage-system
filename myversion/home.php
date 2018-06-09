<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>器材管理系统</title>
    <style>
        body
        {
            scrollbar-base-color:#C0D586;
            scrollbar-arrow-color:#FFFFFF;
            scrollbar-shadow-color:#DEEFC6;
        }
    </style>


</head>

<?php
session_start();
if (empty($_SESSION['role'])) {
    echo "<script language='javascript'>alert('请先登录');location.href='index2.html';</script>";

}
?>

<frameset name = "parent" rows="60,*" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="top_frame.php" name="topFrame" scrolling="no">
    <frameset cols="180,*" name="btFrame" frameborder="NO" border="0" framespacing="0">
        <frame src="navigation.php" noresize name="menu" scrolling="yes">
        <frame src="initial_page.php" noresize name="main" scrolling="yes">
    </frameset>
</frameset>
<noframes>
    <body>您的浏览器不支持框架！</body>
</noframes>
</html>