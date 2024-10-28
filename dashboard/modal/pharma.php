<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "actlhhvu_kartik";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $LR_NO = isset($_POST["LR_NO"]) ? $_POST["LR_NO"] : NULL;
    $PRODUCT_CODE = isset($_POST["PRODUCT_CODE"]) ? $_POST["PRODUCT_CODE"] : NULL;
    $PRODUCT_NAME = isset($_POST["PRODUCT_NAME"]) ? $_POST["PRODUCT_NAME"] : NULL;
    $PACKING_TYPE = isset($_POST["PACKING_TYPE"]) ? $_POST["PACKING_TYPE"] : NULL;
    $BATCH_NO = isset($_POST["BATCH_NO"]) ? $_POST["BATCH_NO"] : NULL;
    $MRP = isset($_POST["MRP"]) ? $_POST["MRP"] : 0.00;
    $EXP_DATE = isset($_POST["EXP_DATE"]) ? $_POST["EXP_DATE"] : NULL;
    $S_QTY = isset($_POST["S_QTY"]) ? $_POST["S_QTY"] : '0';
    $S_FREE = isset($_POST["S_FREE"]) ? $_POST["S_FREE"] : '0';
    $S_RATE = isset($_POST["S_RATE"]) ? $_POST["S_RATE"] : 0.00;
    $DISCOUNT = isset($_POST["DISCOUNT"]) ? $_POST["DISCOUNT"] : 0.00;
    $VALUE = isset($_POST["VALUE"]) ? $_POST["VALUE"] : 0.00;
    $VAT = isset($_POST["VAT"]) ? $_POST["VAT"] : 0.00;
    $VAT_AMT = isset($_POST["VAT_AMT"]) ? $_POST["VAT_AMT"] : 0.00;
    $CURRENTDATE = isset($_POST["CURRENTDATE"]) ? $_POST["CURRENTDATE"] : NULL;
    $AUTH_BY = isset($_POST["AUTH_BY"]) ? $_POST["AUTH_BY"] : NULL;
    $mfg_date = isset($_POST["mfg_date"]) ? $_POST["mfg_date"] : NULL;
    $noitems = isset($_POST["noitems"]) ? $_POST["noitems"] : '0';
    $cost = isset($_POST["cost"]) ? $_POST["cost"] : 0.00;
    $balance_qty = isset($_POST["balance_qty"]) ? $_POST["balance_qty"] : 0.00;
    $issue_qty = isset($_POST["issue_qty"]) ? $_POST["issue_qty"] : 0.00;
    $manu_by = isset($_POST["manu_by"]) ? $_POST["manu_by"] : NULL;
    $sgst = isset($_POST["sgst"]) ? $_POST["sgst"] : '0';
    $cgst = isset($_POST["cgst"]) ? $_POST["cgst"] : '0';
    $tqty = isset($_POST["tqty"]) ? $_POST["tqty"] : '0';
    $each_pur_rate = isset($_POST["each_pur_rate"]) ? $_POST["each_pur_rate"] : 0.00;
    $each_mrp_rate = isset($_POST["each_mrp_rate"]) ? $_POST["each_mrp_rate"] : 0.00;
    $feach_pur_rate = isset($_POST["feach_pur_rate"]) ? $_POST["feach_pur_rate"] : 0.00;
    $inv_id = isset($_POST["inv_id"]) ? $_POST["inv_id"] : NULL;

    if (empty($inv_id)) {
        // Insert new record
        $sql = "INSERT INTO phr_purinv_dtl (
            LR_NO, PRODUCT_CODE, PRODUCT_NAME, PACKING_TYPE, BATCH_NO, MRP, EXP_DATE, S_QTY, S_FREE, S_RATE, 
            DISCOUNT, VALUE, VAT, VAT_AMT, CURRENTDATE, AUTH_BY, mfg_date, noitems, cost, balance_qty, 
            issue_qty, manu_by, sgst, cgst, tqty, each_pur_rate, each_mrp_rate, feach_pur_rate
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssisdsddsssdsddsssssdd", 
            $LR_NO, $PRODUCT_CODE, $PRODUCT_NAME, $PACKING_TYPE, $BATCH_NO, $MRP, $EXP_DATE, $S_QTY, $S_FREE, $S_RATE, 
            $DISCOUNT, $VALUE, $VAT, $VAT_AMT, $CURRENTDATE, $AUTH_BY, $mfg_date, $noitems, $cost, $balance_qty, 
            $issue_qty, $manu_by, $sgst, $cgst, $tqty, $each_pur_rate, $each_mrp_rate, $feach_pur_rate
        );
    } else {
        // Update existing record
        $sql = "UPDATE phr_purinv_dtl SET 
            LR_NO=?, PRODUCT_CODE=?, PRODUCT_NAME=?, PACKING_TYPE=?, BATCH_NO=?, MRP=?, EXP_DATE=?, S_QTY=?, S_FREE=?, S_RATE=?, 
            DISCOUNT=?, VALUE=?, VAT=?, VAT_AMT=?, CURRENTDATE=?, AUTH_BY=?, mfg_date=?, noitems=?, cost=?, balance_qty=?, 
            issue_qty=?, manu_by=?, sgst=?, cgst=?, tqty=?, each_pur_rate=?, each_mrp_rate=?, feach_pur_rate=? 
            WHERE inv_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssssisdsddsssdsddsssssddd", 
            $LR_NO, $PRODUCT_CODE, $PRODUCT_NAME, $PACKING_TYPE, $BATCH_NO, $MRP, $EXP_DATE, $S_QTY, $S_FREE, $S_RATE, 
            $DISCOUNT, $VALUE, $VAT, $VAT_AMT, $CURRENTDATE, $AUTH_BY, $mfg_date, $noitems, $cost, $balance_qty, 
            $issue_qty, $manu_by, $sgst, $cgst, $tqty, $each_pur_rate, $each_mrp_rate, $feach_pur_rate, $inv_id
        );
    }

    if ($stmt->execute()) {
        echo "Record successfully " . (empty($inv_id) ? "inserted" : "updated") . "!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>