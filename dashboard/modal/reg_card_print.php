<?php
include("../db/connection.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch values from $_REQUEST with default values
$opno = $_REQUEST['opno'] ?? null;
$a = $_REQUEST['a'] ?? null;

if ($a == 1) {
    $qry2 = mysqli_query($link, "SELECT * FROM patientregister WHERE reg_id='$opno'");

    if ($qry2 && $row = mysqli_fetch_array($qry2)) {
        $regno = $row['registerno'] ?? '';
        $regdate = $row['registerdate'] ?? '';
        $opno1 = $row['op_no'] ?? '';
        $age = $row['age'] ?? '';
        $gender = $row['gender'] ?? '';
        $tokenno = $row['tokenno'] ?? '';
        $dnamek = $row['dname'] ?? '';
        $dname = $row['doctorname'] ?? '';
        $regfee = (float)($row['registerfee'] ?? 0);
        $vno = $row['visit_no'] ?? '';
        $apptime = $row['appmnt_time'] ?? '';
        $pname = ($row['pname_type'] ?? '') . '.' . ($row['patientname'] ?? '');
        $ctype = $row['pay_type'] ?? '';
        $cardno = $row['card_no'] ?? '';
        $cons_fee = (float)($row['cons_fee'] ?? 0);
        $t = $row['tokenno'] ?? '';
        $validity1 = $row['validity'] ?? '';
        $validity = date('d/m/Y', strtotime($validity1));
        $auth_by = $row['auth_by'] ?? '';
        $bill_num = $row['bill_num'] ?? '';
        $hosp_fee = $row['hosp_fee'] ?? 0;
        $serv_name = $row['serv_name'] ?? '';
        $mobile = $row['phoneno'] ?? '';
        $ref_doc = $row['ref_doc'] ?? '';
        $opt_type = $row['opt_type'] ?? '';
    } else {
        echo "Error fetching patient data.";
        exit;
    }

    // Fetch referral doctor name
    $dd = "SELECT * FROM referal_doctor WHERE refcode = '$ref_doc'";
    $docid = mysqli_query($link, $dd);
    $row1 = mysqli_fetch_array($docid);
    $ref_docname = $row1['ref_docname'] ?? '';

    // Fetch department name
    $dd1 = "SELECT * FROM `doctdept` WHERE id = '$dnamek'";
    $docid1 = mysqli_query($link, $dd1);
    $row1 = mysqli_fetch_array($docid1);
    $doctdeptname = $row1['doctdeptname'] ?? '';

    // Calculate total amount
    $tot = $regfee + $cons_fee;

    // Convert number to words
    $number = $tot;
    $no = round($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'One', '2' => 'Two',
        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
        '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
        '13' => 'Thirteen', '14' => 'Fourteen',
        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
        '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
        '60' => 'Sixty', '70' => 'Seventy',
        '80' => 'Eighty', '90' => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] . " " . $digits[$counter] . $plural . " " . $hundred
                : $words[floor($number / 10) * 10] . " " . $words[$number % 10] . " " . $digits[$counter] . $plural . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ? "." . $words[$point / 10] . " " . $words[$point % 10] : '';
    $rupee = $result . " Rupees  ";
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <style>
    .page {
        width: 21cm;
        min-height: 28.7cm;
        padding: 1.5cm;
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 0.25cm;
        border: 0px red solid;
        height: 245mm;
        padding-top: 0px;
        font: "Times New Roman", Times, serif;
        font-size: 14px;
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    @media screen {
        div#footer_wrapper {
            display: none;
        }
    }
    @media print {
        tfoot { visibility: hidden; }
        div#footer_wrapper {
            margin: 0px 2px 12px 2px;
            position: fixed;
            bottom: 0;
        }
        div#footer_content {
            font-weight: bold;
        }
    }
    </style>
    <script type="text/javascript">
    function print1(){
        document.getElementById("prnt").style.display="none";
        document.getElementById("cls").style.display="none";
        window.print();
        window.close();
    }
    function closew(){
        window.close();
    }
    function abc(){
        window.print();
        window.close();
    }
    </script>
</head>
<body>
<div class="book">
    <div class="page">
        <div class="subpage" style="margin-top:-50px;">
        <?php if ($a == 1) { ?>
        <table width="100%" border="0" style="background-color:#FFFFFF">
            <thead>
                <tr><td colspan="5" align="center"><img src="../img/raajtop.png" style="width:100%; height:100px;" ></td></tr>
                <tr style="height:10px; background-color:#213; color:#FFF;"><td colspan="5"><h1 align="center" style="font-size:18px;"><b><u>OP Consultation Bill</u></b></h1></td></tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Reg.No :&nbsp;&nbsp;<?= htmlspecialchars($regno) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Reg.Date :&nbsp;&nbsp;<?= htmlspecialchars($regdate) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                OP No :&nbsp;&nbsp;<?= htmlspecialchars($opno1) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Patient Name :&nbsp;&nbsp;<?= htmlspecialchars($pname) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Age :&nbsp;&nbsp;<?= htmlspecialchars($age) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Gender :&nbsp;&nbsp;<?= htmlspecialchars($gender) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Token No :&nbsp;&nbsp;<?= htmlspecialchars($tokenno) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Doctor :&nbsp;&nbsp;<?= htmlspecialchars($dname) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Department :&nbsp;&nbsp;<?= htmlspecialchars($doctdeptname) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Payment Type :&nbsp;&nbsp;<?= htmlspecialchars($ctype) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Card No :&nbsp;&nbsp;<?= htmlspecialchars($cardno) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Consultant Fee :&nbsp;&nbsp;<?= htmlspecialchars($cons_fee) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Registration Fee :&nbsp;&nbsp;<?= htmlspecialchars($regfee) ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Total :&nbsp;&nbsp;<?= htmlspecialchars($tot) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Amount in Words :&nbsp;&nbsp;<?= htmlspecialchars($rupee) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Mobile :&nbsp;&nbsp;<?= htmlspecialchars($mobile) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="left">
                        <h1 style="font-size:14px; text-align:justify;">
                            <b>
                                Referral Doctor :&nbsp;&nbsp;<?= htmlspecialchars($ref_docname) ?>
                            </b>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="center">
                        <button id="prnt" onclick="print1();">Print</button>
                        <button id="cls" onclick="closew();">Close</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
