<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
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
            max-width: 700px;
        }
        .form-control {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<div class="container bg-white shadow rounded p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">➕ Create New Product</h2>
        <a href="viewproduct.php" class="btn btn-outline-secondary">← Back to List</a>
    </div>

    <form action="proccessCreateProduct.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">📦 Product Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">📝 Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">💵 Price (VND)</label>
            <input type="number" class="form-control" name="price" id="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="stock_quantity" class="form-label">📦 Stock Quantity</label>
            <input type="number" class="form-control" name="stock_quantity" id="stock_quantity" required>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">🖼️ Image URL</label>
            <input type="url" class="form-control" name="image_url" id="image_url" placeholder="https://example.com/image.jpg" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">🏷️ Category</label>
            <input type="text" class="form-control" name="category" id="category" required>
        </div>
        <button type="submit" class="btn btn-success w-100">✅ Create Product</button>
    </form>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
