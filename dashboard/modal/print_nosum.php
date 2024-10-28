<?php 
include("../db/connection.php");

$id = $_GET['id'];

$sql = mysqli_query($link, "SELECT * FROM `patientregister` WHERE reg_id='$id'");
$r = mysqli_fetch_array($sql);

$doct1 = $r['registerdate'];
$did = $r['doctorname'];
$pname = $r['patientname'];
$fname = $r['gaurdianname'];
$sex = $r['gender'];
$age = $r['age'];
$mobile = $r['phoneno'];
$pat_type = $r['pat_type'];
$ref_doc = $r['ref_doc'];
$address = $r['address'];
$doctorname = $r['doctorname'];
$con_doct_mob = $r['con_doc_mob'];
$ref_doc_mob = $r['ref_doc_mob'];
$tokenno = $r['tokenno'];
$validity = $r['validity'];
$registerno = $r['registerno'];
$rel_type = $r['rel_type'];
$token1 = $r['token_num'];
$cons_fee = $r['cons_fee'];
$total = $r['total'];
$regfee = $r['registerfee'];
$authby = $r['auth_by'];
$phoneno = $r['phoneno'];
$bill_num = $r['bill_num'];
$hosp_fee = $r['hosp_fee'];
$pname_type = $r['pname_type'];
$pat_type1 = $r['pat_type1'];
$visit_count_pat = $r['visit_count_pat'];
$tnum = $r['tnum'];

$dd = "SELECT dname1, dsi1, desc1, stime, etime, wdays, edays, dept1, valdity, visit_count, doct_dept_list FROM doct_infor WHERE dname1 = '$did'";
$docid = mysqli_query($link, $dd);
if ($docid) {
    $row1 = mysqli_fetch_array($docid);
    $doct3 = $row1['dname1'];
    $dsi1 = $row1['dsi1'];
    $desc1 = $row1['desc1'];
    $stime = $row1['stime'];
    $etime = $row1['etime'];
    $wdays = $row1['wdays'];
    $edays = $row1['edays'];
    $dept1 = $row1['dept1'];
    $valdity = $row1['valdity'];
    $visit_count = $row1['visit_count'];
    $doct_dept_list = $row1['doct_dept_list'];
}

$dd = "SELECT * FROM referal_doctor WHERE refcode = '$ref_doc'";
$docid = mysqli_query($link, $dd);
$row1 = mysqli_fetch_array($docid);
$ref_docname = $row1['ref_docname'];

$dd1 = "SELECT * FROM `doctdept` WHERE id = '$dept1'";
$docid1 = mysqli_query($link, $dd1);
$row1 = mysqli_fetch_array($docid1);
$doctdeptname = $row1['doctdeptname'];

$newdate = $doct1;
$day2 = date('Y-m-d', strtotime($newdate));
$NewDate1 = date('Y-m-d', strtotime($day2 . " +$valdity days"));
$daykk = date('d-m-Y', strtotime($NewDate1));

$id = $_GET['id'];
$summary_sql = mysqli_query($link, "SELECT * FROM `patient_summaries` WHERE patient_id='$id'");
if ($summary_sql && mysqli_num_rows($summary_sql) > 0) {
    $s = mysqli_fetch_array($summary_sql);
    $drug_form = unserialize($s['drug_form']);
    $drug_name = unserialize($s['drug_name']);
    $frequency = unserialize($s['frequency']);
    $how_to_take = unserialize($s['how_to_take']);
    $no_of_days = unserialize($s['no_of_days']);
} else {
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
    $drug_form = [];
    $drug_name = [];
    $frequency = [];
    $how_to_take = [];
    $no_of_days = [];
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
    font: 12pt "Tahoma";
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.page {
    width: 21cm;
    min-height: 27.7cm;
    padding: 2cm;
    margin: 1cm auto;
    background: white;
    box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    position: relative;
}

.subpage {
    padding: 0;
    border: 0;
    height: 27.7cm;
    font: "Times New Roman", Times, serif;
    font-size: 14px;
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
    margin: 0;
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
        border: none !important;
    }
}

.page .patient-details {
    width: 60%;
    position: absolute;
    top: 1.7cm;
    right: 0.8cm;
    margin: 0;
    font-size: 13px;
}

.page .patient-details table {
    width: 100%;
    background: #FFFFFF;
    border-collapse: collapse;
    margin: 0 auto;
    border: none;
}

.page .patient-details table td {
    padding: 3px 0;
    line-height: 1.0;
    border: none;
}

.page .patient-details hr {
    margin-top: 9px;
    margin-bottom: 1px;
}

.page .patient-details h4 {
    text-align: center;
    margin: 0;
    height: 0;
}

.page .patient-summary {
    width: 53%;
    position: absolute;
    top: 6.5cm;
    right: 0.7cm;
    background: #FFFFFF;
       font-family: 'Roboto', sans-serif; /* You can replace 'Roboto' with any other suitable font */
    font-size: 13px; /* Adjust font size as needed */
    line-height: 1.2; /* Adjust line height for readability */

    border-collapse: collapse;
}

.page .patient-summary table {
    width: 100%;
    border-collapse: collapse;
    border: none;
}

.page .patient-summary table td {
    padding: 4px;
    border: none;
}

.page .patient-summary hr {
    margin-top: 10px;
    margin-bottom: 10px;
}

.page .treatment-table {
    width: 52%;
    position: absolute;
    top: 18.0cm;
    right: 0.7cm;
    background: #FFFFFF;
    border-collapse: collapse;
    border-collapse: collapse;
    margin-top: 10px;
    font-size: 13px;
}

.page .treatment-table th, .page .treatment-table td {
    border: 1px solid #000;
    padding: 4px;
    text-align: left;
}

</style>
</head>
<body>


<div class="page" style="margin-top:-70px">
    <table class="patient-details" width="80%" border="0" cellspacing="0" cellpadding="0">
        <tr><td colspan="2"><br></td></tr>
        <tr>
            <td colspan="2">
                <table width="80%" border="0" cellspacing="0" cellpadding="0" style="font-size:15px;">
                    <tr>
                        <td height="" valign="top" align="right">
                            <table width="93%" border="0" align="right" style="vertical-align:text-top; margin-top-0px;" cellpadding="0" cellspacing="0" >
                                <tr>
                                    <td><div align="left"><b>Patient Name: </b></div></td>
                                    <td><?php echo $pname_type." ".$pname; ?></td>
                                    <td width="40%"><?php echo date('d.M Y',strtotime($newdate)); ?> &nbsp;&nbsp;&nbsp;</td>
                                    <!-- <td><?php echo $bill_num; ?> </td> -->
                                    <td><div align="left"><b> </b></div></td>
                                    <td><b></b></td>
                                </tr>

                                <tr>
                                    <td><div align="left"><b>Mobile Number: </b></div></td>
                                    <td><?php echo $mobile?></td>
                                    
                                    </tr>
                                <tr>
                                    <td width="40%"><div align="left"><b>Patient Sex/Age</b> </div></td>
                                    <td width="40%"><?php echo $sex."/". $age; ?></td>
                                    <td width="40%"><div align="left"><b>Master Id : </b></div></td>
                                </tr>
                                <tr>
                                    <td width="40%"><div align="left"><b>Receipt No:</b> </div></td>
                                    <td><?php echo $bill_num; ?> </td>
                                    <td><?php echo $registerno;?> </td>
                                    <td width="40%"><div align="left"><b> </b></div></td>
                                    <td></td>
                                </tr>
                
                                <tr>
                                    <td><div align="left"><b>City: </b></div></td>
                                    <td><?php echo $address; ?></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td><div align="left"><b> </b></div></td>
                                    <td style="font-size:12px"><b><?php echo $tnum+4;?></b></td>
                                    <td><b></b></td>
                                </tr>
                                <tr>
    <td colspan="2" style="padding-top: 170px; ">
        <div style="display: flex; align-items: center; margin-left: -270px; color: green; margin-top: -40px; font-size: 25px;">
            <b>Consultant Doctor: </b>
           <span style="margin-left: 10px;"><?php echo $doctorname; ?>,<br> <?php echo $dsi1; ?></span>
        </div>
    </td>
</tr>

                            </table>
                            <div align="center" >
    <input type="button" value="Print" id="prnt" class="styled-button-2" onclick="prnt();"/> 
    <a href="../pages/book_appointment.php"><input type="button" value="Close" id="cls" class="styled-button-2" onclick="closew();"/></a>
</div>
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>



