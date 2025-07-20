<?php
include 'connectDb.php';

$conn = connectDb();
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: viewUser.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
