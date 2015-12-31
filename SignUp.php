<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Helping Hand: Sign Up</title>
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
  <div id="signup">
  <p>
  <?php
require('config.php');

echo "<h2>Sign Up!</h2>";

if(isset($_POST['submit'])){
	
	$email1 = $_POST['email1'];
	$email2 = $_POST['email2'];
	$pass1 = $_POST['pass1'];
	$pass2 = $_POST['pass2'];
	
	if($email1 == $email2){
		if($pass1 == $pass2){
				//All good
		
		$name = mysql_escape_string($_POST['name']);
		$lname = mysql_escape_string($_POST['lname']);
		$uname = mysql_escape_string($_POST['uname']);
		$email1 = mysql_escape_string($email1);
		$email2 = mysql_escape_string($email2);
		$pass1 = mysql_escape_string($pass1);
		$pass2 = mysql_escape_string($pass2);
		
		$pass1 = md5($pass1);
		
		$sql = mysql_query("SELECT * from users where uname = '$uname'");
		if(mysql_num_rows($sql) > 0){
			echo "Sorry that user already exists.";
			exit();
		}
		
		mysql_query("INSERT INTO users (id, name, lname, uname, email, pass) VALUES (NULL, '$name', '$lname', '$uname', '$email1', '$pass1')") or die(mysql_error());
		echo "Thank you for Signing Up!<br />";		
				
		}else{
			echo "Sorry your passwords do not match.<br />";
			exit();
		}
	}else{
		echo "Sorry your email's do not match.<br />";	
		exit();
	}

}else{
$form = <<<EOT
<form action="SignUp.php" method="POST">
<table align="center">
	<TR>
	<TD>First Name: </TD>
	<TD><input type="text" name="name" />
	</TD>
	</TR>
	<TR>
	<TD>Last Name:  </TD>
	<TD>
	<input type="text" name="lname" />
	</TD>
	</TR>
	<TR>
	<TD>Username:   </TD>
	<TD><input type="text" name="uname" />
	</TD>
	<TR>
	<TD>Email: </TD>
	<TD><input type="text" name="email1" />
	</TD>
	</TR>
	<TR>
	<TD>Confirm Email: </TD>
	<TD><input type="text" name="email2" />
	</TD>
	</TR>
	<TR>
	<TD>Password: </TD>
	<TD><input type="password" name="pass1" />
	</TD>
	</TR>
	<TD>Confirm Password: </TD>
	<TD><input type="password" name="pass2" />
	</TD>
	</TR>
	</TABLE>
	<br />
<input type="submit" value="Register" name="submit"/>
</form>
EOT;
}
?>
  <?php
  echo $form;
?>
  </div>
<div id="footer">Author: Daniel Samarin</div>
</div>
</div>
</body>
</html>
