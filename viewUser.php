<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h3><a href="createUser.php">Create New User</a></h3>
    <h1>User List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connectDb.php';

            $conn = connectDb();
            $sql = "SELECT id, username, email FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_array(MYSQLI_NUM)) {
                    echo "<tr>";
                    echo "<td>{$row[0]}</td>";
                    echo "<td>{$row[1]}</td>";
                    echo "<td>{$row[2]}</td>";
                    echo "<td><a href='updateUser.php?id={$row[0]}'>Update</a> | 
                              <a href='deleteUser.php?id={$row[0]}'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Users</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
