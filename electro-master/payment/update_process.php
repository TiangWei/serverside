<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "gadget_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $paymentID = $_POST['paymentID'];
    $accountNum = $_POST['accountNum'];
    $expirationDate = $_POST['expirationDate'];
    $securityCode = $_POST['securityCode'];
    $bankName = $_POST['bankName'];
    $pStatus = $_POST['pStatus'];
    
    // Prepare SQL statement for updating payment method details
    $sql = "UPDATE paymentmethod SET AccountNum=?, ExpirationDate=?, SecurityCode=?, BankName=?, Pstatus=? WHERE PaymentMID=?";
    
    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $accountNum, $expirationDate, $securityCode, $bankName, $pStatus, $paymentID);
    
    if ($stmt->execute()) {
        // Redirect to the page where you display the updated payment method details
        header("Location: checkpayment.php");
        exit();
    } else {
        echo "Error updating payment method: " . $conn->error;
    }
    
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
