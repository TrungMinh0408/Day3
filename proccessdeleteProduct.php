<?php
include 'connectDb.php';

$conn = connectDb();

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: viewproduct.php');
} else {
    header("Location: viewproduct.php?id=$id");
}
?>
