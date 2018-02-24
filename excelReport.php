<?php
include('common/connection.php');
	header("Content-type: application/x-msdownload");

header("Content-Disposition: attachment;Filename=Certificate Report.xls");

	  $dateFrom=$_POST['dateFrom'];
	  $dateTo=$_POST['dateTo'];
 $dateFrom = date('Y-m-d', strtotime($dateFrom));
 $dateTo = date('Y-m-d', strtotime($dateTo));
$sl_no=0;
$dF=date(strtotime($dateFrom));
$dT=date(strtotime($dateTo));

$candidate_info_query=mysql_query ("select * from candidate_details",$connection);

echo '<table border="1">';
	echo '<tr>';
	echo '<th width="10%">Sl No</th>';
	echo '<th width="20%">Certificate ID</th>';
	echo '<th width="20%">Regd No</th>';
	echo '<th width="40%">Name</th>';
	echo '<th width="25%">Issue Date</th>';
	echo '</tr>';
	
	
while($candidate_info_data=mysql_fetch_array($candidate_info_query)):
	$issue_date=$candidate_info_data['date'];

	$candidate_issue_date=$candidate_info_data['date'];
	$candidate_regdno=$candidate_info_data['regd_no'];
	$candidate_name=$candidate_info_data['candidate_name'];
	$candidate_cid=$candidate_info_data['certificate_no'];
	
	//echo "<br>";

		
			      $candidate_issue_date=date('Y-m-d', strtotime($candidate_issue_date));;
				$candidate_issue_date=date(strtotime($candidate_issue_date));

/*
echo "<br>candidate_issue_date".$candidate_issue_date;
echo "<br>DF :".$dF;
echo "<br>DT :".$dT;
*/
    
	   if (($candidate_issue_date >= $dF) && ($candidate_issue_date <= $dT))
    {
					$sl_no++;	

		echo'<tr>';
		echo '<td>'.$sl_no.'</td>';
	
		echo '<td>'.$candidate_cid."</td>";
		echo '<td>'.$candidate_regdno.'</td>';
		echo '<td>'.strtoupper($candidate_name ).'</td>';
		echo '<td>'.$issue_date."</td>";
		echo '</tr>';
	}
	
endwhile;
echo '</table>';
?>