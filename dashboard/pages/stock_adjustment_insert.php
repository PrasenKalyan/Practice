<?php
session_start();
 $ses= $_SESSION['user'] ;
include("../db/connection.php");

$inv=$_REQUEST['inv'];
$qty=$_REQUEST['qty'];
$qty1=$_REQUEST['qty1'];
$mrp=$_REQUEST['mrp'];
$mrp1=$_REQUEST['mrp1'];
$prd=$_REQUEST['prd'];
$batch=$_REQUEST['batch'];

$dtl=mysqli_query($link,"insert into stockadjustment(old_qty, modified_qty, inv_id, currentdate, auth_by,prd_name,batch) values
('$inv','$qty1','$qty',now(),'$ses','$prd','$batch')");
if($dtl)
{
	$upd_inv=mysqli_query($link,"update phr_purinv_dtl set balance_qty=$qty1, mrp=$mrp1,each_mrp_rate=($mrp1/noitems) where inv_id='$qty'");
	if($upd_inv)
	{
		$responseText=1;
?>
<input type="hidden" name="ccc" value="<?php echo $responseText ?>" id="ccc"/>
<?php		
	}
}
?>