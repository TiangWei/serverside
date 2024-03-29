<?php
//start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Smartphone</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +0149902468</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> tiangjw02@utar.my</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1594 Kampar</a></li>
					</ul>
					<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> RM</a></li>
					<!-- add user name if logged in -->
					<li><a href="user/account.php"><i class="fa fa-user-o"></i> Hi,&nbsp;
							<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
							?>
						</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
				</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- ACCOUNT -->
						<div >
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">3</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="./img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">product name goes here</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="store.php">Home</a></li>
						<li><a href="laptop.php">Laptops</a></li>
						<li class="active"><a href="smartphone.php">Smartphones</a></li>
						<li><a href="camera.php">Cameras</a></li>
						<li><a href="acc.php">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
			</div>
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		

							<div class="clearfix visible-sm visible-xs"></div>

							<!-- product -->
							<div class="section">
    <div class="container">
        <div class="row">
            <?php
            // Step 1: Establish connection to MySQL database
            $servername = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $dbname = "gadget_db"; // Replace with your database name

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                echo "fail";
            }
            $category_id = 2; // Replace 5 with the desired category_id

            $sql = "SELECT * FROM product WHERE category_id = $category_id";

            $result = $conn->query($sql);

            // Step 3: Display products
            if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4 col-xs-6'>";
        echo "<div class='product'>";
        echo "<div class='product-img'>";
        echo "<img src='./img/" . $row["image_url"] . "' alt='" . $row["product_name"] . "'>";
        echo "</div>";
        echo "<div class='product-body'>";
        echo "<h3 class='product-name'><a href='#'>" . $row["product_name"] . "</a></h3>";
		echo "<h3 class='product-name'><a href='#'>" . $row["brand"] . "</a></h3>";
		echo "<h5><a href='#'>" . $row["description"] . "</a></h5>";
        echo "<h4 class='product-price'>$" . $row["price"] . "</h4>";
        echo "<div class='product-rating'>";
        echo "</div>";
        echo "<div class='product-btns'>";
        echo "<button class='quantity-button' onclick='decrementQuantity(this)'>-</button>";
		echo "<input type='number' id=''quantityInput name='quantity' class='quantity-input' value='1' min='1' max='" . $row["quantity_available"] . "'>";
        echo "<button class='quantity-button' onclick='incrementQuantity(this, " . $row["quantity_available"] . ")'>+</button>";
        echo "</div>";
        echo "</div>";
        echo "<div class='add-to-cart'>";
        echo "<button class='add-to-cart-btn' data-product-id='" . $row["product_id"] . "'><i class='fa fa-shopping-cart'></i> add to cart</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No products found";
}

            

            // Step 4: Close database connection
            $conn->close();
            ?>
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
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
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
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
   function incrementQuantity(button, maxQuantity) {
        var input = button.previousElementSibling;
        var currentValue = parseInt(input.value);
        if (currentValue < maxQuantity) {
            input.value = currentValue + 1;
        }
    }

    function decrementQuantity(button) {
        var input = button.nextElementSibling;
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
	document.getElementById("productOptions").addEventListener("change", function() {
        var selectedOption = this.value;
        if (selectedOption === "add") {
            window.location.href = "upload.php";  // Redirect to Add Product page
        } else if (selectedOption === "modify") {
            window.location.href = "viewproduct.php";  // Redirect to Modify Product page
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add-to-cart-btn').click(function() {
            var productId = $(this).data('product-id');
			var quantity = $(this).closest('.add-to-cart').prev().find('.quantity-input').val();
            // Now you can perform actions based on the product ID and quantity, like adding to cart
            console.log("Product ID: " + productId);
            console.log("Quantity: " + quantity);
            // Here you can make an AJAX request to add the product to the cart or perform other actions
        });
    });
</script>
</body>
</html>
