<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newUname = $_POST["newUname"];

mysql_query("UPDATE users SET uname = '$newUname' WHERE uname = '$uname'");

unset($_SESSION['CurrentUser']);
session_destroy();
header("location:LogIn.php");

?>