<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>KERTHIKEYA SPECIALITY CLINICS</title>
<style>
  body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.5s ease;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
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
</style>

<script>
    function addMedicine() {
        var table = document.getElementById("medicine-options");
        var newRow = table.insertRow(-1);
        newRow.innerHTML = `
            <td>Drug Form:</td>
            <td><input type="text" name="drug_form[]"></td>
            <td>Drug Name:</td>
            <td><input type="text" name="drug_name[]"></td>
            <td>Frequency:</td>
            <td><input type="text" name="frequency[]"></td>
            <td>How to Take:</td>
            <td><input type="text" name="how_to_take[]"></td>
            <td>No. of Days:</td>
            <td><input type="text" name="no_of_days[]"></td>
        `;
    }

    function removeMedicine() {
        var table = document.getElementById("medicine-options");
        if (table.rows.length > 1) {
            table.deleteRow(-1);
        }
    }
</script>
<script type="text/javascript">
        function openPopup() {
            window.open("med_list.php", "Med List", "width=600,height=400");
        }
    </script>
</head>

<body>
<!--<div class="book">
    <div class="page">
        <div class="subpage">-->
        <?php 
include("../db/connection.php");
$id=$_GET['id'];
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
	

}



 $dd="select * from referal_doctor where refcode = '$ref_doc'";
$docid = mysqli_query($link,$dd);



	



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
      $drug_form = unserialize($s['drug_form']);
      $drug_name = unserialize($s['drug_name']);
      $frequency = unserialize($s['frequency']);
      $how_to_take = unserialize($s['how_to_take']);
      $no_of_days = unserialize($s['no_of_days']);
  } else {
      // Initialize empty arrays to avoid undefined variable notices
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


	

<table align="center"> <tr><td><img src="../img/raajtop.png" style="width:100%; height:100px;"  ></td></tr>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; margin-left:25px; margin-right:10px;">

<hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">PATIENT DETAILS</h4>
		<hr>
		<table width="93%" border="0" align="left" style="vertical-align:text-top; margin-top-10px;" cellpadding="1" cellspacing="0" >
          
        <tr>
           
           <td><div align="left"><b>Consultant Doctor: </b></div></td>
           <td><?php echo $doctorname?>, <?php echo $dsi1?></td>
          <td><div align="left"><b> </b></div></td>
          <td><b></b></td>
         </tr>


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
           
            <td><div align="left"><b>Received with Thanks: </b></div></td>
			<td>Rs.<?php echo $cons_fee;  ?></td>
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
           
            <td><div align="left"><b>Mobile Number: </b></div></td>
			<td><?php echo $mobile?></td>
           <td><div align="left"><b> </b></div></td>
		   <td><b></b></td>
          </tr>
		  
         
			 <tr>
           
            <td><div align="left"><b>Towards: </b></div></td>
			<td><?php echo $pat_type;?></td>
           <td><div align="left"><b> </b></div></td>
		   <td style="font-size:25px"><b><?php echo $tnum+4;?></b></td>
          </tr>		
        </table>

		</td>
        <td>
</table>
          
        

	
        <td  valign="top" >

   
		
		
         <hr>
		<h4 align="center" style="margin-left:-100px; height: 8px;">PATIENT SUMMARY</h4>
		<br><br>
    
<form action="save_summary.php" method="POST">
    <input type="hidden" name="patient_id" value="<?php echo $id; ?>">
    <input type="hidden" name="registerno" value="<?php echo $registerno; ?>">

    <table align="center" style="background:#FFFFFF; margin-left:25px; margin-right:10px;">
        <tr>
            <td>Presenting Complaints:</td>
            <td><textarea name="presenting_complaints"><?php echo $s['presenting_complaints']; ?></textarea></td>
        </tr>
        <tr>
            <td>Examination Findings:</td>
            <td><textarea name="examination_findings" rows="4" cols="50"><?php echo $s['examination_findings']; ?></textarea></td>
        </tr>
        <tr>
            <td>Diagnosis:</td>
            <td><textarea name="diagnosis" rows="4" cols="50"><?php echo $s['diagnosis']; ?></textarea></td>
        </tr>
        <tr>
            
            <td>Treatment:</td>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="4">
                <a href="javascript:void(0);" onclick="openPopup()">Med List</a>
                    <tbody id="medicine-options">
                        <?php for ($i = 0; $i < count($drug_form); $i++) { ?>
                            <tr>
                                <td>Drug Form:</td>
                                <td><input type="text" name="drug_form[]" value="<?php echo $drug_form[$i]; ?>"></td>
                                <td>Drug Name:</td>
                                <td><input type="text" name="drug_name[]" value="<?php echo $drug_name[$i]; ?>"></td>
                                <td>Frequency:</td>
                                <td><input type="text" name="frequency[]" value="<?php echo $frequency[$i]; ?>"></td>
                                <td>How to Take:</td>
                                <td><input type="text" name="how_to_take[]" value="<?php echo $how_to_take[$i]; ?>"></td>
                                <td>No. of Days:</td>
                                <td><input type="text" name="no_of_days[]" value="<?php echo $no_of_days[$i]; ?>"></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tr>
                        <td colspan="10">
                            <button type="button" onclick="addMedicine()">Add Medicine</button>
                            <button type="button" onclick="removeMedicine()">Remove Medicine</button>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>Investigations:</td>
            <td><textarea name="investigations" rows="4" cols="50"><?php echo $s['investigations']; ?></textarea></td>
        </tr>
        <tr>
            <td>Precautions:</td>
            <td><textarea name="precautions" rows="4" cols="50"><?php echo $s['precautions']; ?></textarea></td>
        </tr>
        <tr>
            <td>Follow-ups:</td>
            <td><textarea name="follow_ups" rows="4" cols="50"><?php echo $s['follow_ups']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Save Summary" class="styled-button-2">
                <a onclick="return confirm('Are you sure you want to Print this Report?');" href="print_report.php?id=<?php echo $r['reg_id'];?>">
																	<img src="../img/print.png"></a>
                                                                    <a onclick="return confirm('Are you sure you want to Print this Report?');" href="print_report2.php?id=<?php echo $r['reg_id'];?>">
																	<img src="../img/print.png"></a>
                                                                    <a onclick="return confirm('Are you sure you want to Print this Report?');" href="print_nosum.php?id=<?php echo $r['reg_id'];?>">
																	<img src="../img/print.png"></a>
                                                                    <a onclick="return confirm('Are you sure you want to Print this Report?');" href="print_nosum2.php?id=<?php echo $r['reg_id'];?>">
																	<img src="../img/print.png"></a>
            </td>
                                                                </td>
        </tr>
    </table>
</form>

</table>

   </div> 

        </div>    
    </div>

    
</div>
</body>
</html>