<?php
session_start(); // Starting Session
include('common/connection.php');
if(isset($_SESSION['login_user']))
{
		if($_SESSION['user_hint']=="admin")
header("location:hod.php"); // Redirecting To admin Page
else if($_SESSION['user_hint']=="user")
header("location:user.php"); // Redirecting To incharge Page

}
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
if (empty($_POST['email_id']) || empty($_POST['password'])) {
$error = "Email_id or Password is invalid";
}
else
{
// Define $username and $password
$email_id=$_POST['email_id'];
$password=$_POST['password'];
// To protect MySQL injection for Security purpose
$email_id = stripslashes($email_id);
$password = stripslashes($password);
$email_id = mysql_real_escape_string($email_id);
$password = mysql_real_escape_string($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from logintable where password='$password' AND email_id='$email_id'", $connection);

$rows = mysql_num_rows($query);
$hintValue=mysql_fetch_array($query);

//echo $a['hint'];
if ($rows == 1) 
//if(($username=="alok")&&($password=="alok"))
{
	$_SESSION['login_user']=$email_id; // Initializing Session
	$_SESSION['user_hint']=$hintValue['user_hint']; // Hint direction
if($hintValue['user_hint']=="admin")
header("location:admin.php"); // Redirecting To Admin Page
else if($hintValue['user_hint']=="user")
header("location:user.php"); // Redirecting To user Page


} else {
$emailQuery = mysql_query("select * from logintable where email_id='$email_id'", $connection);

$emailRows = mysql_num_rows($emailQuery);
if ($emailRows != 1) 
	$error = "Email ID is not Registerd";
	else
	$error = "Username or Password is invalid";
}
}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Certificate Maker</title>
<!-- Custom Theme files -->
<link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<!--header start here-->
<div class="login-form">
	<center>			<img src="images/group.png" width="10%"> </center>
            <h1>Login</h1>
			<div class="login-top">
			<form action="index.php" method="post">
				<div class="login-ic">
					<i ></i>
					<input type="text"  value="User name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}" name="email_id"/>
					<div class="clear"> </div>
				</div>
				<div class="login-ic">
					<i class="icon"></i>
					<input type="password"  value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}" name="password"/>
					<div class="clear"> </div>
				</div>
			<div style="display:inline;color:#F01215"><?php echo $error; ?></div>
				<div class="log-bwn">
					<input type="submit"  value="Login" name="submit" >
				</div>
                <div style="display:inline;color:#104105"><a href="forgot_password.php">Forgot Password</a></div>
				</form>
			</div>
			<p class="copy">Alok &copy; All Right Reserves</p>
</div>		
<!--header start here-->
</body>
</html>