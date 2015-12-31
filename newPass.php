<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newPass = $_POST["newPass"];
$newPass = md5($newPass);

mysql_query("UPDATE users SET pass = '$newPass' WHERE uname = '$uname'");

unset($_SESSION['CurrentUser']);
session_destroy();
header("location:LogIn.php");

?>