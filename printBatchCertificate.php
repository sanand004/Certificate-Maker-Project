<?php
$cerID=$row['certificate_no'];

$change_image_sql="SELECT * FROM certificate_table";
$change_image_result=mysql_query($change_image_sql,$connection);
$change_image_details=mysql_fetch_array($change_image_result);

$leftLogo="../".$change_image_details['leftLogo'];
$middleLogo="../".$change_image_details['middleLogo'];
$rightLogo="../".$change_image_details['rightLogo'];
$sign="../".$change_image_details['sign'];
$date=$change_image_details['date'];


$sql="SELECT * FROM candidate_details where certificate_no='$cerID'";
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
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Certificate Preview</title>
<link rel="stylesheet" href="../css/jquery-ui.css">
<style> 

@font-face {
    font-family: myFirstFont;
    src:url(fonts/west.TTF);


}
.certificateStyle {
    font-family: myFirstFont;
	font-size:56px;
	margin-bottom:3%;
}
.fixedText
{
	font-family:Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-style:italic;
	font-size:20px;
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

<body style="-webkit-print-color-adjust:exact;" >
<div style="border-style: groove;margin:3%;background-image:url(../images/bg2.jpg);background-repeat:no-repeat;background-position:center;background-size:100%">
<div  style="border-style: ridge;margin:0.1%;" >
<div  style="margin:1%;">
<div  style="line-height:300%;">
<div style="float:left;display:inline">Certificate No :<?php echo $cerID; ?></div>
<br>

<div style="display:inline;"><img src="<?php echo $leftLogo; ?>" width="20%"></div>

<div style="margin-left:25%;display:inline;padding-right:25%"><img src="<?php echo $middleLogo; ?>" width="9%"></div>

<div style="display:inline;"><img src="<?php echo $rightLogo; ?>" width="18%"></div>
<center>
<br>
<div class="certificateStyle">C E R T I F I C A T E</div>
<div class="fixedText">This is to certify that</div>
<div class="details" ><?php echo $candidate_name; ?></div>
<div class="fixedText" style="display:inline" >Registration No. </div>
<div  class="details" style="display:inline"><?php echo $regd_no; ?></div>
<br>
<div class="fixedText" style="display:inline">has qualified as</div>
<div class="details" style="display:inline"><?php echo $course; ?></div>
<div class="fixedText" style="display:inline">with '<div class="fixedText" style="display:inline"><strong><?php echo $grade; ?></strong></div>' Grade</div>
<div class="details" ><?php echo $centre ?></div>
<div class="fixedText" style="display:inline">at </div><div class="details" style="display:inline"><?php echo $place; ?></div>
<div class="fixedText">This Program held</div>
<div class="fixedText"  style="display:inline">between </div>
<div  class="details" style="display:inline"><?php echo $dateFrom; ?></div><div class="fixedText" style="display:inline"> and </div><div class="details" style="display:inline"><?php echo $dateTo ?></div>

</center>
</div>
<div style="margin-top:15%"></div>
<div style="display:inline"><strong>Date : </strong></div>
<div style="display:inline"><?php echo $date; ?></div>

<div style="display:inline;margin-left:77%;"><img src="<?php echo $sign; ?>" width="5%"></div>

<div style="text-align:right;padding-right:11%;padding-top:1%"><strong>Head</strong></div>
<div style="text-align:right;"><strong>Skill and Assessment Certification</strong></div>
</div>
</div>

<div id="info2">
<center>
<input type="button" value="Print" onClick="infofun();window.print();">
<div style="opacity:0.5">For PDF,Use Google Chrome </div>
</center>
</div>

<script>

function infofun()

{

	document.getElementById('info').style.display="none";
	document.getElementById('info2').style.display="none";

}

</script>


<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui.js"></script>
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