<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacy Medicine Entry</title>
</head>
<body>
    <?php
    include("../pages/header.php");
    ?>
    <h1>Enter Medicine Details</h1>
    <form action="pharma.php" method="post">
        <input type="hidden" name="inv_id" value="">

        <label for="LR_NO">LR No:</label>
        <input type="number" name="LR_NO" required><br>

        <label for="PRODUCT_CODE">Product Code:</label>
        <input type="text" name="PRODUCT_CODE" required><br>

        <label for="PRODUCT_NAME">Product Name:</label>
        <input type="text" name="PRODUCT_NAME" required><br>

        <label for="PACKING_TYPE">Packing Type:</label>
        <input type="text" name="PACKING_TYPE" ><br>

        <label for="BATCH_NO">Batch No:</label>
        <input type="text" name="BATCH_NO" ><br>

        <label for="MRP">MRP:</label>
        <input type="number" step="0.01" name="MRP" ><br>

        <label for="EXP_DATE">Expiry Date:</label>
        <input type="date" name="EXP_DATE" ><br>

        <label for="S_QTY">Sale Quantity:</label>
        <input type="text" name="S_QTY" ><br>

        <label for="S_FREE">Free Quantity:</label>
        <input type="text" name="S_FREE" ><br>

        <label for="S_RATE">Sale Rate:</label>
        <input type="number" step="0.01" name="S_RATE" ><br>

        <label for="DISCOUNT">Discount:</label>
        <input type="number" step="0.01" name="DISCOUNT" ><br>

        <label for="VALUE">Value:</label>
        <input type="number" step="0.01" name="VALUE" ><br>

        <label for="VAT">VAT:</label>
        <input type="number" step="0.01" name="VAT" ><br>

        <label for="VAT_AMT">VAT Amount:</label>
        <input type="number" step="0.01" name="VAT_AMT" ><br>

        <label for="CURRENTDATE">Current Date:</label>
        <input type="date" name="CURRENTDATE" ><br>

        <label for="AUTH_BY">Authorized By:</label>
        <input type="text" name="AUTH_BY" ><br>

        <label for="mfg_date">Manufacturing Date:</label>
        <input type="date" name="mfg_date" ><br>

        <label for="noitems">Number of Items:</label>
        <input type="text" name="noitems" ><br>

        <label for="cost">Cost:</label>
        <input type="number" step="0.01" name="cost" ><br>

        <label for="balance_qty">Balance Quantity:</label>
        <input type="number" step="0.01" name="balance_qty" ><br>

        <label for="issue_qty">Issue Quantity:</label>
        <input type="number" step="0.01" name="issue_qty" ><br>

        <label for="manu_by">Manufactured By:</label>
        <input type="text" name="manu_by" ><br>

        <label for="sgst">SGST:</label>
        <input type="text" name="sgst" ><br>

        <label for="cgst">CGST:</label>
        <input type="text" name="cgst" ><br>

        <label for="tqty">Total Quantity:</label>
        <input type="text" name="tqty" ><br>

        <label for="each_pur_rate">Each Purchase Rate:</label>
        <input type="number" step="0.01" name="each_pur_rate" ><br>

        <label for="each_mrp_rate">Each MRP Rate:</label>
        <input type="number" step="0.01" name="each_mrp_rate" ><br>

        <label for="feach_pur_rate">Free Each Purchase Rate:</label>
        <input type="number" step="0.01" name="feach_pur_rate" ><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
