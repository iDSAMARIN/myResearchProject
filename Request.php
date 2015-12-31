<?php
session_start();
if(!isset($_SESSION['CurrentUser'])){
	header("location:LogIn.php");
} else {
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Helping Hand: Request</title>
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
    <H2>Request Help!</H2>

<?php
require('config.php');

$form = <<<EOT
<form action="Request.php" method="POST">
<table align="center">
	<TR>
	<TD>Title: </TD>
	<TD><input type="text" name="title" /></TD>
	</TR>
	<TR>
	<TD>Description: </TD>
	<TD><textarea name="body" cols="21" rows="3"></textarea></TD>
	</TR>
	<TR>
	<TD>Amount:   </TD>
	<TD><input type="number" name="amount" /></TD>
	</TR>
	<TR>
	<TD>Image URL: </TD>
	<TD><input type ="text" name="image" /></TD>
	</TR>
	</TABLE>
	<br />
<input type="submit" value="Submit" name="submit"/>
</form>
EOT;

if(isset($_POST['submit'])){
	
	if(!empty($_POST['title']) && !empty($_POST['body'])){
		
		$title = $_POST['title'];
		$body = $_POST['body'];
		$amount = $_POST['amount'];
		$uname = ($_SESSION['CurrentUser']);
		$rAmount = 0;
		$image =  mysql_escape_string($_POST['image']);
		
		mysql_query("INSERT INTO requests (id, Name, Title, Amount, rAmount, Body, Image) VALUES (NULL, '$uname', '$title', '$amount', '$rAmount', '$body', '$image')") or die(mysql_error());
		echo "Your request has been submited!<br />";		

	}else{
		echo "Please fill in all fields.<br /><br />";
			}
}
echo $form;

?>
<br /><br />
</div>

<div id="footer">Author: Daniel Samarin</div>
</div>
</body>
</html>
