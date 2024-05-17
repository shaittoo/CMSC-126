<?php
include 'connect.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $graduation_status = $_POST['graduation_status'];
    $image_path = 'images/' . $_POST['image']; 

    $fields = [];
    if (!empty($name)) $fields[] = "name='$name'";
    if (!empty($age)) $fields[] = "age='$age'";
    if (!empty($email)) $fields[] = "email='$email'";
    if (!empty($course)) $fields[] = "course='$course'";
    if (!empty($year_level)) $fields[] = "year_level='$year_level'";
    if (isset($graduation_status)) $fields[] = "graduation_status='$graduation_status'";
    if (!empty($image_path)) $fields[] = "image_path='$image_path'";

    $sql = "UPDATE students SET " . implode(', ', $fields) . " WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
