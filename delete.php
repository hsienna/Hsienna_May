<?php

$conn = new mysqli("127.0.0.1", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

$conn->query("DELETE FROM students WHERE id=$id");

header("Location: index.php");
exit;

?>