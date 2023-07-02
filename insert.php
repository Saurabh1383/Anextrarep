<?php
$servername = "localhost";
$username = "your_username";
$dbname = "your_database_name";

// Create a connection to the database
$conn = new mysqli(servername, root, form);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"];
$age = $_POST["age"];
$weight = $_POST["weight"];
$email = $_POST["email"];
$healthReport = $_FILES["healthReport"];

// Check if a file is uploaded
if ($healthReport["error"] == 0) {
    $uploadPath = "uploads/";
    $fileName = basename($healthReport["name"]);
    $targetPath = $uploadPath . $fileName;

    if (move_uploaded_file($healthReport["tmp_name"], $targetPath)) {
        // File uploaded successfully
        // Insert user details and file path into the database
        $sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', '$age', '$weight', '$email', '$targetPath')";
        if ($conn->query($sql) === TRUE) {
            echo "User details inserted successfully.";
        } else {
            echo "Error inserting user details: " . $conn->error;
        }
    } else {
        echo "Error uploading the health report.";
    }
}
