<?php

$conn = new mysqli("127.0.0.1", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "INSERT INTO students (first_name, last_name)
            VALUES ('$first_name', '$last_name')";

    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>My First PHP Page</title>

    <style>

        body {
            font-size: 18px;
        }

        h1 {
            font-size: 32px;
        }

        input {
            font-size: 18px;
            padding: 8px;
        }

        button {
            font-size: 18px;
            padding: 9px 20px;
            background-color: blue;
            color: white;
        }

        table {
            font-size: 18px;
        }

        th, td {
            padding: 12px;
        }

    </style>

</head>

<body>

    <h1>My First PHP Page</h1>

    <form method="POST">

        <label>First Name:</label>
        <input type="text" name="first_name" required>

        <br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required>

        <br><br>

        <button type="submit" name="submit">Submit</button>

    </form>

    <br>

    <table border="1">

        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Actions</th>
        </tr>

        <?php

        $result = $conn->query("SELECT * FROM students");

        while ($row = $result->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . $row['id'] . "</td>";

            echo "<td>" . $row['first_name'] . "</td>";

            echo "<td>" . $row['last_name'] . "</td>";

            echo "<td>";

            echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a>";

            echo " | ";

            echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";

            echo "</td>";

            echo "</tr>";
        }

        ?>

    </table>

</body>

</html>