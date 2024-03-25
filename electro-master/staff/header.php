<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->


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
		.submenu {
			display: none;
			/* Hide submenu by default */
			position: absolute;
			top: 100%;
			/* Position the submenu below the parent item */
			left: 0;
			background-color: #fff;
			/* Background color */
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			/* Add shadow */
			z-index: 1;
			/* Ensure it appears above other elements */
		}

		.submenu li {
			padding: 10px;
			/* Add padding to submenu items */
		}

		.submenu li a {
			display: block;
			/* Make submenu items block-level for better spacing */
			color: #333;
			/* Text color */
			text-decoration: none;
			/* Remove underline from links */
		}

		.submenu li a:hover {
			background-color: #f4f4f4;
			/* Background color on hover */
		}

		/* Show submenu when hovering or clicking on the parent item */
		.submenu-toggle:hover+.submenu,
		.submenu-toggle:focus+.submenu {
			display: block;
		}
	</style>

</head>

<body>
	<!-- HEADER -->
	<header>


		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<h1 style="color:white;">Welcome. Staff</h1>
						</div>
					</div>
					<!-- /LOGO -->


					<div class="col-md-6"></div>


					<!-- ACCOUNT -->
					<div class="col-md-3 clearfix">
						<div class="header-ctn">
							<!-- Staff -->
							<div>
								<a href="#">
									<i class="fa fa-heart-o"></i>
									<span>You're Staff</span>

								</a>
							</div>
							<!-- /Staff -->

							<!-- Log Out -->
							<div class="dropdown">
								<a href="logout.php" class="dropdown-toggle" data-toggle="dropdown"
									aria-expanded="true">
									<i class="fa fa-sign-out"></i>
									<span>Log Out</span>

								</a>

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
			<?php
			$currentpage = basename($_SERVER["PHP_SELF"]);
			?>

			<div id="responsive-nav">
				<!-- NAV -->
				<ul class="main-nav nav navbar-nav">
					<<li <?php if ($currentpage == 'manage_product.php')
						echo 'class="active"'; ?>>
						<a href="#">Manage Products</a>
						<ul class="submenu">
							<li><a href="viewproduct.php">Product Management</a></li>
							<li><a href="upload.php">Add Product</a></li>
							<li><a href="store.php">Modify Product</a></li>
						</ul>
						</li>
						<li <?php if ($currentpage == 'add_staff.php')
							echo 'class="active"'; ?>>
							<a href="add_staff.php">Add Staff</a>
						</li>
						<li <?php if ($currentpage == 'view_staff.php')
							echo 'class="active"'; ?>>
							<a href="view_staff.php">Manage Staffs</a>
						</li>
				</ul>




				</ul>
				<!-- /NAV -->
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">

					<!-- jQuery Plugins -->
					<script src="js/jquery.min.js"></script>
					<script src="js/bootstrap.min.js"></script>
					<script src="js/slick.min.js"></script>
					<script src="js/nouislider.min.js"></script>
					<script src="js/jquery.zoom.min.js"></script>
					<script src="js/main.js"></script>

</body>

</html>