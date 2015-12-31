<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newAmount = $_POST["newAmount"];
$request = $_POST["request"];

mysql_query("UPDATE requests SET Amount = '$newAmount' WHERE ID = '$request'");

header("location:Profile.php");

?>