<?php
include 'config/header.php';
include 'config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "No product found with that ID.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products SET name='$name', category_id='$category_id', quantity='$quantity', price='$price' WHERE id='$id'";
    if ($connection->query($sql) === TRUE) {
        header('Location: view_products.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>
<div class="container mt-5">
    <h2>Edit Product</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <?php
                $sql = "SELECT id, name FROM categories";
                $result = $connection->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $selected = ($row['id'] == $product['category_id']) ? 'selected' : '';
                        echo "<option value='".$row['id']."' $selected>".$row['name']."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
<?php include 'config/footer.php'; ?>
