
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    include 'connect.php';
    $name = $_POST['name'];
    $id = $_POST['id'];
    $email = $_POST['email'];
    $registration = $_POST['registration'];
    
    // SQL query to insert data into the 'class' table
    $sql1 = "INSERT INTO class (name, id, email, registration) VALUES ('$name', '$id', '$email', '$registration')";
    
    // SQL query to insert data into the 'exam' table
    $sql2 = "INSERT INTO exam (name, id, email, registration) VALUES ('$name', '$id', '$email', '$registration')";
    
    // Execute the first query
    if ($conn->query($sql1) === TRUE) {
    if ($conn->query($sql2) === TRUE) {
           
            header('location:display.php');
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
        $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="input-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" placeholder="Enter your ID" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="abcd12@gmail.com" required>
            </div>
            <div class="input-group">
                <label for="registration">Registration Number</label>
                <input type="text" id="registration" name="registration" placeholder="Enter your registration number" required>
            </div>
            <button type="submit" name="submit">Save</button>
        </form>
    </div>
</body>
<style>
/* CSS styling as per your original code */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f9;
}

.form-container {
    width: 100%;
    max-width: 400px;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

.input-group {
    margin-bottom: 15px;
}

.input-group label {
    display: block;
    font-weight: bold;
    color: #555;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    margin-top: 20px;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #218838;
}

/* Responsive styling */
@media (max-width: 600px) {
    .form-container {
        padding: 20px;
    }

    h2 {
        font-size: 20px;
    }

    button {
        font-size: 16px;
    }
}
</style>
</html>
