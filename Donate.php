<?php
session_start();
if (isset($_POST['submit'])){
header("location:Donate.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Helping Hand: Donate</title>
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
  <div id="donate">
    <?php
require('config.php');
		
$sql = mysql_query("SELECT * FROM requests ORDER BY id ASC");
$sql2 = mysql_query("SELECT ID FROM requests ORDER BY id ASC");
$find_comments = mysql_query("SELECT * FROM comments");

$id = 'ID';
$title ='Title';
$body = 'Body';
$amount = 'Amount';
$name = 'Name';
$rAmount = 'rAmount';
$image = 'Image';

$option = '';
	while ($row = mysql_fetch_assoc($sql2))
		{
			$option .= '<option>'.$row['ID'].'</option>';
		}
		
$form = <<<EOT
<form action="Donate.php" method="POST"> 
Request:
<SELECT name ="request">
<option> $option </option>
</SELECT>
<br /><br />Amount: <input type="number" name="amount"/>
<input type="submit" value="Donate" name="submit"/>
</form>
EOT;

$comment = <<<EOT
<form action="comment.php" method="POST"> 
Request:
<SELECT name ="request">
<option> $option </option>
</SELECT>
<br /><br />Comment: <br />
<textarea name="comment" cols="21" rows="3"></textarea><br />
<input type="submit" value="Submit" name="post"/>
</form>
EOT;



echo "<H2>Donate to a Cause!</H2><br />";
echo "<hr>";
while ($rows = mysql_fetch_assoc($sql)){
	echo 'Request: ' . $rows[$id];
	echo '<br /><br />' . $rows[$title];
	echo '<br /><br />' . $rows[$body];	
	echo '<br /><br />Username: ' . $rows[$name];
	echo '<br /><img src="' . $rows[$image] . '" style="width:169px;height:143px">'; 
	echo '<br />Amount Requested: ' . '$' . $rows[$amount];
	echo '<br />Recieved Amount: ' . '$' . $rows[$rAmount];		
	echo '</br /></br />';		

	if (isset($_POST['submit'])){
		$request = $_POST["request"];
		for ($rows[$id]; $rows[$id] <= $request; $rows[$id]++)
			if($request == $rows[$id]){
			$newAmount = $rows[$rAmount] + $_POST["amount"];
			mysql_query("UPDATE requests SET rAmount = '$newAmount' WHERE id = '$request'");
			}
		}

	echo '<hr>';
	}	
?>
  </div>
  <div id="donate">
  <?php
	echo "<h2> Donate</h2>";
  	echo $form;
	echo "<hr>";
	echo "<h2> Comment</h2>";
	echo $comment;
	echo "<hr>";
	
	while($row = mysql_fetch_assoc($find_comments))
	{
		$comment_name = $row['uname'];
		$comment_request = $row['request'];
		$comment_post = $row['comment'];
		echo "Request $comment_request <br /><br />";
		echo "$comment_name <br />";
		echo "$comment_post <br />";
		echo "<hr>";
	}

?>
  </div>
<div id="footer">Author: Daniel Samarin</div>
</div>
</body>
</html>
