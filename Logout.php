<?php
session_start();
unset($_SESSION['CurrentUser']);
session_destroy();
header("location:LogIn.php");
?>
