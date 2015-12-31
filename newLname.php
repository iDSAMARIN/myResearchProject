<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newLname = $_POST["newLname"];

mysql_query("UPDATE users SET lname = '$newLname' WHERE uname = '$uname'");

header("location:Profile.php");

?>