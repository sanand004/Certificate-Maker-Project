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

<title>Certificate | Admin Search</title>
<link rel="icon" href="images/cutmlogo.png" sizes="16x16">

</head>
<body onload="startTime()">


<img src="images/topcover.jpg" width="100%">

<?php 
include('menu.php');
//include('dateTime.php');
//include('user.php');
?>


<br>
<div style="padding-left:4%;display:inline">

<a href="?by=A">A</a> | <a href="?by=B">B</a> | <a href="?by=C">C</a> |
<a href="?by=D">D</a> | <a href="?by=E">E</a> | <a href="?by=F">F</a> |
<a href="?by=G">G</a> | <a href="?by=H">H</a> | <a href="?by=I">I</a> |
<a href="?by=J">J</a> | <a href="?by=K">K</a> | <a href="?by=L">L</a> |
<a href="?by=M">M</a> | <a href="?by=N">N</a> | <a href="?by=O">O</a> |
<a href="?by=Q">P</a> | <a href="?by=Q">Q</a> | <a href="?by=R">R</a> |
<a href="?by=S">S</a> | <a href="?by=T">T</a> | <a href="?by=U">U</a> |
<a href="?by=V">V</a> | <a href="?by=W">W</a> | <a href="?by=X">X</a> |
<a href="?by=Y">Y</a> | <a href="?by=Z">Z</a>
</div>
<div style="float:right;padding-right:4%">
<form method="post" action="search.php?go" id="searchform" style="display:inline">
<input type="text" name="name">
<input type="submit" name="submit" value="search">
</form>
</div>
<br>

<div style="padding-left:4%">
<?php
$sl=0;

if(isset($_GET['go'])){
	
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){

	$name=$_POST['name'];

	$sql="SELECT * FROM candidate_details WHERE certificate_no LIKE '%" . $name . "%' OR candidate_name LIKE '%" . $name ."%' OR regd_no LIKE '%" . $name ."%' OR course LIKE '%" . $name ."%'";
	

$result=mysql_query($sql,$connection);
$numrows=mysql_num_rows($result);
echo '<br>';
echo "<p><b>" .$numrows . "</b> Results found for <b>" . stripslashes($name) . "</b></p>";
echo '<br>';
//-create while loop and loop through result set
echo '
<table>
<tr>
<td width="43%">Sl</td>
<td width="44%">Name</td>
<td width="40%">Regd No</td>

</tr>
</table>

';
while($row=mysql_fetch_array($result)){
	$sl++;
	$FirstName =$row['candidate_name'];
	$Registration_no=$row['regd_no'];
	$ID=$row['certificate_no'];
	
		
//-display the result of the array

?>
<table>
<tr>
<td width="20%"><?php echo $sl; ?></td>
<td width="40%"><a href="createCertificate.php?cerID=<?php echo $ID ?>"><?php echo $FirstName; ?></a></td>
<td width="40%"><?php echo $Registration_no; ?></td>

</tr>
</table>
<?php
}
}
else{
echo "<p>Please enter a search query</p>";
}
}

if(isset($_GET['by'])){
$letter=$_GET['by'];

$sql="SELECT * FROM candidate_details WHERE certificate_no LIKE '%" . $letter . "%' OR candidate_name LIKE '%" . $letter ."%' OR regd_no LIKE '%" . $letter ."%' OR course LIKE '%" . $letter ."%'";
	$result=mysql_query($sql,$connection);
$numrows=mysql_num_rows($result);
echo "<br><p>" .$numrows . " Results found for <b>" . $letter . "</b></p>"; 

echo '<br>
<table>
<tr>
<th width="43%">Sl</th>
<th width="44%">Name</th>
<th width="40%">Regd No</th>

</tr>
</table>

';

echo '<br>';

//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){
	$sl++;
	$FirstName =$row['candidate_name'];
	$Registration_no=$row['regd_no'];
	$ID=$row['certificate_no'];
//-display the result of the array

?>
<table>
<tr>
<td width="20%"><?php echo $sl; ?></td>
<td width="40%"><a href="createCertificate.php?cerID=<?php echo $ID ?>"><?php echo $FirstName; ?>
</a></td><td width="40%"><?php echo $Registration_no; ?></td>

</tr>
</table>
<?php
}
}

?>
</div>
<?php include('common/footer.php'); ?>
</body>
</html>
