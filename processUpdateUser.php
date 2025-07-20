<?php
include 'connectDb.php';

$conn = connectDb();

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: viewUser.php');
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
