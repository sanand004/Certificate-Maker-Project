<?php
session_start(); // Starting Session
include('common/connection.php');
$error="";
if (isset($_POST['submit'])) {

if (empty($_POST['email_id'])){
$error = "Email_id or Password is invalid";
}
else
{
// Define $username and $password
$email_id=$_POST['email_id'];
// To protect MySQL injection for Security purpose
$email_id = stripslashes($email_id);
$email_id = mysql_real_escape_string($email_id);
$query = mysql_query("select * from logintable where email_id='$email_id'", $connection);

$rows = mysql_num_rows($query);
$passwordData=mysql_fetch_array($query);

if ($rows == 1) 
{
	$error = "Check Your mail for your password".$passwordData['password'];

} else {
	$error = "Email ID is not Registered";
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
            <h1>Forgot Password</h1>
			<div class="login-top">
				<form method="post" action="forgot_password.php">
				<div class="login-ic">
					<i ></i>
					<input type="text"  value="User name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}" name="email_id"/>
					<div class="clear"> </div>
				</div>
				
			<div style="display:inline;color:#0F8315"><?php echo $error; ?></div>
				<div class="log-bwn">
					<input type="submit"  value="Submit" name="submit" >
				</div>
				</form>
			</div>
			<p class="copy">Alok &copy; All Right Reserves</p>
</div>		
<!--header start here-->
</body>
</html>