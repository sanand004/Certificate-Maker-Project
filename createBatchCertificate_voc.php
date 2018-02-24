<?php
session_start();
ob_start();
include('common/connection.php');
if(isset($_REQUEST['batch_id']))
$batch_id=$_GET['batch_id'];

$sql_date_batch="SELECT * FROM  batch_details where batch_no='$batch_id'";
$cdate_result=mysql_query($sql_date_batch,$connection);
$c_date_result=mysql_fetch_array($cdate_result);
 $cc_dd=$c_date_result['date'];
/*Creating Certificate pages */
$printDate=$_POST['printDate'];
if (isset($_POST['submit'])) {
$printDate=$_POST['newDate'];;
  $update_date_query=mysql_query("update batch_details SET date='$printDate' where batch_no='$batch_id' ");

	  $update_button_query=mysql_query("update batch_details SET status='yes' where batch_no='$batch_id' ");

	$sl=0;
	$sql="SELECT * FROM candidate_details where batch_no='$batch_id'  AND grade!='ABS' AND grade!='F'";

	$c_result=mysql_query($sql,$connection);
	$numrows=mysql_num_rows($c_result);
	
	while($c_row=mysql_fetch_array($c_result)):
	ob_start();

				$sl++;
	//			echo "<br>Alok".$sl;
	
				$cerID=$c_row['certificate_no'];
				
				$change_image_sql="SELECT * FROM certificate_table";
				$change_image_result=mysql_query($change_image_sql,$connection);
				$change_image_details=mysql_fetch_array($change_image_result);
				
				$leftLogo="../".$change_image_details['leftLogo'];
				$middleLogo="../".$change_image_details['middleLogo'];
				$rightLogo="../".$change_image_details['rightLogo'];
				$sign="../".$change_image_details['sign'];
				//$date=$change_image_details['date'];
				




				
				$sql="SELECT * FROM candidate_details where certificate_no='$cerID' AND grade!='ABS' AND grade!='F'";
				$result=mysql_query($sql,$connection);
				$row=mysql_fetch_array($result);
				$candidate_name=$row['candidate_name'];	
				$regd_no=$row['regd_no'];
				$course=$row['course'];
				$grade=$row['grade'];
				$centre=$row['centre'];
				$place=$row['place'];
				$dateFrom=$row['dateFrom'];
				$dateTo=$row['dateTo'];
				$date=$row['date'];

	
?>
<link rel="stylesheet" href="css/jquery-ui.css">
<style> 

@font-face {
    font-family: myFirstFont;
    src:url(../fonts/west.TTF);


}
.certificateStyle {
    font-family: myFirstFont;
	font-size:56px;
	margin-bottom:1%;
}
.fixedText
{
	font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-style:italic;
	font-size:20px;
}
input[type="text"]
{
    background: transparent;
    border: none;
	font-size:16px;
	font-weight:600;
	text-transform:uppercase;
	text-align:center;
	
	
}
.details
{
    background: transparent;
    border: none;
	font-size:18px;
	font-weight:600;
	text-transform:uppercase;
	text-align:center;
	
	
}

</style>
<script>

function infofun()

{

	//document.getElementById('info').style.display="none";
	document.getElementById('info2').style.display="none";

}

</script>


<div style="-webkit-print-color-adjust:exact;" >
<div style="border-style: groove;margin:3%;background-image:url(images/bgr1.png);background-repeat:no-repeat;;background-size:800px;background-position:center">
<div  style="border-style: ridge;margin:0.1%;" >
<div  style="margin:1%;">
<div  style="line-height:270%;">
<div style="float:left;display:inline">Certificate No :<?php echo $cerID; ?></div>
<br>

<div style="display:inline;"><img src="<?php echo $leftLogo; ?>" width="19%"></div>

<div style="margin-left:19%;display:inline;padding-right:19%"><img src="<?php echo $middleLogo; ?>" width="20%"></div>

<div style="display:inline;"><img src="<?php echo $rightLogo; ?>" width="19%"></div>
<center>

<div class="certificateStyle">C E R T I F I C A T E</div>
<div style="margin-top:3%"></div>
<br>
<div class="fixedText">This is to certify that</div>
<br>
<br>
<div style="font-size:24px;text-transform:uppercase;font-weight:600;"  ><?php echo $candidate_name; ?></div>
<div class="fixedText" style="display:inline" >Registration No. </div>
<div  class="details" style="display:inline"><?php echo $regd_no; ?></div>
<br>
<div class="fixedText" style="display:inline">has qualified in</div>
<div class="details" style="display:inline"><?php echo $course; ?></div>
<div class="fixedText" style="display:inline"> <br>with '<div class="fixedText" style="display:inline"><strong><?php echo $grade; ?></strong></div>' Grade</div>

<div class="fixedText" style="display:inline">Under </div>
<div class="details" ><?php echo $centre ?></div>
<br>
<div class="fixedText" style="display:inline">Conducted by </div><div class="details" style="display:inline"><?php echo $place; ?></div>
<div class="fixedText">This Program held</div>
<div class="fixedText"  style="display:inline">between </div>
<div  class="details" style="display:inline"><?php echo $dateFrom; ?></div><div class="fixedText" style="display:inline"> and </div><div class="details" style="display:inline"><?php echo $dateTo ?></div>

</center>
</div>
<br><br><br><br><br>
<div style="padding-top:10%"></div>
<div style="float:left;display:inline">Certificate No :<input type="text" value="<?php echo $cerID; ?>" style="display:inline;border-style: none;"></div>

<div style="padding-left:85%;display:inline"><strong>Head</strong></div>

<div style="text-align:left;">Date  <div style="display:inline"><input style="border-style: none;width:16%" type="text" id="datepicker2" value="25-05-2016"></div>

<div style="padding-left:40%;display:inline;"><strong>Skill Assessment and Certification</strong></div>
</div>
</div>

</div>


<!--
<div id="info2">

<center>
<input type="button" value="Print" onClick="infofun();window.print();">
</center>
</div>
-->
</div>
<div style="margin-top:7%"></div>
<?php

file_put_contents("printedCertificate/$cerID.html", ob_get_contents());
ob_end_clean(); 
	endwhile;
	
include('batchPrint_voc.php');


?>
<?php

	//file_put_contents("printedCertificate/$cerID.html", ob_get_contents());
	//ob_end_clean(); 
	//endwhile;
	}
/*End od certificate*/


		  $change_image_sql="SELECT * FROM certificate_table";
		  $change_image_result=mysql_query($change_image_sql,$connection);
		  $change_image_details=mysql_fetch_array($change_image_result);
		  $leftLogo=$change_image_details['leftLogo'];
		      $middleLogo=$change_image_details['middleLogo'];
			$rightLogo=$change_image_details['rightLogo'];
			$sign=$change_image_details['sign'];


					if($_SERVER["REQUEST_METHOD"]=="POST")
												{
													
									 if(isset($_FILES['fileField']))
									 {
									  $fileName= $_FILES['fileField']['name'];
									 
									  $fileName = preg_replace('/\s+/', '', $fileName);
									  
									  $fileTmpName= $_FILES['fileField']['tmp_name'];// file temporary name.
									  $final_destination= "upload/".basename($fileName);
									  
									  if(move_uploaded_file($fileTmpName, $final_destination)){
								
		  $update_query=mysql_query("update certificate_table SET leftLogo='$final_destination' ");
		  $change_image_sql="SELECT * FROM certificate_table";
		  $change_image_result=mysql_query($change_image_sql,$connection);
		  $change_image_details=mysql_fetch_array($change_image_result);
		  $leftLogo=$change_image_details['leftLogo'];

									  }

									  }
				
				
				
				 if(isset($_FILES['middleLogo']))
									 {
									  $fileName1= $_FILES['middleLogo']['name'];// file name you have uploaded
									  $fileName1 = preg_replace('/\s+/', '', $fileName1);
									  
									  $fileTmpName1= $_FILES['middleLogo']['tmp_name'];// file temporary name.
									  $final_destination1= "upload/".basename($fileName1);
									  
									  if(move_uploaded_file($fileTmpName1, $final_destination1)){
								
		  $update_middle_query=mysql_query("update certificate_table SET middleLogo='$final_destination1' ");
		  $change_middle_image_sql="SELECT * FROM certificate_table";
		  $change_middle_image_result=mysql_query($change_middle_image_sql,$connection);
		  $change_middle_image_details=mysql_fetch_array($change_middle_image_result);
		  $middleLogo=$change_middle_image_details['middleLogo'];

									  }

									  }


 				if(isset($_FILES['rightLogo']))
									 {

									  $fileName2= $_FILES['rightLogo']['name'];// file name you have uploaded
									  $fileName2 = preg_replace('/\s+/', '', $fileName2);
									  
									  $fileTmpName2= $_FILES['rightLogo']['tmp_name'];// file temporary name.
									  $final_destination2= "upload/".basename($fileName2);
									  
									  if(move_uploaded_file($fileTmpName2, $final_destination2)){
								
		  $update_rightLogo_query=mysql_query("update certificate_table SET rightLogo='$final_destination2' ");
		  $change_rightLogo_image_sql="SELECT * FROM certificate_table";
		  $change_rightLogo_image_result=mysql_query($change_rightLogo_image_sql,$connection);
		  $change_rightLogo_image_details=mysql_fetch_array($change_rightLogo_image_result);
		 $rightLogo=$change_rightLogo_image_details['rightLogo'];

	  
									  }
									  }

if(isset($_FILES['sign']))
									 {

									  $fileName3= $_FILES['sign']['name'];// file name you have uploaded
									  $fileName3 = preg_replace('/\s+/', '', $fileName3);
									  
									  $fileTmpName3= $_FILES['sign']['tmp_name'];// file temporary name.
									  $final_destination3= "upload/".basename($fileName3);
									  
									  if(move_uploaded_file($fileTmpName3, $final_destination3)){
								
		  $update_sign_query=mysql_query("update certificate_table SET sign='$final_destination3' ");
		  $change_sign_image_sql="SELECT * FROM certificate_table";
		  $change_sign_image_result=mysql_query($change_sign_image_sql,$connection);
		  $change_sign_image_details=mysql_fetch_array($change_sign_image_result);
		 $sign=$change_sign_image_details['sign'];

	  
									  }
									  }



							 }
							 
$certificate_no='Sample';
$candidate_name="Sample";	
$regd_no="Sample";
$course="Sample";
$grade="Sample";
$centre="Sample";
$place="Sample";
$dateFrom="Sample";
$dateTo="Sample";
$date="Sample"							 
					
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Certificate</title>
<link rel="stylesheet" href="css/jquery-ui.css">
<style> 

@font-face {
    font-family: myFirstFont;
    src:url(fonts/west.TTF);


}
.certificateStyle {
    font-family: myFirstFont;
	font-size:56px;
	margin-bottom:1%;
}
.fixedText
{
	font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-style:italic;
	font-size:20px;
}
input[type="text"]
{
    background: transparent;
    border: none;
	font-size:16px;
	font-weight:600;
	text-transform:uppercase;
	text-align:center;
	
	
}

/* Button */

	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	button,
	.button {
		-moz-appearance: none;
		-webkit-appearance: none;
		-ms-appearance: none;
		appearance: none;
		-moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
		-webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
		-ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
		transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
		background-color: transparent;
		border-radius: 4px;
		border: 0;
		box-shadow: inset 0 0 0 2px #585858;
		color: #585858 !important;
		cursor: pointer;
		display: inline-block;
		font-size: 0.8em;
		font-weight: 900;
		height: 3.5em;
		letter-spacing: 0.35em;
		line-height: 3.45em;
		overflow: hidden;
		padding: 0 1.25em 0 1.6em;
		text-align: center;
		text-decoration: none;
		text-overflow: ellipsis;
		text-transform: uppercase;
		white-space: nowrap;
	}

		input[type="submit"].icon:before,
		input[type="reset"].icon:before,
		input[type="button"].icon:before,
		button.icon:before,
		.button.icon:before {
			margin-right: 0.5em;
		}

		input[type="submit"].fit,
		input[type="reset"].fit,
		input[type="button"].fit,
		button.fit,
		.button.fit {
			display: block;
			margin: 0 0 1em 0;
			width: 100%;
		}

		input[type="submit"]:hover,
		input[type="reset"]:hover,
		input[type="button"]:hover,
		button:hover,
		.button:hover {
			color: #f2849e !important;
			box-shadow: inset 0 0 0 2px #f2849e;
		}

		input[type="submit"]:active,
		input[type="reset"]:active,
		input[type="button"]:active,
		button:active,
		.button:active {
			background-color: rgba(242, 132, 158, 0.1);
		}

		input[type="submit"].small,
		input[type="reset"].small,
		input[type="button"].small,
		button.small,
		.button.small {
			font-size: 0.6em;
		}

		input[type="submit"].big,
		input[type="reset"].big,
		input[type="button"].big,
		button.big,
		.button.big {
			font-size: 1em;
		}

		input[type="submit"].special,
		input[type="reset"].special,
		input[type="button"].special,
		button.special,
		.button.special {
			box-shadow: none;
			background-color: #585858;
			color: #ffffff !important;
		}

			input[type="submit"].special:hover,
			input[type="reset"].special:hover,
			input[type="button"].special:hover,
			button.special:hover,
			.button.special:hover {
				background-color: #f2849e;
			}

			input[type="submit"].special:active,
			input[type="reset"].special:active,
			input[type="button"].special:active,
			button.special:active,
			.button.special:active {
				background-color: #ee5f81;
			}

		input[type="submit"].disabled, input[type="submit"]:disabled,
		input[type="reset"].disabled,
		input[type="reset"]:disabled,
		input[type="button"].disabled,
		input[type="button"]:disabled,
		button.disabled,
		button:disabled,
		.button.disabled,
		.button:disabled {
			-moz-pointer-events: none;
			-webkit-pointer-events: none;
			-ms-pointer-events: none;
			pointer-events: none;
			opacity: 0.25;
		}
</style>
<title>Certificate Maker</title>
</head>

<body >

<img src="images/topcover.jpg" width="100%">

<?php
include('menu.php');
?>
<div style="margin-left:5%;"><h2>Note : You can change the data by clicking on the Image.</h2></div>
<div style="border-style: groove;margin:3%;background-image:url(images/bgr1.png);background-repeat:no-repeat;;background-size:800px;background-position:center">
<div  style="border-style: ridge;margin:0.1%;" >
<!--<div  style="margin:1%;background-image:url(images/group.png);opacity:0.01;background-repeat:no-repeat;background-position:center;" >-->
<div  style="margin:1%;">
<div  style="line-height:285%;">

<!--<div style="float:left">Certificate No : CR005-CIT01</div>
-->



<div style="float:left;display:inline">Certificate No. <input type="text" value="<?php echo 'SAMPLE'; ?>" style="display:inline;border-style: none;text-align:left"></div>


<?php
$button_option="SELECT * FROM batch_details WHERE batch_no='$batch_id'";
				$button_result=mysql_query($button_option,$connection);
				$button_details=mysql_fetch_array($button_result);
	$dis="";			
				$buttonStatus=$button_details['status'];
$cc_dd="...Select..";

?>
<form name="dateForm" action="createBatchCertificate_voc.php" ?batch_id=<?php echo $batch_id ?>" method="post">

<div style="text-align:right;">Date  <div style="display:inline"><input onChange="dateForm.submit()" required style="border-style: none;width:16%;color:red" name="printDate" type="text" id="datepicker2" value=<?php echo $cc_dd?>></div>

</form>
<!--
<form action="createBatchCertificate_voc.php?cerID=<?php echo $cerID ?>" method="post" enctype="multipart/form-data" name="form" style="display:inline" >
<input type="file" accept="image/x-png"  name="fileField" onchange="this.form.submit()" style="position:absolute;padding-top:10%;;width:6.5%;display:inline">
</form>
<div style="display:inline;"><img src="<?php echo $leftLogo; ?>" width="19%"></div>
-->
<!--<form action="createCertificate.php?cerID=<?php echo $cerID ?>" method="post" enctype="multipart/form-data" name="form" style="display:inline" >
<input type="file" accept="image/x-png" name="middleLogo" onchange="this.form.submit()" style="position:absolute;padding-top:10%;margin-left:20%;width:6.5%;display:inline"">
</form>-->
<br>
<div style="margin-left:0%;display:inline;padding-right:35%;"><img src="<?php echo $middleLogo; ?>" width="18%"></div>

<form action="createBatchCertificate_voc.php?cerID=<?php echo $cerID ?>" method="post" enctype="multipart/form-data" name="form" style="display:inline" >
<input type="file" accept="image/x-png" name="rightLogo" onchange="this.form.submit()" style="position:absolute;padding-top:10%;width:6.5%;display:inline;margin-left:34%"">
</form>
<div style="display:inline;margin-left:34%;"><img src="<?php echo $rightLogo; ?>" width="12%"></div>
<center>

<div class="certificateStyle">C E R T I F I C A T E</div>
<div style="margin-top:3%"></div>
<div class="fixedText">This is to certify that</div>
<div style="margin-top:3%"></div>
<br>
<div ><input readonly type="text" value="<?php echo $candidate_name; ?>" style="font-size:36px;text-transform:uppercase;font-weight:600;" ></div>
<div class="fixedText" >Registration No. <input type="text" value="<?php echo $regd_no; ?>" style="display:inline;"></div>
<div class="fixedText" style="display:inline">has qualified in</div>
<div style="display:inline"><input readonly type="text" value="<?php echo $course; ?>" style="display:inline;border-style: none;width:30%;text-transform:uppercase;text-align:center;font-size:16px;font-weight:600"></div>
<div class="fixedText" style="display:inline"> with '<div class="fixedText" style="display:inline"><strong><input readonly maxlength="1" type="text" value="<?php echo $grade; ?>" style="display:inline;border-style: none;width:1%;text-transform:uppercase;text-align:center;font-size:16px;font-weight:600"></strong></div>' Grade</div>
<br>
<div style="display:inline;">
<div class="fixedText" style="display:inline">Under Third Party </div>
<input readonly type="text" value="<?php echo $centre ?>" style="border-style: none;width:50%;text-transform:uppercase;text-align:center">
</div>
<br>
<div class="fixedText" style="display:inline;" >Conducted by </div><div style="display:inline"><input readonly type="text" value="<?php echo $place; ?>" style="display:inline;border-style: none;width:40%;text-transform:uppercase;text-align:center"></div>
<div class="fixedText">This Program held</div>
<div class="fixedText"  style="display:inline">between </div><div class="fixedText" style="display:inline"><input readonly style="border-style: none;width:10%;text-align:center" type="text" id="datepicker" value="<?php echo $dateFrom; ?>">and </div><div style="display:inline"><input readonly style="border-style: none;width:10%;text-align:center" type="text" id="datepicker1" value="<?php echo $dateTo ?>"></div>
<!--
@Alok
Date :17/11/2016
Work :  added one line (Our University is empanelled to DGET)
<br>
-->

</center>

</div>
<!--
@Alok
Date :17/11/2016
Work : commented one <br> 
<br>
-->



<br><br><br><br>
<div style="padding-top:10%"></div>
<!--
<div style="float:left;display:inline">Certificate No. <input type="text" value="<?php echo 'SAMPLE'; ?>" style="display:inline;border-style: none;text-align:left"></div>
-->

<div style="padding-left:4%;display:inline"><strong>Head</strong><div style="padding-left:78%;display:inline"><strong>Head</strong></div></div>
<br>
<?php
/*
$button_option="SELECT * FROM batch_details WHERE batch_no='$batch_id'";
				$button_result=mysql_query($button_option,$connection);
				$button_details=mysql_fetch_array($button_result);
	$dis="";			
				$buttonStatus=$button_details['status'];
$cc_dd="...Select..";
*/
?>
<!--
<div style="text-align:left;">Date  <div style="display:inline"><input required style="border-style: none;width:16%;color:red" name="printDate" type="text" id="datepicker2" value=<?php echo $cc_dd ?>></div>
-->
<div style="padding-left:1%;display:inline;"><strong>Training Provider</strong></div>

<div style="padding-left:65%;display:inline;"><strong>Skill Assessment & Certification</strong></div>
</div>
</div>

</div>



<br>

<?php

if($buttonStatus!="yes")
{
//echo "ttttttttttttttttt ".$printDate;
?>

<center>
<form action="createBatchCertificate_voc.php?batch_id=<?php echo $batch_id ?>" method="post">

<input  hidden="hidden" value="<?php echo $printDate?>" name="newDate">
<input name="submit" hidden="hidden"   type="submit" value="Save Certificates for Batch<?php echo $batch_id?>">
                      
        </center>            
</form>
<?php } else {
	header('location:createBatchCertificate_print.php?batch_id='.$batch_id);
	?>
    <!--
<center>
<a href="printedCertificate/printAllBatch.php?batch_id=<?php echo $batch_id; ?>">
<input type="button" class="special" value="Print for Batch <?php echo $batch_id; ?>">
</a>
</center>
-->
<?php } ?>
<br>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$( "#datepicker" ).datepicker();
$( "#datepicker1" ).datepicker();
$( "#datepicker2" ).datepicker();

});

</script>
<script type="text/javascript">  
/*
$(function(){

    $("#fil1").change(function(){
alert('hit');
        $("#form1").submit();
    });
});
*/
</script> 
</body>
</html>