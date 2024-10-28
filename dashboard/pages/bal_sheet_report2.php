<?php
session_start();
$ses = $_SESSION['user'];
if (!isset($_SESSION['user'])) {
    header('Location:../../index.php');
    exit();
}

include("header.php");

function fetchTransactions($connection, $fromDate, $toDate, $salesType)
{
    $query = "SELECT * FROM phr_salent_mast WHERE SAL_DATE BETWEEN '$fromDate' AND '$toDate' AND SALES_TYPE = '$salesType'";
    $result = mysqli_query($connection, $query);

    $transactions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $transactions[] = $row;
    }

    return $transactions;
}

function displayTransactions($transactions)
{
    ?>
    <table>
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Batch Number</th>
            <th>MRP</th>
            <th>Total Value</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($transactions as $transaction): ?>
            <tr>
                <td><?php echo $transaction['CUST_NAME']; ?></td>
                <td><?php echo $transaction['INV_NO']; ?></td>
                <td><?php echo $transaction['MRP']; ?></td>
                <td><?php echo $transaction['total']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}

?>

<!-- HTML Structure -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Pharmacy Account Summary</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card card-box">
                    <div class="card-head">
                        <header>Pharmacy Account Summary</header>
                    </div>

                    <form method="get" action="bal_sheet_report2.php">
                        <div class="card-body " id="bar-parent2">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" class="form-control" name="s_date" required
                                               value="<?php echo date('Y-m-d') ?>" id="fromdate">
                                    </div>

                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" class="form-control" required="required"
                                               value="<?php echo date('Y-m-d') ?>" name="e_date" id="todate">
                                    </div>

                                    <input type="hidden" value="<?php echo $ses ?>" class="form-control" name="ses"
                                           id="ses">

                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="offset-md-3 col-md-9">
                                    <input type="submit" class="btn btn-info" name="submit" value="Report">
                                    <button type="button" class="btn btn-default"
                                            onclick="javascript:location.href='dashboard.php'">Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Displaying Transactions -->
        <?php
        if (isset($_GET['s_date']) && isset($_GET['e_date'])) {
            $fromDate = $_GET['s_date'];
            $toDate = $_GET['e_date'];

            // Establish the database connection
            include('../db/connection.php');

            $cashTransactions = fetchTransactions($link, $fromDate, $toDate, 'CASH');
            $upiTransactions = fetchTransactions($link, $fromDate, $toDate, 'UPI');
            $ccTransactions = fetchTransactions($link, $fromDate, $toDate, 'CC');

            mysqli_close($link);

            echo "<h2>Cash Transactions</h2>";
            displayTransactions($cashTransactions);

            echo "<h2>UPI Transactions</h2>";
            displayTransactions($upiTransactions);

            echo "<h2>CC Transactions</h2>";
            displayTransactions($ccTransactions);
        }
        ?>
    </div>
</div>

<?php include("footer.php"); ?>
