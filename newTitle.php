<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$newTitle = $_POST["newTitle"];
$request = $_POST["request"];

mysql_query("UPDATE requests SET Title = '$newTitle' WHERE ID = '$request'");

header("location:Profile.php");

?>