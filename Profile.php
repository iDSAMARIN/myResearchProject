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
<title>The Helping Hand: My Profile</title>
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
  <div id="profile">
<?php
	$logout = "<a href=". 'Logout.php' .">Log Out</a>";
	
	if(isset($_SESSION['CurrentUser'])){
		echo "<h2>Welcome, ". $_SESSION['CurrentUser'] . " $logout </h2>";
				
	}else {
		echo "You must be logged in to see this page!";
	}	
?>
  </div>
  <div id="settings">
  	<H3>User Settings</H3>
    <form action="newName.php" method="POST">
	<table align="center">
	<TR>
	<TD>Change First Name: </TD>
	<TD><input type="text" name="newName" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>
    
    <form action="newLname.php" method="POST">
	<TR>
	<TD>Change Last Name: </TD>
	<TD><input type="text" name="newLname" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>
    
    <form action="newEmail.php" method="POST">
	<TR>
	<TD>Change E-mail: </TD>
	<TD><input type="text" name="newEmail" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>    
    
  	<form action="newUsername.php" method="POST">
	<TR>
	<TD>Change Username: </TD>
	<TD><input type="text" name="newUname" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form> 
    
    <form action="newPass.php" method="POST">
	<TR>
	<TD>Change Password: </TD>
	<TD><input type="password" name="newPass" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>
    </TABLE>
    <hr />
    <H3>Account Info</H3>
    <?php
		require('config.php');
		
		$uname = ($_SESSION['CurrentUser']);
		$sql = mysql_query("SELECT name, lname, uname, email FROM users WHERE uname = '$uname'");
		while($row = mysql_fetch_array($sql)){
			echo "First Name: ". $row["name"];
			echo "<br />";
			echo "Last Name: ". $row["lname"];
			echo "<br />";
			echo "Username: ". $row["uname"];
			echo "<br />";
			echo "Email: ". $row["email"];
			echo "<br />";
		}
	?>
    <hr />
    *Changing Username or Password will terminate session and you will be required to log in with update information.
  </div>
  
  <div id="settings">
  <H3>Request Settings</H3>
  
    <form action="newTitle.php" method="POST">
	<table align="center">
	<TR>
    <TD>
    Request ID:
    </TD>
    <TD>
    <SELECT name = "request">
    <OPTION> </OPTION>
		<?php
        
        	$sql3 = mysql_query("SELECT ID FROM requests WHERE Name = '$uname'");
        	while($row = mysql_fetch_assoc($sql3))
			{
            	echo "<option>$row[ID]</option>";
       		}
        
        ?>
	</SELECT>
    </TD>
    <TD>Change Title: </TD>
	<TD><input type="text" name="newTitle" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>
    
    <form action="newBody.php" method="POST">
	<TR>
    <TD>
    Request ID:
    </TD>
    <TD>
    <SELECT name = "request">
    <OPTION> </OPTION>
		<?php
        
        	$sql3 = mysql_query("SELECT ID FROM requests WHERE Name = '$uname'");
        	while($row = mysql_fetch_assoc($sql3))
			{
            	echo "<option>$row[ID]</option>";
       		}
        
        ?>
	</SELECT>
    </TD>
    <TD>Change Body: </TD>
	<TD><textarea name="newBody" cols="21" rows="3"></textarea>
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>
    
    <form action="newAmount.php" method="POST">
	<TR>
    <TD>
    Request ID:
    </TD>
    <TD>
    <SELECT name = "request">
    <OPTION> </OPTION>
		<?php
        
        	$sql3 = mysql_query("SELECT ID FROM requests WHERE Name = '$uname'");
        	while($row = mysql_fetch_assoc($sql3))
			{
            	echo "<option>$row[ID]</option>";
       		}
        
        ?>
	</SELECT>
    </TD>
    <TD>Change Amount: </TD>
	<TD><input type="number" name="newAmount" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </form>    
    
    <form action="newURL.php" method="POST">
	<TR>
    <TD>
    Request ID:
    </TD>
    <TD>
    <SELECT name = "request">
    <OPTION> </OPTION>
		<?php
        
        	$sql3 = mysql_query("SELECT ID FROM requests WHERE Name = '$uname'");
        	while($row = mysql_fetch_assoc($sql3))
			{
            	echo "<option>$row[ID]</option>";
       		}
        
        ?>
	</SELECT>
    </TD>
    <TD>Change URL: </TD>
	<TD><input type="text" name="newURL" />
	</TD>
    <TD>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </table>
    </form>
    
  <HR />
  <h3>Your Requests</h3>
		<?php		
            $sql2 = mysql_query("SELECT ID, title FROM requests WHERE Name = '$uname'");
            while($rows = mysql_fetch_array($sql2)){
                echo "Request ID: ". $rows["ID"];
                echo "<br />";
                echo $rows["title"];
                echo "<br /><br />";
        
            }
        ?>
  <HR />
  <h3>Delete Request</h3>
    <form action="deleteRequest.php" method="POST">
    <Table align="center">
	<TR>
    <TD>
    Request ID:
    </TD>
    <TD>
    <SELECT name = "request">
    <OPTION> </OPTION>
		<?php
        
        	$sql3 = mysql_query("SELECT ID FROM requests WHERE Name = '$uname'");
        	while($row = mysql_fetch_assoc($sql3))
			{
            	echo "<option>$row[ID]</option>";
       		}
        
        ?>
	</SELECT>
	<input type="submit" value="Submit" name="submit"/>
    </TD>
    </TR>
    </table>
    </form>

  <br />
  </div>
<div id="footer">Author: Daniel Samarin</div>
</div>
</body>
</html>
