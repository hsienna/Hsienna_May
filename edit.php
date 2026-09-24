<?php

$conn = new mysqli("127.0.0.1", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM students WHERE id=$id");

$row = $result->fetch_assoc();

if (!$row) {
    die("Student not found.");
}

if (isset($_POST['update'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $sql = "UPDATE students
            SET first_name='$first_name',
                last_name='$last_name'
            WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating student: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Student</title>

</head>

<body>

    <h1>Edit Student</h1>

    <form method="POST">

        <label>First Name:</label>

        <input
            type="text"
            name="first_name"
            value="<?php echo $row['first_name']; ?>"
            required
        >

        <br><br>

        <label>Last Name:</label>

        <input
            type="text"
            name="last_name"
            value="<?php echo $row['last_name']; ?>"
            required
        >

        <br><br>

        <button type="submit" name="update">
            Update
        </button>

    </form>

    <br>

    <a href="index.php">Back</a>

</body>

</html>

