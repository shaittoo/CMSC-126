<?php
include 'connect.php';

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40) NOT NULL,
    age INT(2) NOT NULL,
    email VARCHAR(40) NOT NULL,
    course VARCHAR(40) NOT NULL,
    year_level INT(1) NOT NULL,
    graduation_status BOOLEAN NOT NULL,
    image_path VARCHAR(60) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    include 'process.php';
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
?>
