<?php
// Include your database connection here
include("../db/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Assuming emp_bill is your table name
    $query = "SELECT * FROM actlhhvu_kartik WHERE LR_NO = '$id'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Prepare the employee data in an associative array
        $employeeData = array(
            'PRODUCT_NAME' => $row['PRODUCT_NAME'],
            'BATCH_NO' => $row['BATCH_NO'],
            'Mobile_No' => $row['Mobile No'],
            'Account_Holder_Name' => $row['ACCOUNT HOLDER NAME'],
            'Account_Number' => $row['ACCOUNT NUMBER'],
            'Bank' => $row['Bank'],
            'IFSC_CODE' => $row['IFSC CODE']
            // Fetch other fields similarly
        );
        // Return the employee data as JSON
        echo json_encode($employeeData);
    } else {
        // Handle if no data found
        echo "No employee found";
    }
} else {
    // Handle if POST data or ID is not set
    echo "Invalid request";
}
?>
