<?php
include("../db/connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect the form data
    $patient_id = $_POST['patient_id'];
    $presenting_complaints = $_POST['presenting_complaints'];
    $examination_findings = $_POST['examination_findings'];
    $diagnosis = $_POST['diagnosis'];
    $drug_forms = $_POST['drug_form'];
    $drug_names = $_POST['drug_name'];
    $frequencies = $_POST['frequency'];
    $how_to_takes = $_POST['how_to_take'];
    $no_of_days = $_POST['no_of_days'];
    $investigations = $_POST['investigations'];
    $precautions = $_POST['precautions'];
    $follow_ups = $_POST['follow_ups'];
    $registerno = $_POST['registerno'];

    // Serialize the arrays to store them as strings in the database
    $drug_form = serialize($drug_forms);
    $drug_name = serialize($drug_names);
    $frequency = serialize($frequencies);
    $how_to_take = serialize($how_to_takes);
    $no_of_days = serialize($no_of_days);

    // Check if the patient ID already exists
    $stmt = $link->prepare("SELECT id FROM patient_summaries WHERE patient_id = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($link->error));
    }

    $stmt->bind_param("s", $patient_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Patient ID exists, update the existing record
        $stmt->close();

        $stmt = $link->prepare("UPDATE patient_summaries SET presenting_complaints=?, examination_findings=?, diagnosis=?, drug_form=?, drug_name=?, frequency=?, how_to_take=?, no_of_days=?, investigations=?, precautions=?, follow_ups=?, registerno=? WHERE patient_id=?");

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($link->error));
        }

        $stmt->bind_param("sssssssssssss",
            $presenting_complaints, 
            $examination_findings, 
            $diagnosis, 
            $drug_form, 
            $drug_name, 
            $frequency, 
            $how_to_take, 
            $no_of_days, 
            $investigations, 
            $precautions, 
            $follow_ups, 
            $registerno, 
            $patient_id
        );
    } else {
        // Patient ID does not exist, insert a new record
        $stmt->close();

        $stmt = $link->prepare("INSERT INTO patient_summaries (patient_id, presenting_complaints, examination_findings, diagnosis, drug_form, drug_name, frequency, how_to_take, no_of_days, investigations, precautions, follow_ups, registerno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($link->error));
        }

        $stmt->bind_param("sssssssssssss",
            $patient_id, 
            $presenting_complaints, 
            $examination_findings, 
            $diagnosis, 
            $drug_form, 
            $drug_name, 
            $frequency, 
            $how_to_take, 
            $no_of_days, 
            $investigations, 
            $precautions, 
            $follow_ups, 
            $registerno
        );
    }

    // Execute the statement
    $exec = $stmt->execute();

    if ($exec) {
        // Close statement and connection
        $stmt->close();
        $link->close();
        
        // Redirect to report.php with the patient ID
        header("Location: report.php?id=$patient_id");
        exit;
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }
} else {
    echo "Invalid request method";
}
?>
