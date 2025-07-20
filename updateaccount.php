<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container bg-white shadow rounded p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Update Account</h2>
        <a href="viewaccount.php" class="btn btn-outline-secondary">← Back</a>
    </div>

    <?php
    include 'connectDb.php';
    $conn = connectDb();

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = intval($_GET['id']);

        $sql = "SELECT id, email, fullname, phone FROM accounts WHERE id = $id";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_NUM);
    ?>

    <form action="proccessUpdate.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">

        <div class="mb-3">
            <label for="email" class="form-label">📧 Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   value="<?php echo htmlspecialchars($row[1]); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fullname" class="form-label">👤 Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname"
                   value="<?php echo htmlspecialchars($row[2]); ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">📞 Phone</label>
            <input type="text" class="form-control" id="phone" name="phone"
                   value="<?php echo htmlspecialchars($row[3]); ?>" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-warning">🔄 Update Account</button>
        </div>
    </form>

    <?php
        } else {
            echo '<div class="alert alert-danger">❌ Tài khoản không tồn tại.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">❌ Thiếu ID tài khoản để cập nhật.</div>';
    }
    ?>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
