<?php
require('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["productId"]) && isset($_POST["quantity"])) {
    // Retrieve the product ID and quantity from the POST data
    $productId = $_POST["productId"];
    $quantity = $_POST["quantity"];

    // Get current date and time
    $currentDateTime = date("Y-m-d H:i:s");

    $sql = "SELECT * FROM user WHERE name = '". $_SESSION[username]."'"; 
    $user_id_result = $con->query($sql);

    $sql = "SELECT order_id FROM order WHERE payment_id = NULL";
    $unpaid_order = $con->query($sql);
    
    if ($user_id_result) {
        // Assuming user_id is fetched correctly, you may need to adjust the retrieval logic accordingly

        // Fetch the user_id from the result set
        $user_id_row = $user_id_result->fetch_assoc();
        $user_id = $user_id_row['user_id'];

        // Prepare and execute the INSERT query
        $ins_query = "INSERT INTO cart_item (cart_id, product_id, quantity) VALUES ('$user_id', '$productId', '$quantity')";
        mysqli_query($con, $ins_query) or die(mysqli_error($con));

        $ins_query1 = "UPDATE cart SET updated_at = '".$currentDateTime."' WHERE user_id = '".$user_id."'";
        mysqli_query($con, $ins_query1) or die(mysqli_error($con));

        $status = "Product inserted into Cart Successfully.";
    } else {
        // Handle user_id retrieval failure
        $status = "Error: Unable to retrieve user_id from database.";
    }

    $sql = "SELECT * FROM cart_item WHERE cart_id = $user_id "; 
    $result = $con->query($sql);
    $subtotal = 0;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $sql1 = "SELECT * FROM product WHERE product_id=".$row["product_id"]; 
            $result1 = $con->query($sql1);
            $row1 = $result1->fetch_assoc();

            $quantity = $row['quantity'];
            $price = $row1['price'];

            $subtotal+=$quantity*$price;
        }
    }

    if ($unpaid_order->num_rows == 0) {
       
        $ins_query = "INSERT INTO order (user_id, amount) VALUES ('$user_id', $subtotal)";
        mysqli_query($con, $ins_query) or die(mysqli_error($con));
    }
    else{
        $row = $unpaid_order->fetch_assoc()
        $ins_query1 = "UPDATE order SET amount = '".$subtotal."' WHERE order_id = '".$row[order_id]."'";
        mysqli_query($con, $ins_query1) or die(mysqli_error($con));
    }
} else {
    // Return error response if data is not set
    $status = "Error: Missing data in the request.";
}

// Send response back to the client
echo $status;
?>
