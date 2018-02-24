<?php
session_start();
include('common/connection.php');
if(!isset($_SESSION['login_user']))
header("location: index.php");

if(isset($_SESSION['login_user']))
if(($_SESSION['user_hint'])!="user")
header("location: index.php");


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/menustyles.css">
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/dashboard.css" rel="stylesheet">
<link href="css/dashboardstyle.css" rel='stylesheet' type='text/css' />

<title>Certificake Maker</title>
<link rel="icon" href="images/cutmlogo.png" sizes="16x16">

</head>
<body onload="startTime()">


<img src="images/topcover.jpg" width="100%">


<?php 
include('menu.php');
//include('dateTime.php');
?>

<html>
<body>
<style>
#close{
    float:right;
    display:block;
	margin-top:-28px;
    margin-right:500px;
    clear:left;
}
</style>
<center>
						<h2><b>Choose The Required Design</b></h2>
						
						<br>
						<br>
						<ul>
						
						<li><h3><b>GTET Adani</b></li></h3><a href="gtet.php"><button type="button" id="close"><b>Click Here</button></a></b>
						<br>
							<br>
						<li><h3><b>TVS</b></li></h3><a href="createBatchCertificate_voc.php"><button type="button" id="close"><b>Click Here</button></a></b>
						<br>
							<br>
						<li><h3><b>Vikas Samiti</b></li></h3><a href="createBatchCertificate_voc.php"><button type="button" id="close"><b>Click Here</button></a></b>
						<br>
							<br>
						<li><h3><b>Sadhan College</b></li></h3><a href="createBatchCertificate_voc.php"><button type="button" id="close"><b>Click Here</button></a></b>
						<br>
							<br>
					
						
						</ul>
						</center>


</body>
</html>
