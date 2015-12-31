<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newEmail = $_POST["newEmail"];

mysql_query("UPDATE users SET email = '$newEmail' WHERE uname = '$uname'");

header("location:Profile.php");

?>