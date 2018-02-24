<?php
session_start();
include('common/connection.php');
$msg="";
$sql_zero="SELECT * FROM batch_details ";
$result_zero=mysql_query($sql_zero,$connection);
$numrows_zero=mysql_num_rows($result_zero);
if($numrows_zero<=0)
$update_zero_query=mysql_query("UPDATE `certificate_table` SET `candidate_no`=0");


if(isset($_REQUEST['batch_id']))
{
	   $batch_id=$_GET['batch_id'];
	  $del_batch=mysql_query ("DELETE FROM batch_details where batch_no='$batch_id'",$connection);
	  $del_batch_candidate=mysql_query ("DELETE FROM candidate_details where batch_no='$batch_id'",$connection);
		  
	  if($del_batch)
		{
			$msg= "Details Deleted successfully";
			
		}
			  else
		{
			$msg= "Something went Wrong !!";
		}
		
 }


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Certificate Maker</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

<img src="images/topcover.jpg" width="100%">

<?php 
include('menu.php');
include('common/connection.php');

//include('dateTime.php');
?>

<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Table -->
                            
								<br>
								<section>
						<h3>Batch List</h3>
                        <?php
																		$sl=0;
												$value=2;
													$sql="SELECT * FROM batch_details ";
													$result=mysql_query($sql,$connection);
												$numrows=mysql_num_rows($result);
												$numrows=mysql_num_rows($result);
												if($numrows<1)
												echo "<center><h5>No Batch details found in the Database</h5></center>";
												else
												{

						?>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
                                             
													<th>Sl</th>
													<th>Batch No</th>
													
													<th>Action</th>
													
													</tr>
											</thead>
											<tbody>
												<?php 
												
												
													
												while($row=mysql_fetch_array($result)):
												$sl++;

												?>
                                              
                                                <tr>
                                               
                                                <td><?php echo $sl; ?></td>
													<td><?php echo $row['batch_no']; ?></td>
													
                                                  
                      										<td>
<a href="batch_candidate_list.php?batch_id=<?php echo $row['batch_no']; ?>">
<input type="submit" value="Expand">
</a>
<?php 
$batch_id_2=$row['batch_no'];
$button_option="SELECT * FROM batch_details WHERE batch_no='$batch_id_2'";
				$button_result=mysql_query($button_option,$connection);
				$button_details=mysql_fetch_array($button_result);
	$dis="";			
				$buttonStatus=$button_details['status'];
if($buttonStatus!="yes")
{
	?>
<a href="1.php?batch_id=<?php echo $row['batch_no']; ?>">

<input type="submit" value="Edit Design" class="special"></a>
<?php
}
else
{
?>
<a href="createBatchCertificate_voc.php?batch_id=<?php echo $row['batch_no']; ?>">
<input type="submit" value="Go For Print" class="special"></a>
<?php
}
?>

<a href="batch_list.php?batch_id=<?php echo $row['batch_no']; ?>">
<input type="submit" value="Delete" onclick='return conf();' ></a>
<!--
<div style="display:inline">
<form action="batch_list.php" method="post">
<input type="text" hidden=""  name="bn">
<input type="submit" value="Delete" name="delete_submit">
</form>
  -->     </div>                                                         </td>
                                                               
                                                                
                                                                
										
												</tr>
<?php endwhile; 

												}//end of else
?>												
										</table>
									</div>
								</section>

                        
                            </div>
                            </div>
		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>
<?php 
include('common/footer.php');
?>
</html>
<script>



function conf()

{

	var con=confirm("Are you sure to delete Batch Details ?");

	if(con==true)

	{

		return true;

	}

	else

	{

		return false;	

	}

}



</script>