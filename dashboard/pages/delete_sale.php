<?php

include("../db/connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM phr_salent_dtl WHERE lr_no = ?";

if ($stmt = $link->prepare($sql)) {
    $stmt->bind_param("s", $id); 

    if ($stmt->execute()) {
        echo "<script>
            alert('Record deleted successfully');
            window.location.href = 'salesentry_list.php'; 
        </script>";
    } else {
        echo "<script>
            alert('Error deleting record: " . addslashes($stmt->error) . "');
            window.location.href = 'salesentry_list.php';
        </script>";
    }

    $stmt->close();
} else {
    echo"<script>
        alert('Error preparing delete statement: " . addslashes($link->error) . "');
        window.location.href = 'salesentry_list.php';
    </script>";
}

$sql_select = "SELECT inv_id, U_QTY FROM phr_salent_dtl WHERE lr_no = ?";
if ($stmt_select = $link->prepare($sql_select)) {
    $stmt_select->bind_param("s", $id);

    
    $stmt_select->execute();

    
    $result = $stmt_select->get_result();

    while ($r = $result->fetch_assoc()) {
        $inv_id = $r['inv_id'];
        $uqty = $r['U_QTY'];

       
        echo "Invoice ID: " . $inv_id . ", UQTY: " . $uqty . "<br>";
    }

    
    $stmt_select->close();
} else {
    echo "Error preparing select statement: " . $link->error;



$link->close();

	 $a="update phr_purinv_dtl set balance_qty=balance_qty+'$uqty' where inv_id='$inv_id'";
	 
	 $q7=mysqli_query($link,$a);
	 }
	 //exit;
	  $b="update phr_salent_dtl set PRODUCT_CODE='',U_QTY='',U_RATE='',VALUE=''
,inv_id='',disc='',total='',gst='',gst_amt='' where lr_no='$id'";

$q71=mysqli_query($link,$b);
$q7=mysqli_query($link,"update phr_salent_mast set BILLING_TYPE='',CUST_NAME='',`INV_NO`='',
`SALES_TYPE`='',`SAL_DATE`='',`total`='',`current`='',`auth_by`='',`bill_type`='',`customer_type`='',
`card_no`='',`age`='',`sex`='',`Consultant_Name`='',`discount`='',`concession_type`='',
`mobileno`='',`address1`='',`mrnum`='',`spl_dis`='',`bal`='',`sr_bill_num`='',status='Delete',final_paid='',
final_amnt='',income_dis='',income_dis_amnt	='',adjust='',round='' where lr_no='$id'");



	// if($q7)
	// {
	// 	"<script>
    //         alert('Record deleted successfully');
    //         window.location.href = 'your_redirect_page.php'; // Redirect to another page after deletion
    //     </script>";
	// }else{
	// 	print "<script>";
	// 	print "alert('unable to delete');";
	// 	print "self.location='salesentry_list.php';";
	// 	print "</script>";
	// }
	

?>


