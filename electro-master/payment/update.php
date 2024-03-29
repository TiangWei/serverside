<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Payment Check</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="../css/slick.css" />
	<link type="text/css" rel="stylesheet" href="../css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="../css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<style>
		h1 {
			color: #333333;
		}

		p {
			margin-bottom: 15px;
		}

		input[type="text"],
		input[type="number"] {
			width: 100%;
			padding: 10px;
			margin-top: 5px;
			border-radius: 5px;
			border: 1px solid #ccc;
		}

		input[type="submit"] {
			padding: 10px 20px;
			background-color: #008000;
			color: #ffffff;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		/* Styled Select Dropdown */
	</style>
</head>

<body>
	<!-- HEADER -->
	<?php include '../staff/header.php'; ?>
	<!-- /HEADER -->


	<!-- SECTION -->
	<div class="section">
		<div class="container">
			<div class="row">
				<!-- PHP code for displaying database results in a table -->
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
					// Retrieve payment method ID from the form
					$paymentID = $_POST['paymentID'];

					// SQL query to select payment method details based on PaymentMID
					$sql = "SELECT PaymentMID, AccountNum, ExpirationDate, SecurityCode, BankName, Pstatus FROM paymentmethod WHERE PaymentMID = ?";

					// Prepare and execute the statement
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("i", $paymentID);
					$stmt->execute();

					// Get the result
					$result = $stmt->get_result();

					if ($result->num_rows == 1) {
						// Fetch the payment method details
						$row = $result->fetch_assoc();

						// Display the form for updating payment method details
						?>
						<form method="post" action="update_process.php">
							<input type="hidden" name="paymentID" value="<?php echo $row['PaymentMID']; ?>">
							<label for="accountNum">Account Number:</label>
							<input type="text" id="accountNum" name="accountNum" value="<?php echo $row['AccountNum']; ?>"><br>
							<label for="expirationDate">Expiration Date:</label>
							<input type="text" id="expirationDate" name="expirationDate"
								value="<?php echo $row['ExpirationDate']; ?>"><br>
							<label for="securityCode">Security Code:</label>
							<input type="text" id="securityCode" name="securityCode"
								value="<?php echo $row['SecurityCode']; ?>"><br>
							<label for="bankName">Bank Name:</label>
							<input type="text" id="bankName" name="bankName" value="<?php echo $row['BankName']; ?>"><br>
							<label for="pStatus">Payment Status:</label>
							<select id="pStatus" name="pStatus">
								<option value="fail" <?php if ($row['Pstatus'] == "fail")
									echo "selected"; ?>>Fail</option>
								<option value="pending" <?php if ($row['Pstatus'] == "pending")
									echo "selected"; ?>>Pending
								</option>
								<option value="cancelled" <?php if ($row['Pstatus'] == "cancelled")
									echo "selected"; ?>>Cancelled
								</option>
								<option value="success" <?php if ($row['Pstatus'] == "success")
									echo "selected"; ?>>success
								</option>
							</select><br>
							<button type="submit" name="update">Update</button>
						</form>
						<?php
					} else {
						echo "Payment method not found.";
					}

					// Close statement
					$stmt->close();
				}

				// Close connection
				$conn->close();
				?>

				<!-- /PHP code for displaying database results in a table -->
			</div>
		</div>
	</div>


	<!-- /STORE -->
	</div>
	<!-- /row -->
	</div>
	<!-- /container -->
	</div>
	<!-- /SECTION -->




	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>