<?php
session_start();
include("../db/connection.php");

if ($_SESSION['user']) {
    $name = $_SESSION['user'];

    if (isset($_GET['id']) && isset($_GET['product_name']) && isset($_GET['batch_no']) && isset($_GET['inv_id'])) {
        $id = $_GET['id'];
        $product_name = $_GET['product_name'];
        $batch_no = $_GET['batch_no'];
        $inv_id = $_GET['inv_id'];

        // Ensure values are properly escaped to prevent SQL injection
        $id = mysqli_real_escape_string($link, $id);
        $product_name = mysqli_real_escape_string($link, $product_name);
        $batch_no = mysqli_real_escape_string($link, $batch_no);
        $inv_id = mysqli_real_escape_string($link, $inv_id);

        // Retrieve the record based on the ID, product name, batch number, and inv_id
        $query = "SELECT * FROM phr_purinv_dtl WHERE LR_NO = '$id' AND PRODUCT_NAME = '$product_name' AND BATCH_NO = '$batch_no' AND inv_id = '$inv_id'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "No record found";
            exit();
        }
    } else {
        echo "ID, Product Name, Batch Number or inv_id parameter missing";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Edit Product</title>
    <!-- Include necessary CSS and JS -->
    <style>
        strong{
            color:red;
        }
        strong {
        color: red;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-image: url("../img/md.jpg"); /* Add your image path here */
        background-size: center; /* Cover the entire background */
        background-position: center; /* Center the background image */
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
        background-color: rgba(255, 255, 255, 0.8); /* Add transparency to the container */
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
            background-color: blue;
            color: blue;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover {
            background-color: blue;
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
    background-color: blue; /* Green background color */
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

</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <form method="post" action="actupt.php">
            <div class="form-group">
                <label for="product_name">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['PRODUCT_NAME']; ?>">
            </div>
            <div class="form-group">
                <label for="batch_number">Batch Number:</label>
                <input type="text" class="form-control" id="batch_number" name="batch_number" value="<?php echo $row['BATCH_NO']; ?>">
            </div>
            <div class="form-group">
                <label for="mrp">MRP:</label>
                <input type="text" class="form-control" id="mrp" name="mrp" value="<?php echo $row['MRP']; ?>">
            </div>
            <div class="form-group">
                <label for="exp_date">Expired Date:</label>
                <input type="date" class="form-control" id="exp_date" name="exp_date" value="<?php echo $row['EXP_DATE']; ?>">
            </div>
            <div class="form-group">
                <label for="balance_qty">Stock:</label>
                <input type="text" class="form-control" id="balance_qty" name="balance_qty" value="<?php echo $row['balance_qty']; ?>">
            </div>
            <div class="form-group">
                <label for="each_mrp_rate">Each MRP Rate:</label>
                <input type="text" class="form-control" id="each_mrp_rate" name="each_mrp_rate" value="<?php echo $row['each_mrp_rate']; ?>">
            </div>
            <div class="form-group">
                <label for="manu_by">Manufactured By:</label>
                <input type="text" class="form-control" id="manu_by" name="manu_by" value="<?php echo $row['manu_by']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="inv_id" value="<?php echo $row['inv_id']; ?>"> <!-- Hidden inv_id field -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <button onclick="window.location.href='new.php'" class="btn btn-primary">Back</button>

        </form>
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
