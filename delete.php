<?php
include 'connect.php';

if (isset($_GET['deletename'])) {
    $name = $_GET['deletename'];

    $sql = "DELETE FROM class WHERE name = ?";

       $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the name parameter (string type 's')
        mysqli_stmt_bind_param($stmt, 's', $name);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to display page if successful
            header('Location: display.php');
            exit;
        } else {
            // Error executing the statement
            die("Error executing query: " . mysqli_error($conn));
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error preparing the statement
        die("Error preparing query: " . mysqli_error($conn));
    }
   mysqli_close($conn);
}
?>
