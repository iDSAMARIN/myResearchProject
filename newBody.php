<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newBody = $_POST["newBody"];
$request = $_POST["request"];

mysql_query("UPDATE requests SET Body = '$newBody' WHERE ID = '$request'");

header("location:Profile.php");

?>