<?php
$conn = new mysqli("127.0.0.1", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM students WHERE id=$id";

if ($conn->query($sql)) {

    header("Location: index.php");
    exit();

} else {

    echo "Error deleting student: " . $conn->error;

}

?>>