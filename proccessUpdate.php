<?php
include 'connectDb.php';
$conn = connectDb();

if (
    isset($_POST['id'], $_POST['email'], $_POST['fullname'], $_POST['phone']) &&
    is_numeric($_POST['id'])
) {
    $id = intval($_POST['id']);
    $email = trim($_POST['email']);
    $fullname = trim($_POST['fullname']);
    $phone = trim($_POST['phone']);

    // Dùng Prepared Statement để tránh SQL Injection
    $stmt = $conn->prepare("UPDATE accounts SET email = ?, fullname = ?, phone = ? WHERE id = ?");
    $stmt->bind_param("sssi", $email, $fullname, $phone, $id);

    if ($stmt->execute()) {
        // Cập nhật thành công
        header("Location: viewaccount.php?success=1");
    } else {
        // Cập nhật thất bại
        header("Location: updateaccount.php?id=$id&error=1");
    }

    $stmt->close();
} else {
    // Dữ liệu không hợp lệ
    header("Location: viewaccount.php?invalid=1");
}

$conn->close();
?>
