<?php
session_start();
 $ses= $_SESSION['user'] ;
 if($_SESSION['user'])

{
 ?>
<?php include("header.php");

//$rsp=mysqli_query($link,"select distinct product_name from phr_purinv_dtl where balance_qty>0");
	//while($rs = mysqli_fetch_array($rsp)){
	//	$name1[]=$rs[0];
	//}
?>
<link rel="stylesheet" href="../css/all1.css" type="text/css" /> 
<script>
function showHint21(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("mobileno").value=strar[1];
	document.getElementById("caddress").value=strar[2];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>
<script>
function showHint22(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("mobileno1").value=strar[1];
	document.getElementById("address1").value=strar[2];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search16.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint23(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("custname").value=strar[1];
	document.getElementById("caddress").value=strar[2];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search161.php?q="+str,true);
xmlhttp.send();
}
</script>

<script>
function showHint24(str)
{

if (str.length==0)
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
	var show=xmlhttp.responseText;
	var strar=show.split(":");
	//document.getElementById("supname").value=strar[2];
	
	document.getElementById("custname3").value=strar[1];
	document.getElementById("address1").value=strar[2];
	
    }
  }
  str = encodeURIComponent(str);
xmlhttp.open("GET","search161.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">

function val(str,id)
{


var srate1=document.getElementById("ucost"+id).value;
if(srate1=='' || srate1==null){srate1=0;}
var totqty=document.getElementById("bal"+id).value;
if(totqty=='' || totqty==null){totqty=0;}
if(str>eval(totqty)){alert("Please Enter Sale Quantity Below "+totqty);document.getElementById("sqty"+id).value="";return false;}
//alert("srate1--"+srate1)
//alert("str--"+str)
var prev=document.getElementById("value"+id).value;
var srate2=0;

if(str==null || str==''){srate2=0;}else{
srate2=eval(str)*eval(srate1);
}



document.getElementById("value"+id).value=Math.abs(srate2);
var vall=document.getElementById("rowval").value;
if(vall=='' || vall==null){vall=0;}
if(eval(vall)==0)
vall=eval(vall)+eval(srate2);
else{if(prev==null || prev==''){prev=0;}
vall=eval(vall)-eval(prev);
vall=eval(vall)+eval(srate2);
//for discount
}
var sqty=document.getElementById("sqty"+id).value;
if(sqty=='' || sqty==null){sqty=0;}
var srat=document.getElementById("ucost"+id).value;
if(srat=='' || srat==null){srat=0;}
var vat=document.getElementById("vat"+id).value;
if(vat=='' || vat==null){vat=0;}
vatamt=((eval(sqty)*eval(srat)*eval(vat))/100); //alert(at);
document.getElementById("vat"+id).value= Math.abs(vatamt);

var doscount=document.getElementById("dis"+id).value;
if(doscount=='' || doscount==null){doscount=0;}
if(doscount==0){
document.getElementById("amt"+id).value=Math.abs((eval(srate2)));
}else{
var value=document.getElementById("value"+id).value;
var at=Math.abs((eval(value))-(eval(value))*(eval(str))/100);
//var at1=Math.abs(eval(at)+(eval(at)*eval(vat)/100));
var vat=document.getElementById("vat"+id).value;
if(vat=='' || vat==null){vat=0;}
//document.getElementById("amt"+id).value=Math.abs((eval(srate2))+(eval(srate2))*(eval(vat))/100);
}
var sum=0;
 var totaldiscount=0;
	 var count=document.form.rows.value;
	for(i=1;i<=count;i++)
	{
	    var txtAmt="amt"+i;
		 var discount="dis"+i;
		var amt1=document.getElementById(txtAmt).value;
                if(amt1=='' || amt1==null){amt1=0;}
		var discount=document.getElementById(discount).value;
                if(discount=='' || discount==null){discount=0;}
		var amt=eval(amt1);
		sum=eval(sum)+eval(amt)
		totaldiscount=eval(totaldiscount)+eval(discount)/count
		document.getElementById("disc").value= Math.round(totaldiscount);	
		document.getElementById("nettotal").value= Math.round(sum);	
		document.getElementById("grand").value= Math.round(sum);
	}
	document.getElementById("total").value=vall;
document.getElementById("rowval").value=vall;

}
function discal(str,id){
var value=document.getElementById("value"+id).value;
if(value=='' || value==null){value=0;}
var disamt=Math.abs((eval(value))-(eval(value))*(eval(str))/100);

var vat=document.getElementById("va"+id).value;
if(vat=='' || vat==null){vat=0;}
document.getElementById("amt"+id).value=Math.abs((eval(disamt)));
//Math.abs((eval(disamt))+(eval(disamt))*(eval(vat))/100);
//Math.abs(disamt);





 var sum=0;
 var totaldiscount=0;
	 var count=document.form.rows.value;
	for(i=1;i<=count;i++)
	{
	    var txtAmt="amt"+i;
		 var discount="dis"+i;
		var amt1=document.getElementById(txtAmt).value;
                if(amt1=='' || amt1==null){amt1=0;}
		var discount=document.getElementById(discount).value;
                if(discount=='' || discount==null){discount=0;}
		var amt=eval(amt1);
		sum=eval(sum)+eval(amt)
		totaldiscount=eval(totaldiscount)+eval(discount)/count
		document.getElementById("disc").value= Math.round(totaldiscount);	
		document.getElementById("nettotal").value= Math.round(sum);
                 document.getElementById("amount").value= Math.round(sum);
				  document.getElementById("grand").value= Math.round(sum);
	}

 }
function tot()
{
	var sum3=0;
	var count3=document.form.rows.value;
	for(l=1;l<=count3;l++)
	{
		var value3="value"+l;
		var value4=document.getElementById(value3).value;
		var amt=eval(value4);
		if(amt==null || amt==''){amt=0;}
		sum3=eval(sum3)+eval(amt);
		document.form.total.value=eval(sum3).toFixed(2);
		document.form.nettotal.value=eval(sum3).toFixed(2);
	}
}

function noitems(){
var sum=0;
var count=document.form.rows.value;
for(l=1;l<=count;l++)
	{
var str=document.getElementById("sqty"+l).value;
sum=eval(sum)+eval(str);
}//for

document.getElementById("rows").value=count;
}//fun
function amount_cal()
{
     //alert("hai");
     var cal=0;
	 var cal1=document.getElementById("grand").value;
	 var cal2=document.getElementById("amount").value;
	 
	 cal=eval(cal2)-eval(cal1);
	
	 document.form.amount1.value=eval(cal).toFixed(2);
	 
}
var xmlHttp



////To get Sub A/c Names///////////

function showBatch(str,str1)
{ 
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
var url="getbatch_1.php";
url=url+"?pname="+str+"&row="+str1;
document.getElementById("str").value=str1;
xmlHttp.onreadystatechange=stateChanged2;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged2() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 	var str=document.form.str.value
	     var showdata = xmlHttp.responseText; 
	    document.getElementById("batchdiv"+str).innerHTML=showdata;
		 document.getElementById("bachno"+str).focus();
	}
}


function showMAName(str,str1,str2)
{ str2=document.getElementById("btype").value;
	//alert("1"+1);
//	alert(str2)
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
//alert("str1="+str1);
st = str1;
var url="getsname.php";
url=url+"?pname="+str+"&rowid="+str1+"&btype1="+str2;
//alert("url"+url);
document.getElementById("str").value=st;
xmlHttp.onreadystatechange=stateChanged1;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChanged1() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 
	     var showdata = xmlHttp.responseText; 
		var str=document.form.str.value
		 var strar = showdata.split(":");
		//alert("str="+str);
		//alert(strar);
		document.getElementById("bal"+str).value=strar[1];
			  document.getElementById("mfg"+str).value=strar[2];
			  document.getElementById("exp"+str).value=strar[3];
			  document.getElementById("ucost"+str).value=strar[4];
			 // document.getElementById("pcode"+str).value=strar[5];
			   document.getElementById("vat"+str).value=strar[5];
			   document.getElementById("gst"+str).value=strar[6];
			  document.getElementById("sqty"+str).focus();
			
			/* document.getElementById("bal"+str).value=strar[1];
			  document.getElementById("mfg"+str).value=strar[2];
			  document.getElementById("exp"+str).value=strar[3];
			  document.getElementById("ucost"+str).value=strar[4];
			  document.getElementById("pcode"+str).value=strar[5];
			   document.getElementById("pcode"+str).value=strar[6];
			   document.getElementById("vat"+str).value=strar[7];
			  document.getElementById("sqty"+str).focus();
			*/
	}
}

function patientdetails(str)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
//alert(str);
var url="getPatientDetails.php";
url=url+"?pname="+str;
xmlHttp.onreadystatechange=stateChangedpat;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedpat() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 
	     var showdata = xmlHttp.responseText; 
		
		 var strar = showdata.split(":");
		//alert(strar);
			document.getElementById("conce").style.display='';
			document.getElementById("conce1").style.display='';
			 document.getElementById("age").value=strar[1];
			  document.getElementById("sex1").value=strar[2];
			  document.getElementById("consultant_name1").value=strar[3]; 
			  //document.getElementById("cconcessiontype").value=strar[4];
			  document.getElementById("custname2").value=strar[5].trim();
			  document.getElementById("ccardno").value=strar[6];
			  var cc=strar[4].trim();
			
			  if(!(cc=="Other")){
			    document.getElementById("stype").value="E";
			   document.form.bill[0].disabled = true;
					document.form.bill[0].checked=false;
					document.form.bill[1].checked=true;
			  }
			  else{
			  document.getElementById("stype").value="C";
			   document.form.bill[0].disabled = false;
			  document.form.bill[0].checked=true;
			  }
			  
			 
			
	}
}
function patientdetails1(str)
{ 

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Your browser does not support AJAX!");
		return;
	} 
	
//alert(str);
var url="getPatientDetails1.php";
url=url+"?pname="+str;
xmlHttp.onreadystatechange=stateChangedpat1;
xmlHttp.open("GET",url,true);
xmlHttp.send(null);
}

function stateChangedpat1() 
{ 
  
	if (xmlHttp.readyState==4)
	{ 
	     var showdata = xmlHttp.responseText; 
		
		 var strar = showdata.split(":");
		//alert(strar);
			document.getElementById("conce").style.display='';
			document.getElementById("conce1").style.display='';
			 document.getElementById("krk").value=strar[1];
			  document.getElementById("sex").value=strar[2];
			  document.getElementById("consultant_name").value=strar[3]; 
			  //document.getElementById("cconcessiontype").value=strar[4];
			  document.getElementById("custname2").value=strar[5].trim();
			  document.getElementById("ccardno").value=strar[6];
			  var cc=strar[4].trim();
			
			  if(!(cc=="Other")){
			    document.getElementById("stype").value="E";
			   document.form.bill[0].disabled = true;
					document.form.bill[0].checked=false;
					document.form.bill[1].checked=true;
			  }
			  else{
			  document.getElementById("stype").value="C";
			   document.form.bill[0].disabled = false;
			  document.form.bill[0].checked=true;
			  }
			  
			 
			
	}
}


function GetXmlHttpObject()
{

var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}




</script>
<!-- <script type="text/javascript">
		$(function(){
$('#sqty1').keyup(function() { 

	var totalpoints1 = parseFloat($('#sqty1').val());
    var totalpoints = parseFloat($('#ucost1').val());
	var totalpoints2 = parseFloat($('#va1').val());
    $('#vat1').val((totalpoints1 * totalpoints*totalpoints2)/100);
});

});
</script>-->
<script type="text/javascript">



rows="2";
        function addRow(tableID) {   

if(document.getElementById("btype").value=="")
{
alert("Please Select Billing Type");
//rows--;
document.form.btype.focus();
return false;
}    
		var actb4=document.getElementById("actb").value;
		var actb5=eval(actb4)+1;
	
		document.getElementById("actb").value=actb5;
            var table = document.getElementById(tableID);   
            var rowCount = table.rows.length;
			var row = table.insertRow(rowCount);

			document.form.rows.value=(rowCount);
			
            var cell1 = row.insertCell(0);   
            var element1 = document.createElement("input"); 
		    element1.type = "checkbox"; 
			element1.name = "checkbox1"; 
			element1.id= "checkbox1"; 
			element1.value = actb5; 
			cell1.appendChild(element1); 
            
			
	//oCell = document.createElement("TD");
  //  oCell.innerHTML = "<input  type='text' name='pname"+rowCount+"' id='pname' class='textbox1' size='22'  onblur=showBatch(this.value,"+actb5+")>";
  //
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input id=\'pname"+rowCount+"\' list=\'city1"+rowCount+"\'  name='pname"+rowCount+"' onblur='showBatch(this.value,"+actb5+")' ><datalist id=\'city1"+rowCount+"\' ><?php $sql='select distinct product_name from phr_purinv_dtl '; $r=mysqli_query($link,$sql) or die(mysqli_error());
while ($row=mysqli_fetch_array($r)) {echo  "<option value=\'$row[product_name]\'/>";}echo '</datalist>';?></div>"; 
	
	row.appendChild(oCell);
	oCell = document.createElement("TD");
	oCell.innerHTML = "<div id='batchdiv"+actb5+"'><select name='bachno"+rowCount+"' class='select' style=width:75px id='bachno"+actb5+"'><option>Batch</option></select></div>"; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='bal"+rowCount+"' id='bal"+actb5+"' class='textbox1' readonly size='8'>"; 
    row.appendChild(oCell);
    
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type=text name='mfg"+rowCount+"' id='mfg"+actb5+"' class='textbox1' readonly size='7' >"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
    oCell.innerHTML = "<input type=text name='exp"+rowCount+"' id='exp"+actb5+"' class='textbox1' readonly size='7' >"; 
    row.appendChild(oCell);

    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='sqty"+rowCount+"' id='sqty"+actb5+"' size='5' onkeyup='val(this.value,"+actb5+")' class='textbox1'>"; 
    row.appendChild(oCell);

	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='ucost"+rowCount+"' id='ucost"+actb5+"' readonly class='textbox1'  size='5'>"; 
    row.appendChild(oCell);
	
	
	  
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input type='text' name='value"+rowCount+"' id='value"+actb5+"' class='textbox1' size='10'  readonly> "; 
    row.appendChild(oCell);
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='dis"+rowCount+"' id='dis"+actb5+"' value=0 class='textbox1' onkeyup='discal(this.value,"+actb5+")' size='5'> "; 
    row.appendChild(oCell);
	
oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='gst"+rowCount+"' id='gst"+actb5+"' readonly class='textbox1'  size='7'>"; 
    row.appendChild(oCell);
	
	
	
	
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='text' name='amt"+rowCount+"' id='amt"+actb5+"' class='textbox1' size='5'> "; 
    row.appendChild(oCell);
    oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='hidden' name='vat"+rowCount+"' id='vat"+actb5+"' readonly class='textbox1'  size='7'>"; 
    row.appendChild(oCell);
	oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='hidden' name='pcode"+rowCount+"' id='pcode"+actb5+"' class='textbox1' size='5'> "; 
    row.appendChild(oCell);
		oCell = document.createElement("TD");
	oCell.innerHTML = "<input  type='hidden' name='va"+rowCount+"' id='va"+actb5+"' readonly class='textbox1'  size='5'>"; 
    row.appendChild(oCell);
	
	var obj = actb(document.getElementById('pname'+actb5+''),customarray1);
        document.getElementById('pname'+actb5+'').focus();
	   }
           function deleteRow(tableID) {  
         try {  
		
            var table = document.getElementById(tableID);
			var rowss1 = table.rows.length;  
                        if (rowss1>2){
		      for(var i=1; i<rowss1; i++) {   
                var row = table.rows[i];  
				var chkbox = row.cells[0].childNodes[0];
				if(null != chkbox && true == chkbox.checked) {   
				  
		var chval=chkbox.value	
		//alert("chval"+chval);
var ccc=document.getElementById("value"+chval).value;
if(ccc=='' || ccc==null){ccc=0;}
var rwval=document.getElementById("rowval").value;
if(rwval=='' || rwval==null){rwval=0;}
var final1=eval(rwval)-eval(ccc);
document.getElementById("rowval").value=Math.abs(final1);
document.form.total.value=Math.abs(final1).toFixed(2);  
document.form.nettotal.value=Math.abs(final1).toFixed(2);
document.form.amount.value=Math.abs(final1).toFixed(2);				  
                    table.deleteRow(i); 
                   // rowss1 --;   
                    i--;
		} 
                document.form.rows.value=eval(i);
                document.getElementById("actb").value=eval(i);
             }
			 if(null != chkbox ) {   
			  alert ('You didnt choose any of the checkbox!');		
			  }
                        }
            }catch(e) {   
                
            }   
        }   
          
				

</script>
<script type="text/javascript">
function save(finflg)
{
var type=null;

var count=document.getElementById("rows").value

if(count!=0){

var radioSelected = false;
for (i = 0;  i < form.custm_type.length;  i++){

if (form.custm_type[i].checked)radioSelected = true;
}

if (!radioSelected){
alert("Please select one of the \"Customar Type\" options.");
return (false);    
} 
else
{
//alert(document.getElementById("custm_type1").checked)
if(document.getElementById("custm_type1").checked){

type=document.getElementById("custm_type1").value;
//alert(type);
}
else
{
type=document.getElementById("custm_type2").value;
//alert(type);
}
}
if(type=="c"){
  
	
	if(document.form.csex.selectedindex=0){
  alert("Please Select Sex");
  form.csex.focus();
   return false; 
    }
	
}else{




}

	if(document.form.btype.value=="")
{
alert("Please Select Billing Type");
form.btype.focus();
return false;
}

if(document.form.stype.value=="")
{
alert("Please Select Sales Type");
form.stype.focus();
return false;
}


if(document.form.saledate.value=="")
{
alert("Sale Date Filed is Empty");
form.saledate.focus();
return false;
}

}else{
	alert("Select Click add row");
	return false;
	}

	document.form.action="salesentry_insert.php";
	document.form.submit();
	
	
}
</script>
<script type="text/javascript">
function custom(str){
	
	//alert(str);
	if(str=='p'){
	document.getElementById("trcust").style.display='none';
	document.getElementById("trcustkrk").style.display='none';
	document.getElementById("trcust1").style.display='none';
	document.getElementById("trpat").style.display='';
	document.getElementById("trpat2").style.display='';
	document.getElementById("trpat1").style.display='none';
	document.getElementById("trpatk").style.display='none';
	//document.getElementById("trbill").style.display='';
	document.getElementById("conce2").style.display='none';
	document.getElementById("conce3").style.display='none';
	document.getElementById("conce").style.display='none';
	document.getElementById("conce1").style.display='none';
	document.getElementById("conce4").style.display='none';
	document.getElementById("conce5").style.display='none';
	document.getElementById("conce6").style.display='none';
	document.getElementById("conce7").style.display='none';
	
	document.getElementById("trpatcname").style.display='none';
	document.getElementById("trcust_con").style.display='none';
	}//if
	
	else if(str=='p1'){

	document.getElementById("trcustkrk").style.display='none';
	document.getElementById("trcust").style.display='none';
	document.getElementById("trcust1").style.display='none';
	document.getElementById("trpat").style.display='none';
	document.getElementById("trpatk").style.display='';
	document.getElementById("trpat1").style.display='';
	document.getElementById("trpat2").style.display='none';
	
	
	
	//document.getElementById("trpat").style.display='';
	//document.getElementById("trpat1").style.display='';
	//document.getElementById("trpat2").style.display='';
	//document.getElementById("trbill").style.display='';
	document.getElementById("conce2").style.display='none';
	document.getElementById("conce3").style.display='none';
	document.getElementById("conce").style.display='';
	document.getElementById("conce1").style.display='';
	document.getElementById("conce4").style.display='';
	document.getElementById("trpatcname").style.display='none';
	document.getElementById("trcust_con").style.display='none';
	}//if
	else if(str=='c'){

	document.getElementById("trcust").style.display='';
	document.getElementById("trcust1").style.display='';
	document.getElementById("trpatcname").style.display='';
	document.getElementById("trpat1").style.display='none';
	document.getElementById("trpat2").style.display='none';
	document.getElementById("trpat").style.display='none';
	document.getElementById("conce2").style.display='none';
	document.getElementById("conce3").style.display='none';
	document.getElementById("conce").style.display='none';
	document.getElementById("conce1").style.display='none';
	document.getElementById("conce4").style.display='none';
	document.getElementById("conce5").style.display='none';
	document.getElementById("conce6").style.display='none';
	document.getElementById("conce7").style.display='none';
	document.getElementById("trcust_con").style.display='';
	

	}
	
	
	else {
	document.getElementById("trcustkrk").style.display='';
	document.getElementById("trcust").style.display='';
	document.getElementById("trcust1").style.display='';
	document.getElementById("trpatcname").style.display='';
	document.getElementById("trpat1").style.display='none';
	document.getElementById("trpat2").style.display='none';
	document.getElementById("trpat").style.display='none';
	document.getElementById("conce2").style.display='none';
	document.getElementById("conce3").style.display='none';
	document.getElementById("conce").style.display='none';
	document.getElementById("conce1").style.display='none';
	document.getElementById("conce4").style.display='none';
	document.getElementById("conce5").style.display='none';
	document.getElementById("conce6").style.display='none';
	document.getElementById("conce7").style.display='none';
	document.getElementById("trcust_con").style.display='';
	}
	//else
	
	}//fun
	
	
function saletype(str){
	if(str=='Q'){
	document.getElementById("saletype1").style.display='';	
	document.getElementById("saletype1").innerHTML='Cheque No';									
	document.getElementById("saletype2").style.display='';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
}
	else if(str=="D"){
	document.getElementById("saletype1").style.display='';	
	document.getElementById("saletype1").innerHTML='Credit/Debit No';									
	document.getElementById("saletype2").style.display='';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
	
	}//elseif
	else if(str=="C"){
	
	document.getElementById("saletype1").style.display='none';	
	document.getElementById("saletype2").style.display='none';
	document.form.bill[0].disabled = false;
	document.form.bill[0].checked=true;
	
	}//elseif
	else{
	document.getElementById("saletype1").style.display='none';	
	document.getElementById("saletype2").style.display='none';
	document.form.bill[0].disabled = true;
	document.form.bill[0].checked=false;
	document.form.bill[1].checked=true;
	}//else
	
	}//fun
	</script>

			 <!-- end sidebar menu -->
			<!-- start page content -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-bar">
                        <div class="page-title-breadcrumb">
                            <div class=" pull-left">
                                <div class="page-title">Add Sales Entry </div>
                            </div>
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li><a class="parent-item" href="salesentry_list.php">Sales Invoice </a>&nbsp;<i class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Add Sales Entry </li>
                            </ol>
                        </div>
                    </div>
				<?php 	
				
				 $a="select max(lr_no) from phr_purinv_mast";
				$sql = mysqli_query($link,$a);
if($sql)
{
	$row = mysqli_fetch_array($sql);
	$pnid = $row[0];
}
		?>			
					
					
					
					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card card-box">
                                <div class="card-head">
                                    <header>Sales Entry</header>
                                    <button id = "panel-button3" 
				                           class = "mdl-button mdl-js-button mdl-button--icon pull-right" 
				                           data-upgraded = ",MaterialButton">
				                           <i class = "material-icons">more_vert</i>
				                        </button>
				                        <!--<ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
				                           data-mdl-for = "panel-button3">
				                           <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
				                           <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
				                        </ul>-->
                                </div>
								
								 <form name="form" method="post" action="insert_purchase_invoice.php" >
                                <div class="card-body " id="bar-parent2">
                                	<div class="row">
	                                    <div class="col-md-6 col-sm-6">
	                                        <!-- text input -->
	                                        <div class="form-group">
	                                            <label><strong>Customer Type</strong></label>
	                                          <input type="radio" name="custm_type" id="custm_type1" value="c" onclick="javascript:custom(this.value)"/>
                      Customer
						&nbsp;
                        <input type="radio" name="custm_type" id="custm_type3" value="p1" onclick="javascript:custom(this.value)"/>
                       OP Patients
						&nbsp;
                        
                         <input type="radio" name="custm_type" id="custm_type2" value="p" onclick="javascript:custom(this.value)"/>
                      IP Patients
                      <input type="radio" name="custm_type" id="custm_type2" value="h" onclick="location.href='addsalesentry_hosp.php'"/>
                      Hospital  </div>
                      
                      <div class="form-group" style="display:none" id="trcustkrk">
                      <input type="radio" name="ctyp" value="Existing" checked="checked" />Existing &nbsp;
                 <a href="add_customer.php"><input type="radio" name="ctyp" value="New"
                  onclick="javascript:location.href='add_customer.php'" />New</a>  </div>
                  
                  <div class="form-group" style="display:none" id="trcust">
                        <label>Customer Name</label>
                   <input name="custname1" type="text" class="text" id="custname1"
 onclick="window.open('finalbill_popupk.php','mypatwindow','width=500,height=500,toolbar=no,resizable=yes,menubar=no,scrollbar=yes')"/>

                  </div>
                  
                    <div class="form-group" style="display:none" id="trcust1">
                        <label>Gender</label>
                  <select name="csex"  id="csex"><option selected="selected">-- Gender --</option>
                  <option value="Male">Male</option><option value="Female">Female</option></select>
                  </div>
               
                 
											
										
										
											
											
											
											
	                                    </div>
	                                    <div class="col-md-6 col-sm-6">
                                        <!-- textarea -->
							
										  <div class="form-group" style="display:none" id="trpatcname" >
                        <label>Age</label>
                   <input name="cage" type="text" class="text" size="10" maxlength="3" id="cage" /> 
                  </div>
                     <div class="form-group" style="display:none" id="trcust_con">
                        <label>Consultant Name</label>
                   <select name="cconsultant_name" type="text"  id="cconsultant_name" >
						<option value="">Select Doctor Name</option>
                       <?php  
					   //include_once("config1.php");
					   $sqls=mysqli_query($link,"SELECT * FROM doct_infor order by id asc");
				
				//}
				$tot=mysqli_num_rows($sqls);
				//if($tot > 0){
				$i=1;	
				while($row=mysqli_fetch_array($sqls)){
				$id=$row['id'];
				 $rk=$row['dname1'];
				?>
                        
                        <option value="<?php echo $rk?>"><?php echo $rk?></option><?php }?>
						
						</select>
                  </div>                    
                                        
                                        
									
                                    </div>
									
                                	</div>
									
									
                                </div>
								<div class="table-scrollable">
								<table id="t1" width="99%">
			<tr><!--<td><div align="right">
            
              	     <input name="new2" type="button" class="btn btn-info" value=" + " onclick="javascript:Addrow()"/>
            	     <input name="new" type="button" class="btn btn-info" value=" - " onclick="javascript:deleteRow()"/>
            	     </div></td>-->
            	   
           <tr><td width="100%" align="center"><br />

<div id="purtable" valign="top">
                                      					   <table class="table table-hover table-checkable order-column full-width"
                                                            border="1" id="dataTable">
					                                        <thead>
					                                            <tr><th width="1" class="TH1"></th>
					                                            	 <th class="TH1">Prd.Name</th>
                               <th class="TH1">Bat.No</th>
                              <th class="TH1">Avail.Qty</th>
                              <th class="TH1">MFG.Dt</th>
                              <th class="TH1">EXP.Dt</th>
                              <th class="TH1">Sale.Qty</th>
                              <th class="TH1">MRP</th>
                              <th class="TH1">Value</th>
							  <th class="TH1">Dis(%)</th>
                              <th class="TH1">Gst(%)</th>
						
							   <th class="TH1">Amount</th>
					                                            </tr>
					                                        </thead>
					                                        <tbody>
                                                           <tr><td><input type="checkbox" id="checkbox1" name="checkbox1" value="1"/></td>
															
                                                            <td>
                                  <input id=\"pname\" list=\"city1\" name="pname" onblur="showBatch(this.value,1)" >
<datalist id=\"city1\" >

<?php 
$sql="select distinct product_name from phr_purinv_dtl ";  // Query to collect records
$r=mysqli_query($link,$sql) or die(mysql_error());
while ($row=mysqli_fetch_array($r)) {
echo  "<option value=\"$row[product_name]\"/>"; // Format for adding options 
}
////  End of data collection from table /// 

echo "</datalist>";?></datalist>
                                  
                                  
                                  
								 <?php /*?>  <select name="pname1" id="pname1" onblur="showBatch(this.value,1)" style="width:150px;">
								  <option value="">Select Product</option>
								  <?php $sq=mysql_query("select distinct product_name from phr_purinv_dtl");
								  while($row=mysql_fetch_array($sq)){$res=$row['product_name'];?>
								  <option value="<?php echo $res?>"><?php echo $res?></option><?php }?></select><?php */?>
								  
								  <!--<input type='text' name='pname1' id='pname' class='textbox1' onblur="showBatch(this.value,1)" size='22'/>--></td>
                                  <td><div id='batchdiv1'><select name='bachno' class='select textbox1' style="width:100px" id='bachno1'><option>Batch</option></select></div></td>
                                  <td><input  type='text' name='bal1' id='bal1' class='textbox1' size='7'/></td>
                                  <td><input  type='text' name='mfg1' id='mfg1' class='textbox1' size='7'/></td>
                                  <td><input  type='text' name='exp1' id='exp1' class='textbox1' size='7'/></td>
                                  <td><input  type='text' name='sqty1' id='sqty1' class='textbox1' size='5' onkeyup='val(this.value,1)'/></td>
                                  <td><input  type='text' name='ucost1' id='ucost1' class='textbox1' size='5'/></td>
								   
                                  <td><input  type='text' name='value1' id='value1' class='textbox1' readonly size="10"/></td>
                                  <td><input  type='text' name='dis1' id='dis1' class='textbox1' value="0"  onkeyup='discal(this.value,1)' size='5'/></td>
								  <td>
                                   <input  type='text' name='gst1' id='gst1' class='textbox1' size='7'/>
								   </td>
                                  
                                   <input  type='hidden' name='va1' id='va1' class='textbox1' size='7'/>
								 
								  
                                  <td><input  type='text' name='amt1' id='amt1' class='textbox1' size='5'/>
                                  <input  type='hidden' name='pcode1' id='pcode1' class='textbox1' size='5'/></td>
                                  
                               <!--     <td>--><input  type='hidden' name='vat1' id='vat1' class='textbox1' size='7'/><!--</td>-->
                                  <script type="text/javascript">
                                  	var obj = actb2(document.getElementById('pname1'),customarray1);
                                  </script> </tr>
                          </tbody>
                        </table>
                   </td>
                    <td valign="top"><input name="new" type="button" class="butnbg1" value="  +  "  onclick="addRow('dataTable')"/></td>
					<td valign="top"><input name="new" type="button" class="butnbg1" value=" -  " onclick="deleteRow('dataTable')"/>
					</td>
                    <td valign="top">&nbsp;</td>
                  </tr>
              </table></td>
            </tr>
            <input type="hidden" name="rows" id="rows" value="1" onclick="javasript:noitems()"/>
			
           
											 <tr>
              <td><table  width="100%">
                  <tr>
                    <td align="center"><div id="div" valign="top">
                        <table width="100%" id="">
                          <tr style="display:''" id="trbill">
                          <!--  <td class="label1"><div align="right">Bill </div></td>
                            <td align="left" >-->
<input type="hidden" name="bill" value="Y" id="bill" onclick="trids(this.value)" checked="yes"/>

 <!-- <input type="radio" name="bill" value="N" id="bill" />
NotPaid</td>-->
                            <td align="left" >&nbsp;</td>
                            <td align="left">&nbsp;</td>
                          </tr>
                          <tr>
						    <td width="81%" class="label1"><div align="right"> Total:</div></td>
                            <td width="19%" align="left"><input name="total" type="text" class="text" id="total" readonly="readonly"/></td>
                          </tr>
						
							<tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right">Average Discount(%):</div></td>
							  <td align="left">
							  <input name="disc" type="text" class="text" id="disc" value="0" />
							
							  <script>
							function nett(str){
							  var tot=document.getElementById("total").value;
							   var sum=0;
							   var sum1=0;
							  if(tot==null || tot==''){tot=0;}else{
							  if(eval(tot)<=eval(str)){alert("Please check Discount");document.getElementById("disc").value=0;return false;}
							   //sum=eval(tot)-eval(str);
							   sum=(eval(tot))*(eval(str))/100;
							   
							   sum1=(eval(tot))-sum;
							  if(sum1==null || sum1==''){sum1=0;}
							  }
							  document.getElementById("nettotal").value=eval(sum1).toFixed(2);
							  document.getElementById("grand").value=eval(sum1).toFixed(2);
							  }
							  
							  
							  function nett1(str){
							  var o_dis=document.getElementById("o_dis").value;
							  var nettotal=document.getElementById("nettotal").value;
							   sumk=(eval(nettotal))-(eval(o_dis));
							   document.getElementById("grand").value=eval(sumk).toFixed(2);
							   document.getElementById("amount").value=eval(sumk).toFixed(2);
							  }
							  
							   function nett2(str){
							  var o_dis=document.getElementById("grand").value;
							  var nettotal=document.getElementById("amount").value;
							   sumk=(eval(nettotal))-(eval(o_dis));
							   document.getElementById("amount2").value=eval(sumk).toFixed(2);
							   //document.getElementById("amount").value=eval(sumk).toFixed(2);
							  }
							  
							  </script>
							  
							
							  </td>
                               
							  </tr>  
							<tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right"> Net Total:</div></td>
							  <td align="left"><input name="nettotal" type="text" class="text" id="nettotal" readonly="readonly"/></td>
							  </tr>
                              
                              <tr id="cashtr" style="display:''">
							  <td class="label1"><div align="right"> Other Discount:</div></td>
							  <td align="left"><input name="o_dis" type="text" class="text" id="o_dis" onkeyup="nett1()" value="0"/></td>
							  </tr>
                              <tr id="cashtr" >
							
							<td width="85%" class="label1"><div align="right"> Grand Total:</div></td>
                            <td width="19%" align="left"><input name="grand" type="text" class="text" id="grand"  readonly="readonly" value="0"/></td>
							</tr>
                            
							<tr id="cashtr" >
							
							<td width="85%" class="label1"><div align="right"> Pay Amount:</div></td>
                            <td width="19%" align="left"><input name="amount"  type="text" class="text" id="amount" onchange="nett2(this.value)" onkeyup='nett2();' value="0"/></td>
							</tr>
							<tr id="remaintr" style="display:''">
							<td width="85%" class="label1"><div align="right"> Remaining Change:</div></td>
                            <td width="19%" align="left">
                            <input name="amount1" type="text" class="text" id="amount2" onblur='amount_cal();' value="0"/><!--</td>
							</tr>-->
							
                         <script>
						 function trids(str){
						 if(str=="N"){
						  document.getElementById("cashtr").style.display="none";
						 document.getElementById("remaintr").style.display="none";
						 }else{
						   document.getElementById("cashtr").style.display="";
						 document.getElementById("remaintr").style.display="";
						 
						 }
						 
						 
						 }
						 
						 </script>
        <?php /*?>                 <script type="text/javascript">
		$(function(){
$('#o_dis').keyup(function() { 
alert(hi);
	var totalpoints1 = parseFloat($('#o_dis').val());
    var totalpoints = parseFloat($('#nettotal').val());
	//var totalpoints2 = parseFloat($('#va1').val());
    $('#amount1').val(totalpoints1 - totalpoints);
});

});
</script>
 <script type="text/javascript">
		$(function(){
$('#amount').keyup(function() { 
alert(hi);
	var totalpoints1 = parseFloat($('#grand').val());
    var totalpoints = parseFloat($('#grand').val());
	//var totalpoints2 = parseFloat($('#va1').val());
    $('#amount2').val(totalpoints - totalpoints1);
});

});
</script>
            <?php */?>              <tr>
                            <td colspan="2"></thead></td>
                          </tr>
                        </table>
                    </div></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td height="4"></td>
            </tr><input type="hidden"  id="str" name="str" >
            <tr>
              <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
                  <tr>
                    
      <input name="fin_flag" id="fin_flag"  type="hidden"/>
	  <input name="actb" id="actb"  type="hidden" value="1"/>
	   <input name="rowval" id="rowval"  type="hidden" value="0"/>
	
	  
   
  
                    <td ><div align="center">
					 <input type="submit" value="Save" class="butt" onclick="save(0)" />&nbsp;<input type="button" value="Close" onclick="window.location.href='salesentry_list.php'" class="butt"/></div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          <p><br>
          </p>
          </td>
      </tr>
      
    </table></td>
  </tr>
</table>
 </form>
					
					
					
              
            <!-- end page content -->
            <!-- start chat sidebar -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
            
            <!-- end chat sidebar -->
        </div>
        <!-- end page container -->
        <!-- start footer -->
       <?php include("footer.php");?>
	    <?php 

}else

{

session_destroy();

session_unset();

header('Location:../../index.php');

}

?>