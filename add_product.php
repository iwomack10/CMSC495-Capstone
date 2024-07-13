<?php
include 'config/header.php';
include 'config/db.php';

// Fetch categories
$sql = "SELECT id, name FROM categories";
$result = $connection->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, category_id, quantity, price) VALUES ('$name', '$category_id', '$quantity', '$price')";
    if ($connection->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>
<div class="container mt-5">
    <h2>Add New Product</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="" disabled selected>Select a category</option>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['id']."'>".$row['name']."</option>";
                    }
                } else {
                    echo "<option value='' disabled>No categories available</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
<?php include 'config/footer.php'; ?>
