<?php
include("../db/connection.php");

 $sdate=$_GET['sdate'];
 $edate=$_GET['edate'];
 $ftime=$_GET['ftime'];
 $ttime=$_GET['etime'];
$sess=$_GET['ses'];
 $sdate1=date('Y-m-d',strtotime($sdate));
 $edate1=date('Y-m-d',strtotime($edate));
 $finalfromdate=$sdate1.' '.$ftime;
 $finaltodate=$edate1.' '.$ttime;
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Amount Collection</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
             window.close();
            }
            function closs()
            {
                window.close();
            }
        </script>
        <style type="text/css">
            .header{
                font-family: monospace,sans-serif,arial;
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-decoration: underline;
            }
            .heading1 {	
                    font-size:24px;
                    text-align:center;
                    font-weight: bold; 
            }
            .heading2 {	
                font-size:16px;
                text-align:center;
            }
            body {
	background: #FFFFFF;
}
        </style>
    </head>
    <body>
<?php 
include("config.php");

?>
<table align="center">
<tr><td ><img src="../img/raajtop.PNG" style="width:100%; height:120px;"/></td></tr>
</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Admited Patients List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        <tr>
                            <td align="right"><b>From: </b></td>
                            <td align="left"><?php echo $sdate?> </td>
                            <td align="right" colspan="2" style="text-align:center"></td>
                            <td align="right"><b>To: </b></td>
                            <td align="left"><?php echo $edate?></td>
                        </tr>
                        <tr>
							<td align="center"><b>S.No.</b></td>
                             <td align="center"><b>UMR No.</b></td>
                           <td align="center"><b>Patient Name</b></td>
                            <td align="center"><b>Mobile No</b></td>
                             <td align="center"><b>Age/Gender</b></td>
							<td align="center"><b>Join  Date</b></td>
                            
                            
							
						</tr>
                        <?php
						
						//$qry1="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill1  where  BillDate between '$sdate1' and '$edate1'";
                    
                    // $pp="select distinct BillNO,BillDate,PatientName,NetAmount,PaidAmount,BalanceAmount from bill where BillDate between '$sdate1' and '$edate1'";
					
					
					 // $p="select distinct a.registerno,a.patientname,b.ADMIT_DATE,a.age,a.gender,a.phoneno,b.PAT_NO,b.DIS_STATUS,b.BILL_STATUS 
				//	from patientregister a ,ip_pat_admit b,daily_amount c where   a.registerno=b.PAT_REGNO and a.registerno=c.mrnum and b.DIS_STATUS='ADMITTED'  and  b.ADMIT_DATE between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') order by a.date asc";
                    
					 
					 if($sess=='admin')
					 $p="select distinct a.registerno,a.patientname,b.ADMIT_DATE,a.age,a.gender,a.phoneno,b.PAT_NO,b.DIS_STATUS,b.BILL_STATUS 
					from patientregister a ,ip_pat_admit b where a.registerno=b.PAT_REGNO and b.DIS_STATUS='ADMITTED'  and  b.ADMIT_DATE between  '$sdate1' and '$edate1'";
                       
					 else
					  //echo $p="select distinct a.registerno,a.patientname,b.ADMIT_DATE,a.age,a.gender,a.phoneno,b.PAT_NO,b.DIS_STATUS,b.BILL_STATUS 
				//	from patientregister a ,ip_pat_admit b,daily_amount c where   a.registerno=b.PAT_REGNO and a.registerno=c.mrnum and b.DIS_STATUS='ADMITTED' and c.recv_by='$sess' and  b.ADMIT_DATE between convert_tz('$finalfromdate','+0:00','-5:30')  and convert_tz('$finaltodate','+0:00','-5:30') order by a.date asc";
				$p="select distinct a.registerno,a.patientname,b.ADMIT_DATE,a.age,a.gender,a.phoneno,b.PAT_NO,b.DIS_STATUS,b.BILL_STATUS 
					from patientregister a ,ip_pat_admit b where a.registerno=b.PAT_REGNO and b.DIS_STATUS='ADMITTED'  and  b.ADMIT_DATE between  '$sdate1' and '$edate1'";
                       	
						$qry=mysqli_query($link,$p) or die(mysqli_error($link));
						//exit;
						if($qry){
						$i=0;
						$total1=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $bno = $res['registerno'];
							 $pname = $res['patientname'];
							  $phoneno=$res['phoneno'];
							 $age = $res['age'];
							 $sex = $res['gender'];
							 //$tokenno = $res['PAT_NO'];
							// $ptype = $res['pat_type'];
							 
							
							 $date1 = $res['ADMIT_DATE'];
							
							$date3=date('d-m-Y',strtotime($date1));
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $bno?></td>
                              <td align="center"><?php echo $pname ?></td>
                            <td align="center"><?php echo $phoneno ?></td>
                            <td align="center"><?php echo $age."/".$sex ?></td>
                            
                               <td align="center"><?php echo $date3 ?></td>
                         
                            
                          
                          
                           
                        
						</tr>
                       <?php } }?>
					  
						
						
						
						
						 
						
						
						
                    </table>
                </td>
            </tr>
            
            
    

<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
       
    </body>
</html>