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


<br>
<center>

<img src="images/cutmlogo.png" width="20%">
<form method="post" action="search.php?go" id="searchform">
<input type="text" name="name">
<input type="submit" name="submit" value="search">
</form>
<br>
<p>
<a href="search.php?by=A">A</a> | <a href="search.php?by=B">B</a> | <a href="search.php?by=C">C</a> |
<a href="search.php?by=D">D</a> | <a href="search.php?by=E">E</a> | <a href="search.php?by=F">F</a> |
<a href="search.php?by=G">G</a> | <a href="search.php?by=H">H</a> | <a href="search.php?by=I">I</a> |
<a href="search.php?by=J">J</a> | <a href="search.php?by=K">K</a> | <a href="search.php?by=L">L</a> |
<a href="search.php?by=M">M</a> | <a href="search.php?by=N">N</a> | <a href="search.php?by=O">O</a> |
<a href="search.php?by=Q">P</a> | <a href="search.php?by=Q">Q</a> | <a href="search.php?by=R">R</a> |
<a href="search.php?by=S">S</a> | <a href="search.php?by=T">T</a> | <a href="search.php?by=U">U</a> |
<a href="search.php?by=V">V</a> | <a href="search.php?by=W">W</a> | <a href="search.php?by=X">X</a> |
<a href="search.php?by=Y">Y</a> | <a href="search.php?by=Z">Z</a>

</p>
</center>

<?php include('common/footer.php'); ?>
</body>
</html>
