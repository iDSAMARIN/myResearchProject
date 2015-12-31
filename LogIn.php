<?php
session_start();
if(isset($_SESSION['CurrentUser'])){
	header("location:Profile.php");
} else {
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Helping Hand: Log In</title>
<link href="Styles/main.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="wrapper">
  <header id="top">
    <h1>The Helping Hand</h1>
    <div id="mainnav">
      <ul>
        <li><a href="HomePage.php">Home</a></li>
        <li><a href="Request.php">Request</a></li>
        <li><a href="Donate.php">Donate</a></li>
        <li><a href="Profile.php">Profile</a></li>
        <li><a href="LogIn.php">Log In</a></li>
        <li><a href="SignUp.php">Sign Up</a></li>
      </ul>
    </div>
  </header>
  <div id="login">
  <?php
require('config.php');

if(isset($_POST['submit'])){
	$uname = mysql_escape_string($_POST['uname']);
	$pass = mysql_escape_string($_POST['pass']);
	$pass = md5($pass);
	
	$sql = mysql_query("Select * from users where uname = '$uname' AND pass = '$pass'");
	if(mysql_num_rows($sql) > 0){
		$_SESSION['CurrentUser'] = $uname;
		echo "You are now logged in. <br /> <br />";
		exit();
	}else{
		echo "Wrong Username / Password combination. <br /> <br />";
	}




}else{



$form = <<<EOT
<form action="LogIn.php" method="post">
<Table align="center">
<TR>
<TD>Username: </TD><TD><input type="text" name="uname" /></TD>
</TR>
<TR>
<TD>Password: </TD><TD><input type="password" name="pass" /></TD>
</TR>
</TABLE>
<input type="submit" name="submit" value="Log In" />
</form>	
EOT;

}

  echo $form;
?>
  </div>
  

<div id="footer">Author: Daniel Samarin</div>
</div>
</body>
</html>
