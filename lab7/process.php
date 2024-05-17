<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $graduation_status = $_POST['graduation_status'];
    $image_path = 'images/' . $_POST['image']; 

    $sql = "INSERT INTO students (name, age, email, course, year_level, graduation_status, image_path)
            VALUES ('$name', '$age', '$email', '$course', '$year_level', '$graduation_status', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
