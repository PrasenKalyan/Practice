<?php 
include("../db/connection.php");
$id=$_GET['id'];

$sql=mysqli_query($link,"select * from `patientregister` where reg_id='$id'");
$r=mysqli_fetch_array($sql);


//$doct=$r['registerno'];
$doct1=$r['registerdate'];
//$doct2=$r['tknum'];
 $did=$r['doctorname'];
$pname=$r['patientname'];
$fname=$r['gaurdianname'];
$sex=$r['gender'];
$age=$r['age'];
$mobile=$r['phoneno'];
$pat_type=$r['pat_type'];
//$aadhar=$r['aadar'];
 $ref_doc=$r['ref_doc'];
$address=$r['address'];
$doctorname=$r['doctorname'];
 $con_doct_mob=$r['con_doc_mob'];
$ref_doc_mob=$r['ref_doc_mob'];
$tokenno=$r['tokenno'];
$validity=$r['validity'];
$registerno=$r['registerno'];
$rel_type=$r['rel_type'];
$token1=$r['token_num'];
$cons_fee=$r['cons_fee'];
$total=$r['total'];
 $regfee=$r['registerfee'];
$authby = $r['auth_by'];
$phoneno=$r['phoneno'];
$bill_num=$r['bill_num'];
 $hosp_fee=$r['hosp_fee'];
 $pname_type=$r['pname_type'];
 $pat_type1=$r['pat_type1'];
 $visit_count_pat=$r['visit_count_pat'];
 $registerno=$r['registerno'];
 $tnum=$r['tnum'];
   $dd="select dname1,dsi1,desc1,stime,etime,wdays,edays,dept1,valdity,visit_count,doct_dept_list from doct_infor where dname1 = '$did'";
$docid = mysqli_query($link,$dd);
if($docid)
{
	$row1 = mysqli_fetch_array($docid);
	 $doct3 = $row1['dname1'];
	$dsi1 = $row1['dsi1'];
	$desc1 = $row1['desc1'];
	$stime=$row1['stime'];
	$etime=$row1['etime'];
	$wdays=$row1['wdays'];
	$edays=$row1['edays'];
	$dept1=$row1['dept1'];
	$valdity=$row1['valdity'];
	$visit_count=$row1['visit_count'];
	$doct_dept_list=$row1['doct_dept_list'];
	$NewDate = date('Y-m-d', strtotime($day . " +7 days"));

}



 $dd="select * from referal_doctor where refcode = '$ref_doc'";
$docid = mysqli_query($link,$dd);


$row1 = mysqli_fetch_array($docid);
	$ref_docname = $row1['ref_docname'];
	



  $dd1="SELECT * FROM `doctdept` where id = '$dept1'";
$docid1 = mysqli_query($link,$dd1);

	$row1 = mysqli_fetch_array($docid1);
	 $doctdeptname = $row1['doctdeptname'];
	



?>

<?php 
    $newdate=$doct1;



 $day2=date('Y-m-d', strtotime($newdate));

	$NewDate1 = date('Y-m-d', strtotime($day2 . " +$valdity days"));

  $daykk=date('d-m-Y', strtotime($NewDate1));


  $id = $_GET['id']; // Assumes patient_id is passed as a query parameter
  $summary_sql = mysqli_query($link, "SELECT * FROM `patient_summaries` WHERE patient_id='$id'");
  
  if ($summary_sql && mysqli_num_rows($summary_sql) > 0) {
      $s = mysqli_fetch_array($summary_sql);
  } else {
      // Initialize an empty array to avoid undefined variable notices
      $s = [
          'presenting_complaints' => '',
          'examination_findings' => '',
          'diagnosis' => '',
          'drug_form' => '',
          'drug_name' => '',
          'frequency' => '',
          'how_to_take' => '',
          'no_of_days' => '',
          'investigations' => '',
          'precautions' => '',
          'follow_ups' => '',
          'registerno' => ''
      ];
  }




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>KERTHIKEYA SPECIALITY CLINICS</title>
<script language="JavaScript" type="text/javascript">
function prnt(){
    document.getElementById("prnt").style.display="none";
    document.getElementById("cls").style.display="none";
    window.print();
    window.close();
}
function closew(){
    window.close();
}
</script>
<style>
body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma"; /* Increased font size */
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.page {
    width: 21cm; /* Width of A4 page */
    min-height: 27.7cm; /* Height of A4 page */
    padding: 2cm; /* Add some padding to match A4 margins */
    margin: 1cm auto; /* Center the page horizontally */
    background: white;
    box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    position: relative; /* Ensure absolute positioning works within this context */
}

.subpage {
    padding: 0;
    border: 0;
    height: 27.7cm;
    font: "Times New Roman", Times, serif;
    font-size: 14px; /* Increased font size */
}

.styled-button-2 {
    background: #3498db;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.styled-button-2:hover {
    background: #2980b9;
}

@page {
    size: A4;
    margin: 0; /* Removes default margins */
}

@media print {
    body, .page {
        margin: 0;
        box-shadow: none;
        background: none;
    }
    .page .patient-details table,
    .page .patient-summary table,
    .page .patient-details table td,
    .page .patient-summary table td {
        border: none !important; /* Ensure borders are removed for printing */
    }
}

/* Style for the first table (Patient Details) */
.page .patient-details {
    width: 60%; /* Adjust the width as needed */
    position: absolute; /* Allows positioning relative to the nearest positioned ancestor */
    top: 0cm; /* Moves the table to the top */
    right: -0.0cm; /* Moves the table to the right */
    margin: 0; /* Removes any default margin */
    font-size: 13px; /* Adjust the font size as needed */
}

.page .patient-details table {
    width: 100%; /* Ensure the table spans the full width of the container */
    background: #FFFFFF;
    border-collapse: collapse;
    margin: 0 auto; /* Centers the table within the .patient-details container */
    border: none; /* Remove table borders */
}

.page .patient-details table td {
    padding: 3px 0; /* Increase padding to increase table height */
    line-height: 1.0; /* Increase line height to increase table height */
    border: none; /* Remove cell borders */
}

.page .patient-details hr {
    margin-top: 9px;
    margin-bottom: 1px;
}

.page .patient-details h4 {
    text-align: center;
    margin: 0; /* Aligns the heading properly within the container */
    height: 0;
}

/* Style for the second table (Patient Summary) */
.page .patient-summary {
    width: 53%; /* Adjust the width as needed */
    position: absolute; /* Allows positioning relative to the nearest positioned ancestor */
    top: 6.5cm; /* Adjust the spacing between the two tables */
    right: 0cm; /* Moves the table to the right */
    background: #FFFFFF;
    border-collapse: collapse;
}

.page .patient-summary table {
    width: 100%; /* Ensure the table spans the full width of the container */
    border-collapse: collapse;
    border: none; /* Remove table borders */
}

.page .patient-summary table td {
    padding: 6px;
    border: none; /* Remove cell borders */
}

.page .patient-summary hr {
    margin-top: 10px;
    margin-bottom: 10px;
}



</style>
</head>
<body>
<div align="center">
    <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> 
    <a href="../pages/book_appointment.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
</div>
<div class="page">
    <table class="patient-details" width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr><td colspan="2"><br></td></tr>
        <tr>
            <td colspan="2">
                <table width="80%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="" valign="top" align="right">
                            <table width="93%" border="0" align="right" style="vertical-align:text-top; margin-top-0px;" cellpadding="0" cellspacing="0" >
                                <tr>
                                    <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
                                    <td width="40%"><?php echo date('d.M Y',strtotime($newdate)); ?> &nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%"><?php echo $pat_type1;?> &nbsp;&nbsp;&nbsp; General</td>
                                </tr>
                                <tr>
                                    <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
                                    <td width="40%"><?php echo date('h:i:s',strtotime($newdate)); ?> &nbsp;&nbsp;&nbsp;</td>
                                    <td width="20%"><?php echo $sex."/". $age; ?></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
                                    <td><?php echo $bill_num; ?> </td>
                                    <td width="40%"><div align="left"><b> </b></div></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div align="left"><b>Master Id : </b></div></td>
                                    <td><?php echo $registerno;?> </td>
                                    <td><div align="left"><b></b> </div></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><div align="left"><b>City: </b></div></td>
                                    <td><?php echo $address; ?></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td><b></b></td>
                                </tr>
                                <tr>
                                    <td><div align="left"><b>Patient Name: </b></div></td>
                                    <td><?php echo $pname_type." ".$pname; ?></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td><b></b></td>
                                </tr>
                                <tr>
                                    <td><div align="left"><b>Consultant Doctor: </b></div></td>
                                    <td><?php echo $doctorname?>, <?php echo $dsi1?></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td><b></b></td>
                                </tr>
                                <tr>
                                    <td><div align="left"><b>Towards: </b></div></td>
                                    <td><?php echo $pat_type;?></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td style="font-size:15px"><b><?php echo $tnum+4;?></b></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

   
    <div id="movable-container" style="position: absolute; top: 205px; left: 470px; display: flex; justify-content: left; align-items: left; height: 10px;">
    <h4 style="margin: 0; height: 8px;"><u>PATIENT SUMMARY</u></h4>
</div>

    <table class="patient-summary" width="80%" border="0" cellspacing="0" cellpadding="4">
      
        <tr>
            <td width="40%"><div align="left"><b>Presenting Complaints:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['presenting_complaints'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td width="30%"><div align="left"><b>Examination Findings:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['examination_findings'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td width="30%"><div align="left"><b>Diagnosis:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['diagnosis'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td width="30%"><div align="left"><b>Investigations:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['investigations'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td width="30%"><div align="left"><b>Precautions:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['precautions'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td width="30%"><div align="left"><b>Follow-ups:</b></div></td>
            <td width="100%"><?php echo htmlspecialchars($s['follow_ups'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>      
    </table>



</div>
</body>
</html>
