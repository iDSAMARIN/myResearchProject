<?php
session_start();

require('config.php');

$uname = ($_SESSION['CurrentUser']);
$request = $_POST["request"];

mysql_query("DELETE FROM requests WHERE ID = '$request'");

header("location:Profile.php");

?>