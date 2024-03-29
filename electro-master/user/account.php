<?php
//new account
require ('../config.php');
include ('../auth.php');

$status = '';

if (isset ($_POST['action']) && $_POST['action'] == "updateAccount") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];

    // Perform the update query
    $updateQuery = "UPDATE user SET name ='$fname', phone='$phone',
                    email='$email', address = '$address', city = '$city', zip = '$zip' 
                    WHERE name = '" . $_SESSION['user_name'] . "'";

    if (mysqli_query($conn, $updateQuery)) {
        $status = "User information updated successfully.";
    } else {
        // Handle update query error
        $status = "Error updating user information: " . mysqli_error($conn);
    }
}

// Fetch user data
if (isset ($_SESSION['user_name'])) {
    $sel_query = "SELECT * FROM user WHERE name = '" . $_SESSION['user_name'] . "'";
    $result = mysqli_query($conn, $sel_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
        $city = $row['city'];
        $zip = $row['zip'];
    } else {
        // Handle query error or first-time user
        $fname = '';
        $phone = '';
        $email = '';
        $address = '';
        $city = '';
        $zip = '';
    }
}
?>



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

        .row {
            margin-bottom: 15px;
        }

        /* Styled Select Dropdown */
    </style>
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
						<li><a href="account.php"><i class="fa fa-user-o"></i> Hi,&nbsp;<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
					?></a></li>
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
									<img src="../img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- ACCOUNT -->
						<div >
							<div class="header-ctn">
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
											}

											$sql = "SELECT * FROM cart_item"; 
											$result = $conn->query($sql);
											$selected_item = 0;
											$subtotal = 0;
											$cart_products = array(); // Associative array to store products by ID

											// Step 2: Loop through cart items
											if ($result->num_rows > 0) {
												while($row = $result->fetch_assoc()) {
													$sql1 = "SELECT * FROM product WHERE product_id=".$row["product_id"]; 
													$result1 = $conn->query($sql1);
													$row1 = $result1->fetch_assoc();

													$product_id = $row['product_id'];
													$quantity = $row['quantity'];
													$price = $row1['price'];

													// Check if product already exists in cart
													if (array_key_exists($product_id, $cart_products)) {
														// Update quantity and subtotal
														$cart_products[$product_id]['quantity'] += $quantity;
														$subtotal += $quantity * $price;
													} else {
														// Add new product entry
														$cart_products[$product_id] = array(
															'quantity' => $quantity,
															'price' => $price,
															'product_name' => $row1['product_name'], // Store product name
															'image_url' => $row1['image_url'] // Store image URL
														);
														$subtotal += $quantity * $price;
														$selected_item++; // Increment total selected items
													}
												}
											}

											// Step 3: Display cart products
											echo "<div class='dropdown'>";
											echo "<a class='dropdown-toggle' data-toggle='dropdown' aria-expanded='true'>";
											echo "<i class='fa fa-shopping-cart'></i>";
											echo "<span>Your Cart</span>";
											echo "<div class='qty'>".$selected_item."</div>";
											echo "</a>";
											echo "<div class='cart-dropdown'>";
											echo "<div class='cart-list'>";

											foreach ($cart_products as $product_id => $product) {
												echo "<div class='product-widget'>";
												echo "<div class='product-img'>";
												echo "<img src='./img/" . $product["image_url"] . "' alt=''>";
												echo "</div>";
												echo "<div class='product-body'>";
												echo "<h3 class='product-name'><a href='#'>" . $product["product_name"] . "</a></h3>";
												echo "<h4 class='product-price'><span class='qty'>" . $product['quantity'] . "x</span>$" . $product['price'] . "</h4>";
												echo "</div>";
												echo "<button class='delete' data-product-id='" . $product_id . "'><i class='fa fa-close'></i></button>";
												echo "</div>";
											}

											echo "</div>"; // Close cart-list
											echo "<div class='cart-summary'>";
											echo "<small>".$selected_item." Item(s) selected</small>";
											echo "<h5>SUBTOTAL: $".$subtotal."</h5>";
											echo "</div>"; // Close cart-summary
											echo "<div class='cart-btns'>";
											echo "<a href='#'>View Cart</a>";
											echo "<a href='#'>Checkout  <i class='fa fa-arrow-circle-right'></i></a>";
											echo "</div>"; // Close cart-btns
											echo "</div>"; // Close cart-dropdown
											echo "</div>"; // Close dropdown

											$conn->close();
										?>


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
						<li><a href="../store.php">Home</a></li>
					</ul>
					<!-- /NAV -->
				</div>
			</div>
		</nav>
		<!-- /NAVIGATION -->

    <!-- SECTION -->

    <div class="clearfix visible-sm visible-xs"></div>

    <!-- Account detail start here -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">

                        <!-- /Account detail put here -->
                        <h1>Your Account</h1>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="loginMsg"></div>
                                        <form method="post" class="updateAccount">
                                            <input type="hidden" name="action" value="updateAccount">
                                            <?php
                                            $username = isset ($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
                                            ?>

                                            <label for="username"><Span>Username: </Span>&nbsp;</label>
                                            <?php echo $username; ?>

                                            <br><br><br>
                                            <h4>Personal Information:</h4> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="fname">Name</label>
                                                    <input type="text" id="fname" name="fname" class="form-control"
                                                        value="<?php echo $fname; ?>">

                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4">

                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" id="phone" name="phone" class="form-control"
                                                        value="<?php echo $phone; ?>">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="email">Email Address</label>
                                                    <input type="text" id="email" name="email" class="form-control"
                                                        value="<?php echo $email; ?>">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="address">Street Address</label>
                                                    <input type="text" id="address" name="address" class="form-control"
                                                        value="<?php echo $address; ?>">
                                                </div>
                                            </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="city">City</label>
                                                        <input type="text" id="city" name="city" class="form-control"
                                                            value="<?php echo $city; ?>">

                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="zip">Zip Code</label>
                                                        <input type="text" id="zip" name="zip" class="form-control"
                                                            value="<?php echo $zip; ?>">

                                                    </div>
                                                </div>
                                                <br>
                                                <p><button class="btn btn-lg btn-success">Update Account</button></p>
                                                <div class="status">
                                                    <?php echo $status; ?>
                                                </div>
                                        </form>
                                    </div>
                                </div>
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