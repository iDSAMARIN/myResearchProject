<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newName = $_POST["newName"];

mysql_query("UPDATE users SET name = '$newName' WHERE uname = '$uname'");

header("location:Profile.php");

?>