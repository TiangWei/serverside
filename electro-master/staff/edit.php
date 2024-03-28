<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Update Product</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../electro-master/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="../electro-master/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="../electro-master/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="../electro-master/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../electro-master/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../electro-master/css/style.css" />

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

	<?php
	include ("header.php");
	?>
	<!-- /HEADER -->


	<div class="clearfix visible-sm visible-xs"></div>

	<!-- product -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="row">
					<h1>Update Product</h1>
					<br>
						<?php
						require ('../database.php');
						$id = $_REQUEST['id'];
						$query = "SELECT * FROM product WHERE product_id=$id";
						$result = mysqli_query($con, $query) or die(mysqli_error($con));
						$row = mysqli_fetch_assoc($result);
						?>
						<?php
						$status = "";
						if (isset($_POST['new']) && $_POST['new'] == 1) {
							$product_name = $_REQUEST['product_name'];
							$price = $_REQUEST['price'];
							$quantity = $_REQUEST['quantity'];
							$description = $_REQUEST['description'];
							$brand = $_REQUEST['brand'];
							$category = $_REQUEST['category'];
							$update = "UPDATE product set 
							product_name='" . $product_name . "', price='" . $price . "', quantity_available='" . $quantity . "',
							description='" . $description . "',brand='" . $brand . "',category_id='" . $category . "' where product_id='" . $id . "'";
							mysqli_query($con, $update) or die(mysqli_error($con));
							$status = "Product Record Updated Successfully. </br></br>
							<a href='viewproduct.php'>View Updated Record</a>";
							echo '<p style="color:#008000;">' . $status . '</p>';
						} else {
							?>
							<form name="form" method="post" action="">
								<input type="hidden" name="new" value="1" />
								<input name="id" type="hidden" value="<?php echo $row['product_id']; ?>" />
								<h5>Product name <h5>
								<p><input type="text" name="product_name" placeholder="Update Product Name" required
										value="<?php echo $row['product_name']; ?>" /></p>
								<br>
								<h5>Product price <h5>
								<p><input type="number" name="price" step="0.01" min="0"
										placeholder="Enter Product Price (RM)" required
										value="<?php echo $row['price']; ?>" /></p>
								<br>
							    <h5>Product quantity <h5>
								<p><input type="number" name="quantity" placeholder="Enter Product Quantity" required
										value="<?php echo $row['quantity_available']; ?>" /></p>
								<br>
								<h5>Product description <h5>
								<p><input type="text" name="description" placeholder="Enter Product Description" required
										value="<?php echo $row['description']; ?>" /></p>
								<br>
								<h5>Product brand <h5>
								<p><input type="text" name="brand" placeholder="Enter Product Brand" required
										value="<?php echo $row['brand']; ?>" /></p>
								<!-- Styled Category Selection Dropdown -->
								<br>
								<h5>Product category <h5>
								<p>
									<select name="category" required>
										<option value="" disabled>Select Category</option>
										<option value="1" <?php if ($row['category_id'] == 1)
											echo 'selected'; ?>>Laptop
										</option>
										<option value="2" <?php if ($row['category_id'] == 2)
											echo 'selected'; ?>>Smartphone
										</option>
										<option value="3" <?php if ($row['category_id'] == 3)
											echo 'selected'; ?>>Camera
										</option>
										<option value="4" <?php if ($row['category_id'] == 4)
											echo 'selected'; ?>>Accessories
										</option>
									</select>
								</p>
								<br>
								<p><input name="submit" type="submit" value="Update" /></p>
							</form>
						<?php } ?>
					</div>
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
	<script>
		document.getElementById("productOptions").addEventListener("change", function () {
			var selectedOption = this.value;
			if (selectedOption === "add") {
				window.location.href = "upload.php";  // Redirect to Add Product page
			} else if (selectedOption === "modify") {
				window.location.href = "viewproduct.php";  // Redirect to Modify Product page
			}
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>