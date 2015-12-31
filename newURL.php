<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newURL = $_POST["newURL"];
$request = $_POST["request"];

mysql_query("UPDATE requests SET Image = '$newURL' WHERE ID = '$request'");

header("location:Profile.php");

?>