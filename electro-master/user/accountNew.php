<?php
require ('../config.php');
include ('../auth.php');
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
                    <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
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
                    <div>
                        <div class="header-ctn">
                            <!-- Cart -->
                            <select id="productOptions">
                                <option value="management" selected>Product Management</option>
                                <option value="add">Add Product</option>
                                <option value="modify">Modify Product</option>
                            </select>
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
                                        <a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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
                    <li><a href="store.php">Home</a></li>
                    <li><a href="laptop.php">Laptops</a></li>
                    <li><a href="smartphone.php">Smartphones</a></li>
                    <li><a href="camera.php">Cameras</a></li>
                    <li class="active"><a href="acc.php">Accessories</a></li>
                </ul>
                <!-- /NAV -->
            </div>
        </div>
    </nav>
    <!-- /NAVIGATION -->





    <?php
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
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sample Shopping Cart | The Dev Drawer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/style.min.css" rel="stylesheet">
    </head>

    <body class="auth">
        <div id="nav-placeholder"></div>
        <div class="container-fluid userAccount">
            <div class="background-image">
                <img src="../landscape.jpg" class="img-fluid">
            </div>
            <br>
            <br>
            <div class="row">
                <div class="breadcrumb"><a href="/">Home</a><span class="sep">></span>Your Account
                    <div class="col-md-7 text-end"> <button class="btn btn-lg"
                            onclick="location.href='logout.php'">Logout</button></div>
                </div>
            </div>

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


                                <h3>Personal Information</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname">Name</label>
                                        <input type="text" id="fname" name="fname" class="form-control"
                                            value="<?php echo $fname; ?>">

                                    </div>
                                </div>


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

                                <label for="address">Street Address</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="<?php echo $address; ?>">

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
        <div id="footer-placeholder"></div>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="js/init.js"></script>

    </body>



    </html>