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

function abc(){
	
//document.getElementById('tr1').style.display='none';
window.print();
window.close();
//document.getElementById('tr1').style.display='';
}
</script>
<style>
   
   body {
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 10pt "Tahoma";
}
* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
.page {
    width: 22cm;
    min-height: 26cm;
    /* padding: 1.5cm;
    margin: 1cm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px; */
    background: white;
  
}
.subpage {
    padding: 0.25cm;
    border: 0px red solid;
    height: 245mm;
	padding-top:20px;
	font:"Times New Roman", Times, serif;
	font-size:13px;
  
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

}
@media print {
    .page {
      
      
    }
}

/* Style for the first table */
.page .patient-details {
    width: 80%;
    margin-left: 130px; /* Aligns the table to the right */
    margin-right: 0;
    font-size: 10px; /* Adjust the font size as needed */
}

.page .patient-details table {
    width: 100%;
    background: #FFFFFF;
    border-collapse: collapse;
}

.page .patient-details table td {
    padding: 4px 0; /* Increase padding to increase table height */
    line-height: 1.0; /* Increase line height to increase table height */
}

.page .patient-details hr {
    margin-top: 3px;
    margin-bottom: 1px;
}

.page .patient-details h4 {
    text-align: center;
    margin-left: -100px;
    height: 0;
}
/* Style for the second table */
.page .patient-summary {
    width: 80%;
    margin-left: auto; /* Pushes the table to the right */
    margin-right: 0;
    margin-top: 20px; /* Adjust the spacing between the two tables */
    background: #FFFFFF;
    border-collapse: collapse;
}

.page .patient-summary table {
    width: 100%; /* Make sure the table spans the full width of the container */
    border-collapse: collapse;
}

.page .patient-summary table td {
    padding: 4px;
}

.page .patient-summary hr {
    margin-top: 10px;
    margin-bottom: 10px;
}

.page .patient-summary h4 {
    text-align: center;
    margin-left: -100px;
    height: 8px;
}
</style>
</head>

<body>
<div align="center" >
								
          <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> <a href="../pages/book_appointment.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
								</div>
<!--<div class="book">
    <div class="page">
        <div class="subpage">-->
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


<div class="page">

	
<table width="65%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; margin-left:210px; margin-right:40px;">

          <tr><td colspan="2"><br></td></tr>
          
        
  <tr>
    <td colspan="2" ><table class="patient-details" width="80%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="" valign="top" align="right">
		<table width="93%" border="0" align="right" style="vertical-align:text-top; margin-top-0px;" cellpadding="0" cellspacing="0" >
          
         	 
          <tr>
         
            <td width="40%"><div align="left"><b>Bill Date :</b> </div></td>
			<td width="40%"><?php echo date('d.M Y',strtotime($newdate));  ?> &nbsp;&nbsp;&nbsp;</td>
        
			<td  width="20%"> <?php echo $pat_type1;?>  &nbsp;&nbsp;&nbsp;  General</td>
            </tr>
			 
			 
          <tr>
         
            <td width="40%"><div align="left"><b>Patient Visit Time:</b> </div></td>
			<td width="40%"><?php echo date('h:i:s',strtotime($newdate));  ?>
			
			<?php //echo $registerno;  ?> &nbsp;&nbsp;&nbsp;</td>
          
			<td  width="20%"> <?php  echo $sex."/". $age;  ?></td>
            </tr>
          <tr>
         
            <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
				<td ><?php echo $bill_num
					 ?> <?php //echo $tokenno ?></td>
            <td width="40%"><div align="left"><b> </b></div></td>
			<td ><?php //echo $newdate?></td>
		
            </tr>
			
			<tr>
           <td width="40%"><div align="left"><b>Master Id : </b></div></td>
			<td ><?php echo $registerno;?> </td>
            <td ><div align="left"><b></b> </div></td>
			<td><?php  //echo $phoneno;  ?></td>
          
            </tr>
			  <tr>
           
            <td><div align="left"><b>City: </b></div></td>
			<td><?php echo $address;  ?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
		   <tr>
           
            <td><div align="left"><b>Patient Name: </b></div></td>
			<td><?php echo $pname_type." ".$pname;  ?></td>
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
        
       
</TABLE>


   
    <hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">PATIENT SUMMARY</h4>
		<hr>
        <table width="100%" border="0" cellspacing="0" cellpadding="4">
    <tr>
        <td width="40%"><div align="left"><b>Presenting Complaints:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['presenting_complaints'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Examination Findings:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['examination_findings'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Diagnosis:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['diagnosis'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Treatment:</b></div></td>
        <td width="60%">
            <b>Drug Form:</b> <?php echo htmlspecialchars($s['drug_form'], ENT_QUOTES, 'UTF-8'); ?><br>
            <b>Drug Name:</b> <?php echo htmlspecialchars($s['drug_name'], ENT_QUOTES, 'UTF-8'); ?><br>
            <b>Frequency:</b> <?php echo htmlspecialchars($s['frequency'], ENT_QUOTES, 'UTF-8'); ?><br>
            <b>How to Take:</b> <?php echo htmlspecialchars($s['how_to_take'], ENT_QUOTES, 'UTF-8'); ?><br>
            <b>No. of Days:</b> <?php echo htmlspecialchars($s['no_of_days'], ENT_QUOTES, 'UTF-8'); ?><br>
        </td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Investigations:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['investigations'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Precautions:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['precautions'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <tr>
        <td width="40%"><div align="left"><b>Follow-ups:</b></div></td>
        <td width="60%"><?php echo htmlspecialchars($s['follow_ups'], ENT_QUOTES, 'UTF-8'); ?></td>
    </tr>
    <table>
</table>



</div>

</body>
</html>