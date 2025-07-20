<?php
include 'connectDb.php';

$conn = connectDb();
$id = $_GET['id'];
$sql = "SELECT id, username, email FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_NUM);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="processUpdateUser.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $row[1]; ?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row[2]; ?>" required>
        </div>
        <div>
            <input type="submit" value="Update User">
        </div>
    </form>
</body>
</html>
