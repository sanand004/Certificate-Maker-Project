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

//include('dateTime.php');
?>

<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Table -->
                            
								<br>
								<section>
						<h3>Report</h3>
									<div class="table-wrapper">
										<table class="alt">
											<thead>
												<tr>
                                             
													<th>Date </th>
													<th>To Date</th>
													
													<th>Action</th>
													
													</tr>
											</thead>
											<tbody>
												
                                          <tr>
                                          <form action="excelReport.php" method="post">
                                          
                                          <td>	
                                          <input type="text" name="dateFrom" id="datepicker" readonly>
                                          </td>
                                          
                                          <td>
                                          	<input type="text" name="dateTo" id="datepicker2" readonly>
                                          </td>
                                          
                                          
                                          <td>
                                          <input type="submit" name="date_submit" value="Submit" >  
                                          </td>
                                          
                                          </form>
                                          </tr>
										</tbody>
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
