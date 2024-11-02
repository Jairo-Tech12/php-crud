<?php
$servername = "localhost";
$username = "root";
$password = "";  
$dbname = "student";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
    echo "";
}else{
    die(mysqli-error($conn));
}
?>