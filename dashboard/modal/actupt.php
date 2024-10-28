<?php
// Include database connection
include("../db/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $product_name = mysqli_real_escape_string($link, $_POST['product_name']);
    $batch_number = mysqli_real_escape_string($link, $_POST['batch_number']);
    $mrp = mysqli_real_escape_string($link, $_POST['mrp']);
    $exp_date = mysqli_real_escape_string($link, $_POST['exp_date']);
    $balance_qty = mysqli_real_escape_string($link, $_POST['balance_qty']);
    $each_mrp_rate = mysqli_real_escape_string($link, $_POST['each_mrp_rate']);
    $manu_by = mysqli_real_escape_string($link, $_POST['manu_by']);
    $inv_id = mysqli_real_escape_string($link, $_POST['inv_id']); // Retrieve inv_id

    // Construct the SQL query
    $sql = "UPDATE phr_purinv_dtl SET 
            PRODUCT_NAME = '$product_name',
            BATCH_NO = '$batch_number',
            MRP = '$mrp',
            EXP_DATE = '$exp_date',
            balance_qty = '$balance_qty',
            each_mrp_rate = '$each_mrp_rate',
            manu_by = '$manu_by'
            WHERE LR_NO = '$id' AND PRODUCT_NAME = '$product_name' AND BATCH_NO = '$batch_number' AND inv_id = '$inv_id'";

    // Execute the query
    if (mysqli_query($link, $sql)) {
        // Redirect to the page where you want to display the updated product information
        header("Location: new.php");
        // exit();
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . mysqli_error($link);
    }

    // Close the database connection
    mysqli_close($link);
}
?>

