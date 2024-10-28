<?php
session_start();
include('dbconnection/connection.php');
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SESSION['user'] && isset($_POST['acc'])) {
    $empCode = mysqli_real_escape_string($link, $_POST['Emp_code']);
    $employeeName = mysqli_real_escape_string($link, $_POST['Employee_Name']);
    $mobileNo = mysqli_real_escape_string($link, $_POST['Mobile_No']);
    $accountHolderName = mysqli_real_escape_string($link, $_POST['Account_Holder_Name']);
    $accountNumber = mysqli_real_escape_string($link, $_POST['Account_Number']);
    $bank = mysqli_real_escape_string($link, $_POST['Bank']);
    $ifscCode = mysqli_real_escape_string($link, $_POST['IFSC_CODE']);

    $insertQuery = "INSERT INTO emp_bill (`Emp_code`, `Employee Name`, `Mobile No`, `ACCOUNT HOLDER NAME`, `ACCOUNT NUMBER`, `Bank`, `IFSC CODE`)
                    VALUES ('$empCode', '$employeeName', '$mobileNo', '$accountHolderName', '$accountNumber', '$bank', '$ifscCode')";

    if (mysqli_query($link, $insertQuery)) {
        // echo "Record inserted successfully";
        echo "<script>alert('Record updated successfully');</script>";
        echo "<script>window.location = 'financemp.php';</script>";
    } else {
        // echo "Error: " . $insertQuery . "<br>" . mysqli_error($link);
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($link);
    }
} else {
    echo "Invalid request";
}
?>
