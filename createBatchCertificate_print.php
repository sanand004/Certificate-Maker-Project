<?PHP
if(isset($_REQUEST['batch_id']))
$batch_id=$_GET['batch_id'];
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
							<!-- Table -->
                            
								<br>
								<section>
						<h3>Print Batch Certificate</h3>
                        Note : You have already Save the Certificate Design for  <?php echo $batch_id; ?><br>
									<a href="printedCertificate/printAllBatch.php?batch_id=<?php echo $batch_id; ?>">
<input type="button" class="special" value="Click Here to print">
</a>

                                    
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
