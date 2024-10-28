<?php
include("../db/connection.php");
date_default_timezone_set('Asia/Kolkata');

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if array keys exist before accessing them
$admin = isset($_REQUEST['authby']) ? $_REQUEST['authby'] : '';
$custm_type = isset($_REQUEST['custm_type']) ? $_REQUEST['custm_type'] : '';
$mob = isset($_REQUEST['mob']) ? $_REQUEST['mob'] : '';
$spl_dis = isset($_REQUEST['o_dis']) ? $_REQUEST['o_dis'] : '';
$grand = isset($_REQUEST['grand']) ? $_REQUEST['grand'] : '';
$amount1 = isset($_REQUEST['amount1']) ? $_REQUEST['amount1'] : '';
$adjust = isset($_REQUEST['adjust']) ? $_REQUEST['adjust'] : '';
$round = isset($_REQUEST['round']) ? $_REQUEST['round'] : '';
$final = isset($_REQUEST['final']) ? $_REQUEST['final'] : '';
$stype = isset($_REQUEST['stype']) ? $_REQUEST['stype'] : '';
$totalkk = isset($_REQUEST['total']) ? $_REQUEST['total'] : '';
$time = date("h:i:sa");

// Initialize variables to avoid undefined variable warnings
$btype = '';
$mrnum = '';

// Handle different customer types
if ($custm_type == 'p1') {
    $custname = isset($_REQUEST['custname4']) ? $_REQUEST['custname4'] : '';
    $mrnum = isset($_REQUEST['custname4']) ? $_REQUEST['custname4'] : '';
    $age = isset($_REQUEST['agek']) ? $_REQUEST['agek'] : '';
    $sex = isset($_REQUEST['sexk']) ? $_REQUEST['sexk'] : '';
    $consultantname = isset($_REQUEST['consultant_namek']) ? $_REQUEST['consultant_namek'] : '';
    $concessiontype = isset($_REQUEST['cconcessiontype']) ? $_REQUEST['cconcessiontype'] : '';
    $cardno = isset($_REQUEST['ccardno']) ? $_REQUEST['ccardno'] : '';
} else if ($custm_type == "c") {
    $custname = isset($_REQUEST['custname1']) ? $_REQUEST['custname1'] : '';
    $age = isset($_REQUEST['cage']) ? $_REQUEST['cage'] : '';
    $sex = isset($_REQUEST['csex']) ? $_REQUEST['csex'] : '';
    $consultantname = isset($_REQUEST['cconsultant_name']) ? $_REQUEST['cconsultant_name'] : '';
    $concessiontype = isset($_REQUEST['concessiontype']) ? $_REQUEST['concessiontype'] : '';
    $cardno = isset($_REQUEST['cardno']) ? $_REQUEST['cardno'] : '';
} else if ($custm_type == "p") {
    $custname = isset($_REQUEST['custname3']) ? $_REQUEST['custname3'] : '';
    $a = mysqli_query($link, "SELECT * FROM ip_pat_admit  where PAT_NO='$custname'") or die(mysqli_error($link));
    while ($r = mysqli_fetch_array($a)) {
        $mrnum = $r['PAT_REGNO'];
    }
    $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : '';
    $sex = isset($_REQUEST['sex1']) ? $_REQUEST['sex1'] : '';
    $consultantname = isset($_REQUEST['consultant_name1']) ? $_REQUEST['consultant_name1'] : '';
    $concessiontype = isset($_REQUEST['cconcessiontype']) ? $_REQUEST['cconcessiontype'] : '';
    $cardno = isset($_REQUEST['ccardno']) ? $_REQUEST['ccardno'] : '';
}

$saledate = isset($_REQUEST['saledate']) ? date('Y-m-d', strtotime($_REQUEST['saledate'])) : '';
$total = isset($_REQUEST['grand']) ? $_REQUEST['grand'] : '';
$bal = isset($_REQUEST['amount1']) ? $_REQUEST['amount1'] : '';
$amt = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
$disc = isset($_REQUEST['disc']) ? $_REQUEST['disc'] : '0';
$card = isset($_REQUEST['card']) ? $_REQUEST['card'] : '0';
$bill = isset($_REQUEST['bill']) ? $_REQUEST['bill'] : 'N';

// Generate LR_NO
$sql = mysqli_query($link, "select max(LR_NO+0) from phr_salent_mast ") or die(mysqli_error($link));
if ($sql) {
    $row = mysqli_fetch_array($sql);
    $lrno = $row[0];
}
$lrno = $lrno + 1;

$dt = date('Y-m-d');
$sq = mysqli_query($link, "select * from daily_amount where date(date1)='$dt'") or die(mysqli_error($link));
$bcnt = mysqli_num_rows($sq);
$cnt1 = $bcnt + 1;
$cnt = date('dmy') . "-" . $cnt1;

// Handle Free sales type
if ($stype == 'Free') {
    $amount1 = 0;
    $final = 0;
    $adjust = 0;
    $round = 0;
    $amt = 0;
} else {
    $amount1 = $amount1;
    $final = $final;
    $adjust = $adjust;
    $round = $round;
    $amt = $amt;
}

// Build and execute the SQL INSERT query for phr_salent_mast table
if ($amt >= 1) {
    $x = "INSERT INTO phr_salent_mast (LR_NO, BILLING_TYPE, CUST_NAME, INV_NO, SALES_TYPE, SAL_DATE, total, current, auth_by, bill_type, customer_type, card_no, age, sex, Consultant_Name, discount, concession_type, mobileno, address1, mrnum, spl_dis, bal, sr_bill_num, income_dis, income_dis_amnt, final_amnt, adjust, round, final_paid)
    VALUES ('$lrno', '$btype', '$custname', '$lrno', '$stype', '$saledate', '$total', now(), '$admin', '$bill', '$custm_type', '$card', '$age', '$sex', '$consultantname', '$disc', '$concessiontype', '', '', '$mrnum', '$spl_dis', '$amount1', '$cnt', '', '', '$final', '$adjust', '$round', '$amt')";
} else {
    $x = "INSERT INTO phr_salent_mast (LR_NO, BILLING_TYPE, CUST_NAME, INV_NO, SALES_TYPE, SAL_DATE, total, current, auth_by, bill_type, customer_type, card_no, age, sex, Consultant_Name, discount, concession_type, mobileno, address1, mrnum, spl_dis, bal, sr_bill_num, income_dis, income_dis_amnt, final_amnt, adjust, round, final_paid)
    VALUES ('$lrno', '$btype', '$custname', '$lrno', '$stype', '$saledate', '$total', now(), '$admin', '$bill', '$custm_type', '$card', '$age', '$sex', '$consultantname', '$disc', '$concessiontype', '', '', '$mrnum', '$spl_dis', '$amount1', '', '', '', '$final', '$adjust', '$round', '$amt')";
}

$q1 = mysqli_query($link, $x) or die(mysqli_error($link));

if ($q1) {
    $count = isset($_REQUEST['rows']) ? $_REQUEST['rows'] : '';
    for ($m = 1; $m <= $count; $m++) {
        $pname = isset($_REQUEST['pname' . $m]) ? $_REQUEST['pname' . $m] : '';
        $uqty = isset($_REQUEST['sqty' . $m]) ? $_REQUEST['sqty' . $m] : '';
        $invno = isset($_REQUEST['bachno' . $m]) ? $_REQUEST['bachno' . $m] : '';
        $urate = isset($_REQUEST['ucost' . $m]) ? $_REQUEST['ucost' . $m] : '';
        $value = isset($_REQUEST['value' . $m]) ? $_REQUEST['value' . $m] : '';
        $dis = isset($_REQUEST['dis' . $m]) ? $_REQUEST['dis' . $m] : '';
        $amt = isset($_REQUEST['amt' . $m]) ? $_REQUEST['amt' . $m] : '';
        $gst = isset($_REQUEST['gst' . $m]) ? $_REQUEST['gst' . $m] : '';
        $gst_amt = isset($_REQUEST['vat' . $m]) ? $_REQUEST['vat' . $m] : '';

        // Build and execute the SQL INSERT query for phr_salent_dtl table
        $xx = "INSERT INTO phr_salent_dtl (LR_NO, PRODUCT_CODE, U_QTY, U_RATE, VALUE, CURRENT, AUTH_BY, inv_id, disc, total, `gst`, gst_amt) 
        VALUES ('$lrno', '$pname', '$uqty', '$urate', '$value', now(), '$admin', '$invno', '$dis', '$amt', '$gst', '$gst_amt')";
        
        $q2 = mysqli_query($link, $xx) or die(mysqli_error($link));

        if ($q2) {
            $q7 = mysqli_query($link, "UPDATE phr_purinv_dtl SET balance_qty = balance_qty - '$uqty' WHERE inv_id = '$invno'") or die(mysqli_error($link));
        }
    }

    if ($q7) {
        // Handle due patients
        if ((!($stype == "E")) && ($bill == "N")) {
            $tot_amt = $total;
            $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
            $ndate = date('Y-m-d H:i:s', time());
            // Insert into daily_amount table
            $aa = "INSERT INTO daily_amount (amnt_type, amount, bill_num, mrnum, recv_by, pay_type, date_time, amnt_desc)
            VALUES ('Pharmacy', '$amt', '$cnt', '$mrnum', '$admin', '$ptype', '$ndate', 'Pharmacy')";
            $qq = mysqli_query($link, $aa) or die(mysqli_error($link));

            if ($qq) {
                // Insert into due_patients and due_patients_dtl tables
                $due = mysqli_query($link, "INSERT INTO due_patients (lr_no, total_amount, paid_amount, currentdate, auth_by) VALUES ('$lrno', '$tot_amt', '$amount', now(), '$admin')") or die(mysqli_error($link));
                if ($due) {
                    $mast = mysqli_query($link, "SELECT id FROM due_patients WHERE lr_no = '$lrno'") or die(mysqli_error($link));
                    if ($mast) {
                        $res = mysqli_fetch_array($mast);
                        $mast_id = $res[0];
                    }
                    $i1 = mysqli_query($link, "INSERT INTO due_patients_dtl (mast_id, pay_amt, pay_date, auth_by) VALUES ('$mast_id', '$amount', now(), '$admin')") or die(mysqli_error($link));
                    if ($i1) {
                        // Redirect to success page
                        echo "<script>alert('Successfully added'); self.location='salesentry_list.php';</script>";
                    }
                }
            }
        } else {
            // Redirect to success page
            echo "<script>alert('Successfully added'); self.location='salesentry_list.php';</script>";
        }
    }
}
?>
