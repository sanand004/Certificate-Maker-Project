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
									<h2>Add Scheme</h2>
									<form method="post" action="#">
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Scheme Name" />
											</div>
											<div class="12u$">
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">- Select State-</option>
														  <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Sikkim">Sikkim</option>
                                      
													</select>
												</div>
											</div>
<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Add Scheme" class="special" /></li>
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
