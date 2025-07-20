<?php
include 'connectDb.php';
$conn = connectDb();

if (
    isset($_POST['id'], $_POST['name'], $_POST['description'], $_POST['price'], $_POST['stock_quantity'], $_POST['image_url'], $_POST['category']) &&
    is_numeric($_POST['id'])
) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $stock_quantity = intval($_POST['stock_quantity']);
    $image_url = trim($_POST['image_url']);
    $category = trim($_POST['category']);

    // Dùng Prepared Statement để tránh SQL Injection
    $stmt = $conn->prepare("UPDATE products 
                            SET name = ?, description = ?, price = ?, stock_quantity = ?, image_url = ?, category = ? 
                            WHERE id = ?");
    $stmt->bind_param("ssdis si", $name, $description, $price, $stock_quantity, $image_url, $category, $id);

    if ($stmt->execute()) {
        // Cập nhật thành công
        header("Location: viewproduct.php?success=1");
    } else {
        // Cập nhật thất bại
        header("Location: updateproduct.php?id=$id&error=1");
    }

    $stmt->close();
} else {
    // Dữ liệu không hợp lệ
    header("Location: viewproduct.php?invalid=1");
}

$conn->close();
?>
