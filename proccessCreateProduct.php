<?php
include "connectDb.php";
$conn = connectDb();

// Lấy dữ liệu từ form
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$stock_quantity = $_POST['stock_quantity'];
$image_url = $_POST['image_url'];
$category = $_POST['category'];

// Câu lệnh INSERT
$sql = "INSERT INTO products (name, description, price, stock_quantity, image_url, category)
        VALUES ('$name', '$description', $price, $stock_quantity, '$image_url', '$category')";

// Thực thi và điều hướng
if ($conn->query($sql) === TRUE) 
    header('Location: viewproduct.php');
else
    header('Location: createproduct.php');
?>
