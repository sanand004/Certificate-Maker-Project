<?php
if(isset($_REQUEST['sampleName']))
$sampleName=$_GET['sampleName'];
else
header('location:certificate.php');

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
<body>
<!--
<div>
<object data="images/test.pdf" type="application/pdf" width="100%" height="200">
alt : <a href="test.pdf">test.pdf</a>
</object>
</div>
-->
<?php
include('menu.php');
?>
<!-- Main -->
					<div id="main">
						<div class="inner">
                       				<h1>Edit Your Certificate</h1>
							<span class="image main"><img src="images/<?php echo $sampleName; ?>" alt="" /></span>
                            
                            </div>
                            </div>
							<!-- Form -->
								<section style="margin-left:5%;margin-right:5%">
									<h2>Fil the Details</h2>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Category -</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="4u 12u$(small)">
												<input type="radio" id="demo-priority-normal" name="demo-priority">
												<label for="demo-priority-normal">Normal</label>
											</div>
											<div class="4u$ 12u$(small)">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="6u 12u$(small)">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="6u$ 12u$(small)">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="12u$">
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Preview Certificate" class="special" /></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>




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
