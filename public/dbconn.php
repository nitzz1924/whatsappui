<?php
$servername = "127.0.0.1";
$username = "yuvmeuhg_whatsappui";
$password = "G1]R?rw3W8XI";
$dbname = "yuvmeuhg_whatsappui";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";


