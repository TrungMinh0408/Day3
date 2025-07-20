<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Account List</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background: #f8f9fa;
    }
    .container {
      margin-top: 40px;
    }
    table th, table td {
      vertical-align: middle !important;
    }
  </style>
</head>
<body>

<?php
include 'connectDb.php';
$conn = connectDb();

$sql = "SELECT id, email, fullname, phone FROM accounts";

$searchEmail = '';
$searchPhone = '';
$whereAdded = false;

if (isset($_GET['btnSearch'])) {
    if (!empty($_GET['email'])) {
        $searchEmail = trim($_GET['email']);
        $escapedEmail = $conn->real_escape_string($searchEmail);
        $sql .= " WHERE email LIKE '%$escapedEmail%'";
        $whereAdded = true;
    }

    if (!empty($_GET['phone'])) {
        $searchPhone = trim($_GET['phone']);
        $escapedPhone = $conn->real_escape_string($searchPhone);

        if ($whereAdded) {
            $sql .= " AND phone LIKE '%$escapedPhone%'";
        } else {
            $sql .= " WHERE phone LIKE '%$escapedPhone%'";
            $whereAdded = true;
        }
    }

}



$result = $conn->query($sql);
?>

<div class="container bg-white shadow rounded p-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-primary">📄 Account List</h2>
    <a href="createaccount.php" class="btn btn-success" onclick="return confirm('Bạn chắc chắn muốn tạo tài khoản mới?')">➕ Create New</a>
  </div>

  <!-- 🔍 Search Form -->
  <form method="GET" class="row g-3 mb-4">
    <div class="col-md-10">
        <div class="input-group">
            <input type="text" class="form-control" name="email" placeholder="🔎 Tìm theo email..." value="<?php echo htmlspecialchars($searchEmail); ?>">
            <input type="text" class="form-control" name="phone" placeholder="🔎 Tìm theo số điện thoại..." value="<?php echo htmlspecialchars($searchPhone ?? ''); ?>">
        </div>
    </div>

    <div class="col-md-2 d-grid">
            <button type="submit" name="btnSearch" class="btn btn-primary">Tìm kiếm</button>
    </div>
  </form>

  <table class="table table-bordered table-striped table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Full Name</th>
        <th>Phone</th>
        <th colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row[0]) . "</td>";
            echo "<td>" . htmlspecialchars($row[1]) . "</td>";
            echo "<td>" . htmlspecialchars($row[2]) . "</td>";
            echo "<td>" . htmlspecialchars($row[3]) . "</td>";
            echo "<td><a href='updateaccount.php?id=$row[0]' class='btn btn-warning btn-sm'>✏️ Update</a></td>";
            echo "<td><a href='proccessdelete.php?id=$row[0]' class='btn btn-danger btn-sm' onclick=\"return confirm('Bạn có chắc chắn muốn xóa tài khoản này?');\">🗑️ Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo '<tr><td colspan="6" class="text-danger fw-bold">Không tìm thấy tài khoản nào.</td></tr>';
    }
    $conn->close();
    ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
