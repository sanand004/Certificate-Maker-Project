<?php
if(isset($_REQUEST['batch_id']))
$batch_id=$_GET['batch_id'];

include('common/connection.php');
$sl=0;
$sql_date_batch="SELECT * FROM  batch_details where batch_no='$batch_id'";
$cdate_result=mysql_query($sql_date_batch,$connection);
$c_date_result=mysql_fetch_array($cdate_result);
$cc_dd=$c_date_result['date'];

	$sql="SELECT * FROM candidate_details where batch_no='$batch_id'  AND grade!='ABS' AND grade!='F' ";
	$c_result=mysql_query($sql,$connection);
	$numrows=mysql_num_rows($c_result);
	ob_start();
	while($c_row=mysql_fetch_array($c_result)):
	

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
			//	$date=$change_image_details['date'];
				




				
				$sql="SELECT * FROM candidate_details where certificate_no='$cerID'  AND grade!='ABS' AND grade!='F'";
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
	font-size:25px;
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
<div style="border-style: groove;margin:3%;background-image:url(../images/bgr1.png);background-repeat:no-repeat;;background-size:800px;background-position:center">
<div  style="border-style: ridge;margin:0.1%;" >
<div  style="margin:1%;">
<div  style="line-height:300%;">


<div style="float:left;display:inline">Certificate No. <input type="text" value="<?php echo $cerID; ?>" style="display:inline;border-style: none;text-align:left"></div>


<?php
/*
$button_option="SELECT * FROM batch_details WHERE batch_no='$batch_id'";
				$button_result=mysql_query($button_option,$connection);
				$button_details=mysql_fetch_array($button_result);
	$dis="";			
				$buttonStatus=$button_details['status'];
*/
//$cc_dd="...Select..";

?>

<div style="text-align:right;">Date  <div style="display:inline"><input required style="border-style: none;width:16%;" name="printDate" type="text" id="datepicker2" value=<?php echo $cc_dd ?>></div>
<!--
<div style="display:inline;"><img src="<?php echo $leftLogo; ?>" width="19%"></div>
-->
<div style="margin-left:0%;display:inline;padding-right:35%;"><img src="<?php echo $middleLogo; ?>" width="18%"></div>

<div style="display:inline;margin-left:34%;"><img src="<?php echo $rightLogo; ?>" width="12%"></div>
<center>
<br>
<div class="certificateStyle">C E R T I F I C A T E</div>
<div style="margin-top:3%"></div>
<div class="fixedText">This is to certify that</div>
<div style="margin-top:3%"></div>
<div style="font-size:36px;text-transform:uppercase;font-weight:600;" ><?php echo $candidate_name; ?></div>
<div class="fixedText" style="display:inline" >Registration No. </div>
<div  class="details" style="display:inline"><?php echo $regd_no; ?></div>
<br>
<div class="fixedText" style="display:inline">has qualified in</div>
<div class="details" style="display:inline"><?php echo $course; ?></div>
<div class="fixedText" style="display:inline">with '<div class="fixedText" style="display:inline"><strong><?php echo $grade; ?></strong></div>' Grade</div>
<br>
<div class="fixedText" style="display:inline">Under Third Party </div>
<div class="details" style="display:inline" ><?php echo $centre ?></div>
<br>
<div class="fixedText" style="display:inline">Conducted by </div><div class="details" style="display:inline"><?php echo $place; ?></div>
<div class="fixedText">This Program held</div>
<div class="fixedText"  style="display:inline">between </div>
<div  class="details" style="display:inline"><?php echo $dateFrom; ?></div><div class="fixedText" style="display:inline"> and </div><div class="details" style="display:inline"><?php echo $dateTo ?></div>

</center>

</div>
<br><br><br>

</div>
<div><div style="padding-left:5%;display:inline"><strong>Head</strong><div style="padding-left:70%;display:inline"><strong>Head</strong></div></div></div>

<div style="padding-left:1%;display:inline;"><strong>Training Provider</strong></div>

<div style="padding-left:42%;display:inline;"><strong>Skill Assessment & Certification</strong></div>

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
</div>
<div style="margin-top:12%"></div>
<br>
<?php


	endwhile;
file_put_contents("printedCertificate/$batch_id.html", ob_get_contents());
ob_end_clean(); 
/*End od certificate*/
	


?>