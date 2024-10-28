<!DOCTYPE html>
<html>
<head>
    <title>Medicine List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 2200px;
            margin: 10px auto;
            padding: 10px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease;
            font-size: 12px;
            padding: 1px;
        }

        th, td {
            padding: 1px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .copy-button {
            background: #3498db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 10px;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .copy-button:hover {
            background: #2980b9;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #searchInput {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
    </style>
    <script>
        function copyRowDetails(rowId) {
            var row = document.getElementById(rowId);
            var text = '';
            for (var i = 0; i < row.cells.length - 1; i++) {
                text += row.cells[i].innerText + ' ';
            }
            navigator.clipboard.writeText(text.trim()).then(function() {
                alert('Copied to clipboard: ' + text);
            }, function(err) {
                alert('Error in copying text: ', err);
            });
        }

        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue, found;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("medicineTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                        }
                    }
                }
                if (found) {
                    tr[i].style.display = "";
                    found = false;
                }
            }
        }
    </script>
    <!-- <script>
        function copyRowDetails(rowId) {
            var row = document.getElementById(rowId);
            var text = '';
            for (var i = 0; i < row.cells.length - 1; i++) {
                text += row.cells[i].innerText + ' ';
            }
            navigator.clipboard.writeText(text.trim()).then(function() {
                alert('Copied to clipboard: ' + text);
            }, function(err) {
                alert('Error in copying text: ', err);
            });
        }
    </script>
    <script>
        function copyRowDetails(rowId) {
            var row = document.getElementById(rowId);
            var text = '';
            for (var i = 0; i < row.cells.length - 1; i++) {
                text += row.cells[i].innerText + ' ';
            }
            navigator.clipboard.writeText(text.trim()).then(function() {
                alert('Copied to clipboard: ' + text);
            }, function(err) {
                alert('Error in copying text: ', err);
            });
        }
    </script> -->
</head>
<body>
<div class="container">
    <h1>Medicine List</h1>
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for medicines..">
    <table id="medicineTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicine</th>
                <th>Company</th>
                <th>Composition</th>
                <th>Category</th>
                <th>Group</th>
                <th>Unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'conn.php';

            $stmt = $pdo->query('SELECT * FROM med');
            while ($row = $stmt->fetch()) {
                echo '<tr id="row-' . $row['id'] . '">';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['med']) . '</td>';
                echo '<td>' . htmlspecialchars($row['com']) . '</td>';
                echo '<td>' . htmlspecialchars($row['comp']) . '</td>';
                echo '<td>' . htmlspecialchars($row['cat']) . '</td>';
                echo '<td>' . htmlspecialchars($row['grp']) . '</td>';
                echo '<td>' . htmlspecialchars($row['unt']) . '</td>';
                echo '<td><button class="copy-button" onclick="copyRowDetails(\'row-' . $row['id'] . '\')">Copy</button></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
