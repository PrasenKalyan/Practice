<?php
include('dbconnection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the POSTed data
    $empCode = $_POST['Emp_code'];
    $employeeName = $_POST['Employee_Name'];
    $mobileNo = $_POST['Mobile_No'];
    $accountHolderName = $_POST['Account_Holder_Name'];
    $accountNumber = $_POST['Account_Number'];
    $bank = $_POST['Bank'];
    $ifscCode = $_POST['IFSC_CODE'];
    // Retrieve other fields similarly
    
    // Update query for the employee record
    $updateQuery = "UPDATE emp_bill SET 
                    `Employee Name` = '$employeeName',
                    `Mobile No` = '$mobileNo',
                    `ACCOUNT HOLDER NAME` = '$accountHolderName',
                    `ACCOUNT NUMBER` = '$accountNumber',
                    `Bank` = '$bank',
                    `IFSC CODE` = '$ifscCode'
                    WHERE `Emp_code` = '$empCode'";
    // Update other fields in the query
    
    if (mysqli_query($link, $updateQuery)) {
        // On success, return a success message or status
        echo "Record updated successfully";
    } else {
        // If there's an error, handle it accordingly
        echo "Error updating record: " . mysqli_error($link);
    }
} else {
    // Handle if the request method is not POST
    echo "Invalid request method";
}
?>
