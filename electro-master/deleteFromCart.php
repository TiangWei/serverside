<?php
require('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Step 3: Perform deletion operation
    $sql = "DELETE FROM cart_item WHERE product_id = $productId";
    mysqli_query($con,$sql) or die ( mysqli_error($con));

    echo "Product deleted successfully";
    
} else {
    // Product ID is missing or invalid
    echo "Invalid product ID";
}

?>