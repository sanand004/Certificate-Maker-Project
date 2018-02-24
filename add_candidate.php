<?php
include('common/connection.php');
$msg="";
if (isset($_POST['submit'])) {

$certificate_no=$_POST['certificate_no'];
$candidate_name=$_POST['candidate_name'];
$batch_name=$_POST['batch_name'];

$regd_no=$_POST['regd_no'];
$course=$_POST['course'];
$grade=$_POST['grade'];
$centre=$_POST['centre'];
$place=$_POST['place'];
$dateFrom=$_POST['dateFrom'];
$dateTo=$_POST['dateTo'];
$today=date('d-m-Y');

$add_candidate_query=mysql_query("INSERT INTO candidate_details(certificate_no,candidate_name,regd_no,batch_no,course,grade,centre,place,dateFrom,dateTo,date) values('$certificate_no','$candidate_name','$batch_name','$regd_no','$course','$grade','$centre','$place','$dateFrom','$dateTo','$today')");
		
		if($add_candidate_query)
		{
			$msg="Candidate Added Successfully";
		}
		else
		{
			$msg="Something went Wrong";
			
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
//include('dateTime.php');
?>

<!-- Main -->
					<div id="main">
						<div class="inner">
							<!-- Form -->
                            <br>
								<section>
                                <?php echo $msg; ?>
									<h2>Add candidate</h2>
									<form method="post" action="add_candidate.php">
										<div class="row uniform">
											
                                            <div class="6u 12u$(xsmall)">
												<input type="text" name="candidate_name" id="demo-name" value="" placeholder="Candidate Name" required />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="certificate_no" id="demo-email" value="" placeholder="Certificate No" required />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="text" name="batch_name" id="demo-email" value="" placeholder="Batch Name" required />
											</div>
                                            <div class="6u$ 12u$(xsmall)">
												<input type="text" name="regd_no" id="demo-email" value="" placeholder="Registration No" required />
											</div>
                                            <div class="6u$ 12u$(xsmall)">
												<input type="text" name="course" id="demo-email" value="" placeholder="Course" required />
											</div>
                                            <div class="6u$ 12u$(xsmall)">
												<input type="text" name="grade" id="demo-email" value="" placeholder="Grade" required />
											</div>
                                            <div class="6u$ 12u$(xsmall)">
												<input type="text" name="centre" id="demo-email" value="" placeholder="Centre" required />
											</div>
                                             <div class="6u$ 12u$(xsmall)">
												<input type="text" name="place" id="demo-email" value="" placeholder="Place" required />
											</div>
                                             <div class="6u$ 12u$(xsmall)">
												<input type="text" name="dateFrom" id="demo-email" value="" placeholder="Date From" required />
											</div>
                                             <div class="6u$ 12u$(xsmall)">
												<input type="text" name="dateTo" id="demo-email" value="" placeholder="Date To" required/>
											</div>
                                            											<div class="12u$">
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" name="submit" value="Add Candidate" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
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
