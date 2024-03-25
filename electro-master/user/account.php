<?php
require('../config.php');
include('../auth.php');

$status = '';

if (isset($_POST['action']) && $_POST['action'] == "updateAccount") {
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
if (isset($_SESSION['user_name'])) {
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
            <div class="col-md-7 text-end"> <button class="btn btn-lg" onclick ="location.href='logout.php'">Logout</button></div>
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
                            $username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';
                            ?>

                            <label for="username"><Span>Username:  </Span>&nbsp;</label> <?php echo $username; ?>


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
                            <div class="status"><?php echo $status; ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footer-placeholder"></div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/init.js"></script>

</html>
