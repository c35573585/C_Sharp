<?php
session_start();
session_destroy();
header('location:login.html');
ob_end_flush();
echo "<h1>登出成功</h1>";
?>