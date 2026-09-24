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

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>My First PHP Page</title>

    <style>

        body {
            margin: 0;
            padding: 40px 20px;
            font-family: Arial, sans-serif;
            background-color: #dfe8df;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            color: #174d32;
            margin-bottom: 30px;
        }

        .form-box {
            background-color: #f1f6f1;
            padding: 25px;
            border-radius: 12px;
            border-left: 6px solid #174d32;
            margin-bottom: 30px;
        }

        label {
            color: #174d32;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 7px;
            margin-bottom: 15px;
            border: 1px solid #9caf9c;
            border-radius: 7px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input:focus {
            outline: none;
            border: 2px solid #174d32;
        }

        button {
            width: 100%;
            padding: 11px;
            background-color: #174d32;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0e3824;
        }

        .table-box {
            background-color: #f1f6f1;
            padding: 20px;
            border-radius: 12px;
            border-left: 6px solid #174d32;
        }

        .table-box h2 {
            color: #174d32;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th {
            background-color: #174d32;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #d0dcd0;
        }

        a {
            color: #174d32;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>My First PHP Page</h1>

    <div class="form-box">

        <form method="POST">

            <label>First Name:</label>

            <input
                type="text"
                name="first_name"
                required
            >

            <label>Last Name:</label>

            <input
                type="text"
                name="last_name"
                required
            >

            <button type="submit" name="submit">
                Submit
            </button>

        </form>

    </div>

    <div class="table-box">

        <h2>Student List</h2>

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

    </div>

</div>

</body>

</html>