<?php
 include("../db/connection.php");

$emp_id = $_REQUEST['emp_id'];
$sup_code = $_REQUEST['suppcode'];

$query =  mysqli_query($link,"select product_code,product_name,packing_type,manu_by,batch_no,vat,balance_qty,s_free,s_rate,mrp,a.inv_id,vat_amt,a.discount from phr_purinv_dtl as a,phr_purinv_mast as b where a.PRODUCT_NAME='$emp_id' and a.lr_no=b.lr_no and
 b.suppl_code='$sup_code'");
if($query)
{
	$row = mysqli_fetch_array($query);
	
$pcode=$row[0];
$pname=$row[1];
$pack=$row[2];
$pqty=$row[3];
$batchno=$row[4];
$vat=$row[5];
$sqty=$row[6];
$sfree=$row[7];
$rate=$row[8];
$mrp=$row[9];
$inv_id=$row[10];
$vat_amt=$row[11];
$disc=$row[12];
}	

$disc=(($disc)/($sqty));
$disc=round($disc);

echo $data = ":".$pcode.":".$pname.":".$pack.":".$pqty.":".$batchno.":".$vat.":".$sqty.":".$sfree.":".$rate.":".$mrp.":".$inv_id.":".$vat_amt.":".$disc; exit;
	echo $data;

?>