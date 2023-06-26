<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// // Create database
$sql = "CREATE DATABASE ap_proj";
if (mysqli_query($conn, $sql)) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . mysqli_error($conn) . "\n";
}

// Select database
mysqli_select_db($conn, "ap_proj");

// Create table
$sql = "CREATE TABLE user_profile (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
account_number VARCHAR(30) NOT NULL,
balance INT(10) NOT NULL DEFAULT 0,
full_name VARCHAR(50) NOT NULL,
phone VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
aadhar_card_number VARCHAR(12) NOT NULL,
gender VARCHAR(6) NOT NULL,
dob DATE NOT NULL,
full_address VARCHAR(150) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
  echo "Table user_profile created successfully\n";
} else {
  echo "Error creating table: " . mysqli_error($conn) . "\n";
}

mysqli_close($conn);
?>
