<?php
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Table</title>
   
</head>
<body>

<div class="container">
    <a href="register.php" class="button">Add Student</a>
</div>

<div class="container">
    <h1>Search student</h1>
    
    <!-- Search Form -->
    <form class="search-form" method="GET" action="">
        <input type="text" name="search" placeholder="Enter name or email" required>
        <button type="submit" class="search-btn">Search</button>
    </form>

    <!-- Results Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Registration Date</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display search results if search query is set
            if (isset($_GET['search'])) {
                $search = mysqli_real_escape_string($conn, $_GET['search']);
                $query = "SELECT * FROM `class` WHERE `Name` LIKE '%$search%' OR `Email` LIKE '%$search%'";
            } else {
                $query = "SELECT * FROM `class`"; // Default query to fetch all records
            }

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['ID']) . "</td>
                            <td>" . htmlspecialchars($row['Name']) . "</td>
                            <td>" . htmlspecialchars($row['Email']) . "</td>
                            <td>" . htmlspecialchars($row['registration']) . "</td>
                            <td>
                                <a href='delete.php?deletename=" . urlencode($row['Name']) . "' class='action-btn'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
<style>
        /* Basic reset and styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #eef2f7;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin-bottom: 30px;
            text-align: center;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            text-transform: uppercase;
        }

        /* Button styling */
        .button, .search-btn {
            display: inline-block;
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .button:hover, .search-btn:hover {
            background: linear-gradient(90deg, #0056b3, #003f88);
        }

        /* Link styling */
        .button a, .search-btn a {
            color: #fff;
            text-decoration: none;
        }

        /* Search Form */
        .search-form {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Table Styling */
        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th, .table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        /* Action buttons in the table */
        .action-btn {
            display: inline-block;
            padding: 8px 12px;
            background: linear-gradient(90deg, #e3342f, #c82333);
            color: #fff;
            border: none;
            border-radius: 3px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .action-btn:hover {
            background: linear-gradient(90deg, #c82333, #a71d2a);
        }

        .action-btn a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</html>
