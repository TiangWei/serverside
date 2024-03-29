<?php
require('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    $sql = "SELECT * FROM user WHERE name = '". $_SESSION[username]."'"; 
    $user_id_result = $con->query($sql);
    $user_id_row = $user_id_result->fetch_assoc();
    $user_id = $user_id_row['user_id'];

    // Step 3: Perform deletion operation
    $sql = "DELETE FROM cart_item WHERE product_id = $productId and cart_id = '".$user_id."'";
    mysqli_query($con,$sql) or die ( mysqli_error($con));

    echo "Product deleted successfully";
    
} else {
    // Product ID is missing or invalid
    echo "Invalid product ID";
}

?>