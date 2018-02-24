<?php
session_start();
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
include('common/connection.php');
if(!isset($_SESSION['login_user']))
header("location: index.php");

if(isset($_SESSION['login_user']))
if(($_SESSION['user_hint'])!="user")
header("location: index.php");
$today=date('d-m-Y');
//echo $_SESSION['user_hint']
$msg="";


$sql_for_certificate_no="SELECT * FROM certificate_table";
													$cid_result=mysql_query($sql_for_certificate_no,$connection);
												//$numrows=mysql_num_rows($result);
												$cid_row=mysql_fetch_array($cid_result);
												$cid=$cid_row['candidate_no'];	
												


if (isset($_POST['submit'])) 
{
	$batchName=$_POST['batchName'];
	 $batchNameQuery= mysql_query("INSERT INTO `batch_details`(`batch_no`) VALUES ('$batchName')");
	 
		  $passValue=$_POST['passValue'];
		//  echo 'Pass :'.$passValue;
$fileName= $_FILES['file']['name'];// file name you have uploaded
$fileName = preg_replace('/\s+/', '', $fileName);
$fileTmpName= $_FILES['file']['tmp_name'];// file temporary name.
$final_destination= "upload/".$passValue.basename($fileName);

if(move_uploaded_file($fileTmpName, $final_destination)){
    
	
}	
	  $inputFileName=$final_destination;// file name you have uploaded
		
	  /************************ YOUR DATABASE CONNECTION START HERE   ****************************/
	
	/*  
	  define ("DB_HOST", "localhost"); // set database host
	  define ("DB_USER", "root"); // set database user
	  define ("DB_PASS",""); // set database password
	  define ("DB_NAME","walkout_db"); // set database name
	  $link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
	  $db = mysql_select_db(DB_NAME, $link) or die("Couldn't select database");
	*/
	
	
	  
	 // $databasetable = "st";
	  
	  /************************ YOUR DATABASE CONNECTION END HERE  ****************************/
	  
	  
	  set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
	  include 'PHPExcel/IOFactory.php';
	  
	  // This is the file path to be uploaded.
	  
	  //$inputFileName = 'discussdesk.xlsx'; 
	
	  try {
		  $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	  } catch(Exception $e) {
		  die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	  }
	  
	  
	  $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	  $arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet
	//echo "arrayCount".$arrayCount;
	  for($i=2;$i<=$arrayCount;$i++){
	  //$a = trim($allDataInSheet[$i]["A"]);
		$a=(++$cid);
		//$a=str_pad($a,4,'0',STR_PAD_LEFT);
		$a=sprintf('%04d',$a);
		$a=$a."/".date('Y');
	  $b= trim($allDataInSheet[$i]["A"]);
	  $c= trim($allDataInSheet[$i]["B"]);
	  $d= trim($allDataInSheet[$i]["C"]);
	  $e= trim($allDataInSheet[$i]["D"]);
	  $f= trim($allDataInSheet[$i]["E"]);
	  $g= trim($allDataInSheet[$i]["F"]);
	  $h= trim($allDataInSheet[$i]["G"]);
	  $ii= trim($allDataInSheet[$i]["H"]);
	 // $batchId="B002";
	// echo "I : ".$i;
	  $loginTableInsert= mysql_query("insert into candidate_details (	certificate_no,candidate_name,regd_no,batch_no,course,grade,centre,place,dateFrom,dateTo,date) values('".$a."', '".$b."', '".$c."', '".$batchName."','".$d."', '".$e."', '".$f."', '".$g."', '".$h."', '".$ii."', '".$today."');");
	    $msg = 'Details has been Saved. <div style="Padding:20px 0 0 0;"></div>';
	
	  }
// echo "<div style='font: bold 18px arial,verdana;padding: 45px 0 0 500px;'>".$msg."</div>";
  $update_cid_query=mysql_query("update certificate_table SET candidate_no='$cid' ");
		
//echo "Final :".$cid;

	   
}

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/main.css" />
<title>Admin</title>
</head>
<body onload="startTime()">


<img src="images/topcover.jpg" width="100%">

<?php 
include('menu.php');
?>


<br>

<div style="padding-left:2%;padding-right:2%">
<h3>Upload Excel File</h3>

<?php echo $msg; ?>
<strong>Excel Column Must Be :</strong><div style="color:#069;margin-bottom:2%;display:inline">
Candidate Name | Regd No | Course | Grade | Center | Place | DateFrom |  DateTo

<br><br>
</div>
<form action="importExcel.php" method="post" enctype="multipart/form-data">
<div class="6u 12u$(xsmall)">
<input type="text" name="batchName" value="" placeholder="Batch Name" required />
<br>
</div>
<input type="file" name="file" required >
<div style="display:none">
<input type="text" id="passValue" name="passValue" hidden="hidden"  >
 </div>                                   
<input type="submit" value="Upload" name="submit" onClick="ran();">
</form>
</div>
<?php include('common/footer.php'); ?>

<body>
</html>
<script>
function ran()
{
	var randomnumber=Math.random();
	val1=parseInt(randomnumber*10000);
	document.getElementById("passValue").value=val1;
	
}
</script>
