<!DOCTYPE html>
<html>
<head>
    <title>View Record</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>View Record</h2>
    <?php
    include 'connect.php';

    if (isset($_GET['id']) || isset($_GET['name'])) {
        $id = isset($_GET['id']) ? ($_GET['id']) : null;
        $name = isset($_GET['name']) ? ($_GET['name']) : null;

        if ($id) {
            $sql = "SELECT * FROM students WHERE id=$id";
        } elseif ($name) {
            $sql = "SELECT * FROM students WHERE name LIKE '%$name%'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th>Graduation Status</th>
                        <th>Image</th>
                        <th>Registration Date</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['year_level']}</td>
                        <td>" . ($row['graduation_status'] ? 'Graduated' : 'Not Graduated') . "</td>
                        <td><img src='{$row['image_path']}' width='100' height='100'></td>
                        <td>{$row['reg_date']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $conn->close();
    } else {
        echo "Please provide either an ID or a Name.";
    }
    ?>
</body>
</html>
