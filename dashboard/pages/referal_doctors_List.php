<?php
include("../db/connection.php");

// $sdate=$_GET['sdate'];
 //$edate=$_GET['edate'];
// $sdate1=date('Y-m-d',strtotime($sdate));
// $edate1=date('Y-m-d',strtotime($edate));
 
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Patients Report</title>
        <script type="text/javascript">
            function printt()
            {
                document.getElementById("prt").style.display="none";
                document.getElementById("cls").style.display="none";
             window.print();
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
<table >
<tr><td ><img src="../img/raajtop.png" style="width:100%; height:120px;"/></td></tr>


</table>
<table width="100%" cellpadding="0" cellspacing="0"> 
    <tr height="20px"></tr>        
    <tr>
        <td>      
        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td class="header">Referal Doctors  List</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table cellpadding="4" cellspacing="0" width="100%" border="1">
                        
                        <tr>
							<td align="center"><b>S.No.</b></td>
                            <td align="center"><b>Ref.Code.</b></td>
                            <td align="center"><b>Dr. Name</b></td>
                            
                             <td align="center"><b>Mobile No</b></td>
							<td align="center"><b>Address</b></td>
                            <td align="center"><b>Doctor Share(%)</b></td>
							 <td align="center"><b>IP Lab Share(%)</b></td>
                              <td align="center"><b>Op Lab Share(%)</b></td>
                           
                            
							
                            
							
						</tr>
                        <?php
						
                     
						$qry=mysqli_query($link,"select * from referal_doctor");
						if($qry){
						$i=0;
					 	 while($res=mysqli_fetch_array($qry)){
								
							 
							 
							 $ref_docname = $res['ref_docname'];
							  $ref_code = $res['refcode'];
							 $mobile = $res['mobile'];
							 $email = $res['address'];
							 $iplabshare = $res['iplabshare'];
							 $oplabshare = $res['oplabshare'];
							 
							 $doctorshare = $res['doctorshare'];
							  
							
							 $i++;
						 ?>
                        <tr>
                            <td align="center"><?php echo $i ?></td>
                             <td align="center"><?php echo $ref_code ?></td>
                             <td align="center"><?php echo $ref_docname ?></td>
                              <td align="center"><?php echo $mobile ?></td>
                            <td align="center"><?php echo $email ?></td>
                             <td align="center"><?php echo $doctorshare ?></td>
                              <td align="center"><?php echo $iplabshare ?></td>
                               <td align="center"><?php echo $oplabshare ?></td>
                            
                           
                          
                           
                        
						</tr>
                       <?php } }?>
					   
                    </table>
                </td>
            </tr>
        </table>
        </td>
    </tr> 
	<!--<tr>
	<td align="right"><img src="images/images.png"/></td>
	</tr>
-->
<tr><td>&nbsp;</td></tr>
<tr>
    <td align="center"><input type="button" value="Print" id="prt" class="butbg" onclick="printt()"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Close" id="cls" class="butbg" onclick="closs()"/></td>
</tr>
        </table>
    </body>
</html>
