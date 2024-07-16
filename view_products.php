<?php
include 'config/header.php';
include 'config/db.php';

$sql = "SELECT * FROM products";
$result = $connection->query($sql);
?>
<div class="container mt-5">
    <h2>View Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['category_id']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['price']}</td>
                            <td>
                                <a href='edit_product.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete_product.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirmDelete();'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No products found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php include 'config/footer.php'; ?>
<script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this product?');
}
</script>
