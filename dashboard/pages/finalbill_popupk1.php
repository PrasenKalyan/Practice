

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

	<head>
		<?php
			//include("header.php");
		?>

<script type="text/javascript">
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function validate(){
	
	var emp_value ="";
	//var selected=false;

  for (var i=0; i < document.docpat.empid.length; i++){

   if (document.docpat.empid[i].checked){
	   var emp_value = document.docpat.empid[i].value;
	 //alert("emp val -->"+emp_value);     
   }
  }
  if( emp_value == "" || emp_value== null ){
	 	  alert("Please select Patient Name");
	  return false;
  }
  return true
}
  function showDoc(cc){
	
		 xmlHttp=GetXmlHttpObject();
		  if (xmlHttp==null){
			  alert ("Browser does not support HTTP Request")
				  return
		  }
			  var url="finalbill_popupk4.php"
			  url=url+"?emp_id="+cc;
                
			  xmlHttp.onreadystatechange=stateChanged 
				  xmlHttp.open("POST",url,true)
				  xmlHttp.send(null)
	 }
			
function stateChanged(){ 
	  if (xmlHttp.readyState==4){ 
		  var showdata = xmlHttp.responseText; 
		  //alert(showdata);
		  var strar = showdata.split("|");
		//alert(strar);
		  if(strar.length>0){
			 //window.opener.location.reload();
			 //window.location.reload(); 
	// alert(strar.length);
		//"|" + emp_id + "|" + 2 name + "|" +  regno + "|" + age + "|" + 5sex + "|" + admdt + "|" + 7constype + "|" + conscard + "|" + admfee + "|" + diet; data=data + "|" + consultantfee1+ "|" +  invgfee + "|" + 13 therfee + "|" + 14 carmfee + "|"+ consinvgfee + "|"+ 16 totrent + "|" +17 adv_amt + "|" +18 bedno + "|" +019 arogya_amount + "|"+ 20 admfee_cons + "|" +21 out side +service +22 attender;

	//alert('<%=current_date%>')
			opener.document.getElementById("custname3").value=strar[6];
			opener.document.getElementById("age").value=strar[2];
			opener.document.getElementById("sex1").value=strar[3];
			opener.document.getElementById("consultant_name1").value=strar[4];
			opener.document.getElementById("mob").value=strar[5];
			opener.document.getElementById("ckrk").value=strar[1];
			//opener.document.getElementById("patregno").value=strar[3];
			//opener.document.getElementById("age").value=strar[4];
			//opener.document.getElementById("sex").value=strar[5];
			//opener.document.getElementById("addr").value=strar[6];
			//opener.document.getElementById("con_doct").value=strar[7];
			//opener.document.getElementById("rel_type").value=strar[8];
			//opener.document.getElementById("rel_name").value=strar[9];
			//opener.document.getElementById("contact").value=strar[10];
			//document.getElementById("conce").style.display='';
			//document.getElementById("conce1").style.display='';
			 //document.getElementById("age").value=strar[2];
			  //document.getElementById("sex1").value=strar[3];
			  //document.getElementById("consultant_name1").value=strar[4]; 
			  //opener.document.getElementById("mob").value=strar[5];
			  //document.getElementById("cconcessiontype").value=strar[4];
			 // document.getElementById("custname2").value=strar[6].trim();
			 // document.getElementById("ccardno").value=strar[7];
			 // var cc=strar[4].trim();
			
			 // if(!(cc=="Other")){
			  //  document.getElementById("stype").value="E";
			   //document.form.bill[0].disabled = true;
				//	document.form.bill[0].checked=false;
				//	document.form.bill[1].checked=true;
			//  }
			 // else{
			 // document.getElementById("stype").value="C";
			 //  document.form.bill[0].disabled = false;
			 // document.form.bill[0].checked=true;
			 // }
			
			
   			   window.close();
		  }
	  }
  }
  


function GetXmlHttpObject(){
	  var xmlHttp=null;
	  try{
		  // Firefox, Opera 8.0+, Safari
		  xmlHttp=new XMLHttpRequest();
	  }
	  catch (e){
		  //Internet Explorer
		  try{
			  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		  catch (e){
			  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
	  }
	  return xmlHttp;
  }
  </script>
	</head>

	<body>

	
                       <form name="frm" method="post" >
           
                
<table width="70%" cellspacing="2">

<tr><td></td><td>Search By Patient Name : <!--<input type="text" name="name" id="name" required />-->

<input id="pname" list="city1"  name="name" ><datalist id="city1" required >
<?php
include('../db/connection.php');
 $sql="select distinct registerno from patientregister as a,ip_pat_admit as b where a.registerno=b.pat_regno and upper(dis_status) not like upper('discharged%') order by a.reg_id desc "; $r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {echo  "<option value='$row[registerno]'/>";}echo '</datalist>';?>
</td>
<td align="left"><input name="submit" type="submit" value="" style="background:url(../img/go1.gif);width:42px;height:22px;border-style:none;" /></td></tr>


</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="1" id="expense_table" style="font-size:14px;">
<tr height="25px"><th></th><TH>PATIENT UMR No</TH><!--<TH>PATIENT MOBILE.</TH>--><TH>PATIENT NAME</TH></tr>
<?php 
			 include('../db/connection.php');
			  
			   if(isset($_REQUEST['submit'])){
				$n=$_REQUEST['name'];
					
			    if($n != "")
				{
					$sq=mysqli_query($link,"
					select distinct pat_no,patientname,a.registerno,b.PAT_REGNO from patientregister as a,ip_pat_admit as b where a.registerno=b.pat_regno and a.registerno='$n' and upper(dis_status) not like upper('discharged%') order by a.reg_id desc
					");
				}
			   if($sq)
			   {
			   $rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			 $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;"><input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/></td><td><?php echo $r ?></td><td><?php echo $h;?></td></tr>
             
				 <?php }
			 }
			 }
			 else{
				 // $x="select distinct a.PAT_NO,b.patientname,b.registerno from ip_pat_admit as a,patientregister as b
				  // WHERE a.pat_regno=b.registerno AND a.dis_status='ADMITTED'";
				  $x="select distinct PAT_NO,patientname,a.registerno,b.PAT_REGNO from patientregister as a,ip_pat_admit as b where a.registerno=b.pat_regno and upper(dis_status) not like upper('discharged%') order by a.reg_id desc";
				$sq=mysqli_query($link,$x);
	 
			if($sq){	
				$rows=mysqli_num_rows($sq);
			  
			  while($res=mysqli_fetch_array($sq)){
			 
			  $a = $res['PAT_NO'];
			  $h = $res['patientname'];
			  $r = $res['registerno'];
			 ?>
             <tr height="25px"><td style="text-align:center;">
             <input type="radio" name="empid" value="<?php echo $a ?>" onclick="javascript:showDoc(this.value);"/></td>
             <td><?php echo $r ?></td><td><?php echo $h;?></td></tr>
             <?php }
			 
			 }
			 }
			 ?></table>
              <?php if($rows==0){?>
	<table align="center" style="margin-left:250px;"><tr><th style="color:#FF0000; " align="center">
	<?php echo "No Records Found";}?></th></tr></table>


 
			
	</body>

</html>

