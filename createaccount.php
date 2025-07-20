<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
        }
        .form-control {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<div class="container bg-white shadow rounded p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">Create New Account</h2>
        <a href="viewaccount.php" class="btn btn-outline-secondary">← Back to List</a>
    </div>

    <form action="proccessCreate.php" method="post" onsubmit="return validateForm()">
        <div class="mb-3">
            <label for="email" class="form-label">📧 Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">🔐 Password</label>
            <input type="password" class="form-control" name="pwd" id="pwd" required>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">🔁 Confirm Password</label>
            <input type="password" class="form-control" name="confirm" id="confirm" required>
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">👤 Full Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">📞 Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" pattern="[0-9]{10,11}" placeholder="Nhập số điện thoại" required>
        </div>
        <button type="submit" class="btn btn-success w-100">✅ Create Account</button>
    </form>
</div>

<!-- JS validate -->
<script>
function validateForm() {
    const pwd = document.getElementById('pwd').value;
    const confirm = document.getElementById('confirm').value;
    if (pwd !== confirm) {
        alert('❗ Mật khẩu xác nhận không khớp.');
        return false;
    }
    return true;
}
</script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
