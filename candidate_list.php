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
						<h3>Candidate List</h3>
                        <?php
						$sl=0;
												$value=2;
													$sql="SELECT * FROM candidate_details ";
													$result=mysql_query($sql,$connection);
												$numrows=mysql_num_rows($result);
												if($numrows<1)
												echo "<center><h5>No Candidate details found in the Database</h5></center>";
												else
												{
												
						?>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
													<th>Sl</th>
													<th>Batch No</th>
                                                    <th>Certificate No</th>
													<th>Candidate Name</th>
													<th>Registration No</th>
                                                    <th>Course</th>
													<th>Grade</th>
													<th>Certificate</th>
													
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

													<td><?php echo $row['certificate_no']; ?></td>
													<td><?php echo $row['candidate_name']; ?></td>
													<td><?php echo $row['regd_no']; ?></td>
													<td><?php echo $row['course']; ?></td>
													<td><?php echo $row['grade']; ?></td>
                                                    <?php if($value==2) 
													{
														?>
                                                        
                      										<td><a href="createCertificate.php?cerID=<?php echo$row['certificate_no']; ?>"><input type="submit" value="Create"></a></td>
                                                        <?php } else {?>
                                                                <td><input type="submit" value="Created" class="special"></td>
                                                                <?php } ?>
                                                                
                                                                
										
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
