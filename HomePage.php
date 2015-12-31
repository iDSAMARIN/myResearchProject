<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Helping Hand: Home</title>
<link href="Styles/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="thispage" id="wrapper">
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
  <div id="hand"><img src="Images/helping-hands-clipart-helping-hand.jpg" alt="hand" width="169" height="143" border="0" /></div>
  <div id="text">
    <p>Welcome to The Helping Hand! </p>
    <p>A website where you can recieve help through crowd funding from many willing donors!<br />
    </p>
  </div>
  
  <div id="gallery">
    <div class="img">
      <img src="Images/arm.jpg" alt"arm" width="110" height="90" />
      <div class="desc">Need Help With Doctor Bills</div>
      </div>

   	<div class="img">
      <img src="Images/college.png" alt"college" width="110" height="90" />
      
      <div class="desc">Help Me Attend College</div>
      </div>
     
  	<div class="img">
      <img src="Images/surgery.jpg" alt"surgery" width="110" height="90" />
      <div class="desc">Need Life Saving Surgery</div>
      </div>  
      
  	<div class="img">
      <img src="Images/house.jpg" alt"house" width="110" height="90" />
      <div class="desc">Rebuilding After House Fire</div>
      </div>
      
  </div>
  <div id="footer">Daniel Samarin</div>
</div>	
</body>
</html>
