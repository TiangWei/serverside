<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Electro - HTML Ecommerce Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

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
		include ('header.php');
		?>
	

	<div class="clearfix visible-sm visible-xs"></div>

	<!-- product -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="row">
						<?php

						

						require ('../database.php');
						//session_start(); // Start the session
						$status = "";
						if (isset($_POST['new']) && $_POST['new'] == 1) {
							$uploadedFileName = $_FILES['file']['name'];
							$targetDirectory = "../img/";
							$targetFilePath = $targetDirectory . $uploadedFileName;
							$product_name = $_REQUEST['product_name'];
							$price = $_REQUEST['price'];
							$quantity = $_REQUEST['quantity'];
							$description = $_REQUEST['description'];
							$brand = $_REQUEST['brand'];
							$category = $_REQUEST['category']; // Added category selection
							$date_record = date("Y-m-d H:i:s");
							if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
								$ins_query = "INSERT into product
                          (`product_name`, `description`, `quantity_available`, `brand`, `category_id`, `image_url`, `price`)
                          values
                          ('$product_name', '$description', '$quantity', '$brand', '$category','$uploadedFileName' , '$price')";

								mysqli_query($con, $ins_query) or die(mysqli_error($con));

								$status = "New Product Inserted Successfully.";
							}
						}
						?>
						<h1>Insert New Product</h1>
						<form enctype="multipart/form-data" name="form" method="post" action="">
							<input type="hidden" name="new" value="1" />
							<p><input type="text" name="product_name" placeholder="Enter Product Name" required /></p>
							<p><input type="number" name="price" step="0.01" min="0"
									placeholder="Enter Product Price (RM)" required /></p>
							<p><input type="number" name="quantity" placeholder="Enter Product Quantity" required /></p>
							<p><input type="text" name="description" placeholder="Enter Product Description" required />
							</p>
							<p><input type="text" name="brand" placeholder="Enter Product Brand" required /></p>
							<!-- Styled Category Selection Dropdown -->
							<p>
								<select name="category" required class="section">
									<option value="" disabled selected>Select Category</option>
									<option value="1">Laptop</option>
									<option value="2">Smartphone</option>
									<option value="3">Camera</option>
									<option value="4">Accessories</option>
								</select>
							</p>
							<input type="file" name="file" required /><br><br>
							<p><input name="submit" type="submit" value="Submit" /></p>
						</form>
						<p style="color:#008000;">
							<?php echo isset($status) ? $status : ''; ?>
						</p>
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

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<div class="newsletter">
						<p>Sign Up for the <strong>NEWSLETTER</strong></p>
						<form>
							<input class="input" type="email" placeholder="Enter Your Email">
							<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
						</form>
						<ul class="newsletter-follow">
							<li>
								<a href="#"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#"><i class="fa fa-pinterest"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">About Us</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
								incididunt ut.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
								<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Category</h3>
							<ul class="footer-links">
								<li><a href="laptop.php">Laptops</a></li>
								<li><a href="smartphone.php">Smartphones</a></li>
								<li><a href="camera.php">Cameras</a></li>
								<li><a href="acc.php">Accessories</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
						<span class="copyright">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;
							<script>document.write(new Date().getFullYear());</script> All rights reserved | This
							template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a
								href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</span>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

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