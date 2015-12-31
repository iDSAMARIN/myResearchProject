<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$comment = $_POST["comment"];
$request = $_POST["request"];

mysql_query("INSERT INTO comments VALUES( '', '$uname', '$request', '$comment')");
header("location: Donate.php");

?>