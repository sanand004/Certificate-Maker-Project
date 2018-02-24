<?php
include('common/connection.php');
?>
<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="css/menustyles.css">
<style>
  #mes{
	padding: 0px 3px;
	border-radius: 2px 2px 2px 2px;
	background-color: rgb(240, 61, 37);
	font-size: 9px;
	font-weight: bold;
	color: #fff;
	position: absolute;
	top: 12px;
	left: 75px;
}


 #newRequest{
	padding: 0px 3px;
	border-radius: 2px 2px 2px 2px;
	background-color: rgb(240, 61, 37);
	font-size: 9px;
	font-weight: bold;
	color: #fff;
	position: absolute;
	top: 12px;
	left: 137px;
}

 #profileRequest{
	padding: 0px 3px;
	border-radius: 2px 2px 2px 2px;
	background-color: rgb(240, 61, 37);
	font-size: 9px;
	font-weight: bold;
	color: #fff;
	position: absolute;
	top: 12px;
	left: 86px;
}

</style>
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
   <script src="js/menuscript.js"></script>
</head>
<body>
<?php
		
?>
<div id='cssmenu'>
<ul>
   <li><a href='index.php'>Home</a></li>
  
	
<!--           <li><a href="certificate.php" >Create Certificate</a></li> -->
  		            
            <li><a href="#">Candidate </a>
			<ul class="sub1">
                 
                    <li><a href="add_candidate.php" >Add Candidate</a>
                      
            <ul class="sub1">
                    <li><a href="add_candidate.php" >Individual</a></li>
		<li><a href="importExcel.php">Upload Excel File</a></li>
            </ul>
            
                    
                    </li>
            <li><a href="candidate_list.php" >Candidate List</a></li>        
			</ul>
            </li>
             <li><a href="batch_list.php" >Batch List</a></li>
			 
			
		
             <li><a href="report.php">Report</a>
          
			<!--
            <ul class="sub1">
                    <li><a href="#.php" >Monthly Report</a></li>
			
                    <li><a href="#.php" >Yearly Report</a></li>
                    
          		</ul>
          	-->	
            </li>	

  <li style="float:right";><a href="common/logout.php" style="color:white">Logout</a></li>
 
</ul>
</div>

</body>
<html>