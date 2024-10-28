<?php //include('config.php');
session_start();
include("../db/connection.php");
//if($_SESSION['user'])
//{
$name=$_SESSION['user'];
//include('org1.php');


//include'dbfiles/org.php';
//include'dbfiles/org_update.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include("../pages/header.php");?>
    <style>
        strong{
            color:red;
        }
        strong {
        color: red;
    }

    body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            display: flex;
            justify-content: center; /* Center content horizontally */
    align-items: center; /* Center content vertically */
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            animation: fadeIn 1s ease-in-out;
        }

        .box {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            animation: slideInUp 1s ease-in-out;
        }

        .box-header {
            background-color: #5bc0de;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .box-title {
            margin: 0;
            font-size: 1.5em;
        }

        .box-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
        }

        .form-group:hover {
            transform: scale(1.05);
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type="date"],
        button {
            padding: 10px;
            font-size: 16px;
        }

        button {
            background-color: #5bc0de;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: #31b0d5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideInUp {
            from {
                transform: translateY(20px);
            }

            to {
                transform: translateY(0);
            }
        }

        .pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 20px; /* Adjust as needed */
}

.pagination {
    list-style: none;
    padding: 0;
}

.pagination li {
    display: inline-block;
    margin: 0 5px;
    transition: transform 0.3s ease-in-out;
}

.pagination li a {
    display: block;
    padding: 5px 10px;
    text-decoration: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.pagination li a:hover {
    background-color: #5bc0de;
    color: #fff;
}

.pagination li.active a {
    background-color: #5bc0de;
    color: #fff;
}

/* Style the search button */
button {
    background-color: #4CAF50; /* Green background color */
    color: white; /* White text color */
    padding: 10px 15px; /* Padding around the text */
    border: none; /* Remove border */
    border-radius: 5px; /* Add a slight border radius */
    cursor: pointer; /* Add a pointer cursor on hover */
}

/* Hover effect */
button:hover {
    background-color: #45a049; /* Darker green color on hover */
}


    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- ... Your HTML code ... -->


</head>

    <body class="no-skin">
        <?php include'template/logo.php'; ?>

        <div class="main-container ace-save-state" id="main-container">

                <!-- /.sidebar-shortcuts -->
        
                <!-- /.nav-list -->


            <div class="main-content">
              

                    <div class="page-content">
                        <!-- /.ace-settings-container -->
                        <div class="page-header">
                            <h1 align="center">
                          INVENTORY MANAGEMENT

                            </h1>
                        </div>
                        <div class="row">
                            <div class="col-xs-11.5">
                               <div class="box box-info">
								<div class="box-header with-border">
								  <h3 class="box-title"> PHARMACY UPDATE</h3>
								</div>
                               
                                <?php 
session_start();
include('dbconnection/connection.php');

if ($_SESSION['user']) {
    $name = $_SESSION['user'];

    $no_of_records_per_page = 50; // Change as needed
    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $offset = ($pageno - 1) * $no_of_records_per_page;

    $search = ''; // Initialize search query
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Modify your query to include the search filter
        $q = "SELECT * FROM phr_purinv_dtl WHERE PRODUCT_NAME LIKE '%$search%' OR `BATCH_NO` LIKE '%$search%' ORDER BY PRODUCT_NAME DESC LIMIT $offset, $no_of_records_per_page";
    } else {
        $q = "SELECT * FROM phr_purinv_dtl ORDER BY PRODUCT_CODE DESC LIMIT $offset, $no_of_records_per_page";
    }

    $rs = mysqli_query($link, $q) or die(mysqli_error($link));
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary CSS and JS -->
</head>
<body class="no-skin">
    <!-- Your HTML structure -->
    <div class="main-content">
    <form method="GET" action="">
            <!-- Search form -->
            <div class="form-group">
                <input class="form-control" type="text" name="search" placeholder="Search...">
                <button type="submit" class="btn btn-info">Search</button>
                <button onclick="window.location.href='new.php'" class="btn btn-primary">Reset</button>


            </div>
        </form>

        <!-- Table to display product list -->
        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>S No</th>
                    <th>Product Name</th>
                    <th>Batch Number</th>
                    <th>MRP</th>
                    <th>Expired Date</th>
                    <th>Stock</th>
                    <th>Each MRP rate</th>
                    <th>Manufactured By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($rs1 = mysqli_fetch_array($rs)) {
                    // Display product records in table rows
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rs1['PRODUCT_NAME']; ?></td>
                        <td><?php echo $rs1['BATCH_NO']; ?></td>
                        <td><?php echo $rs1['MRP']; ?></td>
                        <td><?php echo $rs1['EXP_DATE']; ?></td>
                        <td><?php echo $rs1['balance_qty']; ?></td>
                        <td><?php echo $rs1['each_mrp_rate']; ?></td>
                        <td><?php echo $rs1['manu_by']; ?></td>
                        <td style="display:none;">
    <input type="hidden" name="inv_id" value="<?php echo $rs1['inv_id']; ?>">
</td>

                        <td>
                            <!-- Edit button/link -->
                            <a href="edit_pharma.php?id=<?php echo urlencode($rs1['LR_NO']); ?>&product_name=<?php echo urlencode($rs1['PRODUCT_NAME']); ?>&batch_no=<?php echo urlencode($rs1['BATCH_NO']); ?>&inv_id=<?php echo urlencode($rs1['inv_id']); ?>">
                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                            </a>
                        </td>
                    </tr>
                    <?php 
                    $i++;
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination-wrapper">
            <ul class='pagination'>
                <?php 
                $total_pages_sql = "SELECT COUNT(*) FROM phr_purinv_dtl";
                $result = mysqli_query($link, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);

                echo "<li><a href='new.php?pageno=" . ($pageno - 1) . "' class='button' id='next-btn'>Previous</a></li>";

                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li><a href='new.php?pageno=" . $i . "' class='button'>" . $i . "</a></li>";
                }

                echo "<li><a href='new.php?pageno=" . ($pageno + 1) . "' class='button' id='next-btn'>Next</a></li>";
                ?>
            </ul>
        </div>
    </div>
</body>
</html>

<?php 
} else {
    session_destroy();
    session_unset();
    header('Location:index.php?authentication failed');
}
?>