
<?php

session_start();

if(!isset($_SESSION['login_user']))
header("location: index.php");
 include('common/connection.php');
 $msg="";
 
 
 
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Certificate | Report</title>
<link rel="stylesheet" href="css/main.css" />
</head>

<body onload="startTime()">
<!-- header -->
<img src="images/topcover.jpg" width="100%">
<?php
include('menu.php');
?>
<br>
<h3>Report</h3>
<form action="report.php" method="post">
<?php echo $msg; ?>
 <table>
 <tr>
 <td>
 <h3>Date</h3>
		<input type="text" name="dateFrom" id="datepicker" readonly>
     </td>
     <td>
        
        <h3>To Date</h3><input type="text" name="dateTo" id="datepicker2" readonly>  
</td>
<td width="60%">
        <p></p><input type="submit" name="date_submit" value="Generate" >  

</td>
</tr>
</table>
</form>

 <?php
 if (isset($_POST['date_submit'])) 
{
	if (empty($_POST['dateFrom'])|| empty($_POST['dateTo'])) 
	{
		$msg = "Please Fill The Fields.";
		
	}
	else
	{

	  $email = $_SESSION['login_user'];
	  $dateFrom=$_POST['dateFrom'];
	  $dateTo=$_POST['dateTo'];
 $dateFrom = date('Y-m-d', strtotime($dateFrom));
    $dateTo = date('Y-m-d', strtotime($dateTo));

$branchQuery = mysql_query("select * from logintable where email_id='$email'", $connection);
			  	$branchQuery_data=mysql_fetch_array($branchQuery);
				$department=$branchQuery_data['branch'];
//				echo $department;
 $w="";
 $warden_detail=mysql_query ("select * from wardens_details where email_id='$email'",$connection);
					$warden_info = mysql_fetch_array($warden_detail);
		/*			
		echo $warden_info['name'];
		echo $warden_info['email_id'];
		echo $warden_info['hostel'];
		*/
		$w=$warden_info['hostel'];
		
		$gen=$warden_info['gender'];
	
				

$report_query=mysql_query("select * from purpose_details where status>=2 AND hostel='$w' AND gender='$gen' ORDER BY id DESC",$connection);
	echo '<table>';
	echo '<tr>';
	echo '<th width="10%">Sl No</th>';
	echo '<th width="20%">Regd No</th>';
	echo '<th width="40%">Name</th>';
	echo '<th width="25%">Branch</th>';
	echo '<th width="25%">Year</th>';
	
	echo '<th>Email Id</th>';
	
	$sl_no=0;
		echo 'Leave Report From '.$dF=date('d-M-Y',strtotime($dateFrom));
		echo ' to '.$dT=date('d-M-Y',strtotime($dateTo));
		echo '<br><br>';
		//echo  $dateTo;

					while($report_data=mysql_fetch_array($report_query)):
	  $leave_date=$report_data['dateFrom'];
	  $regd_number=$report_data['registration_no'];
			  	$student_info_query=mysql_query ("select * from student_information where registration_no='$regd_number'",$connection);
			  	
				
				$student_info_data=mysql_fetch_array($student_info_query);
				$name=$student_info_data['name'];
				$year=$student_info_data['year'];
				$branch=$student_info_data['branch'];
				$year=$student_info_data['year'];
				
				//echo ' <form action="hod.php" method="post">';
				//echo ' <tr><td>'.$sl_no.'</td>';

				
				//echo $student_mail;
				//echo '<td><a href="student_info.php?name='.$student_mail.'">'.ucfirst($name).'</a></td>';


	//  $name=$student_info_data['name'];
	      $leave_date=date('Y-m-d', strtotime($leave_date));;
    
	   if (($leave_date > $dateFrom) && ($leave_date < $dateTo))
    {
					$sl_no++;	

		echo'<tr>';
		echo '<td>'.$sl_no.'</td>';
	//	echo '<td>'.$name."</td>";
		echo '<td>'.$report_data['registration_no']."</td>";
		echo '<td>'.ucfirst($name).'</td>';
		echo '<td>'.strtoupper($branch ).'</td>';
		echo '<td>'.$year."</td>";
		

		echo '<td>'.$report_data['email_id']."</td>";
		echo '</tr>';
	}
	

	
endwhile;
echo '</table>';
?>
<form action="warden_report_print.php" method="post">
<div style="display:none;" >
<input type="text" name="dateFrom"  value="<?php echo $dateFrom;?>" readonly >
						<input type="text" name="dateTo"  value="<?php echo $dateTo;?>" readonly >
					</div>	

                  <div id="morethanone" style="display:none">     
        
        </div>    

<?php

   echo '<input type="submit" name="submit" value="Print" >';
	   
	}
}

?>






</div>
<?php include('common/footer.php'); ?>
</body>
</html>

<!--<-- Date picker-->


<link rel="stylesheet" href="css/jquery-ui.css">
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {

$( "#datepicker" ).datepicker();
$( "#datepicker2" ).datepicker();
<!-- !Date picker-->

});
</script>
