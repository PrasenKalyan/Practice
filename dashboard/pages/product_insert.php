<?php
include("../db/connection.php");
$id = $_REQUEST['id'];
$qty = $_REQUEST['qty1'];
$qty2 = $_REQUEST['qty2'];
$qty3 = $_REQUEST['qty3'];

$upd_inv = mysqli_query($link, "update phr_prddetails_mast set vattax='$qty', sgst='$qty2', cgst='$qty3' where id='$id'");
if ($upd_inv) {
    $responseText = 1;
?>
    <input type="hidden" name="ccc" value="<?php echo $responseText ?>" id="ccc"/>
    <script>
        // JavaScript code for pop-up
        alert("Update successful!");
    </script>
<?php
}
?>
