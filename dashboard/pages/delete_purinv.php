<?php
include_once("../db/connection.php");
//getting id of the data from url
$id =$_GET['id'];


//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
$result = mysqli_query($link,"delete from phr_purinv_mast where LR_NO='$id'") or die(mysqli_error($link));
mysqli_query($link,"delete from phr_purinv_dtl where LR_NO='$id'") or die(mysqli_error($link));

if($result){
	print "<script>";
			print "alert('Successfully Deleted ');";
			print "self.location='purchase_invoice_list.php'";
			print "</script>";
}
?>