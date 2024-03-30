<?php

require_once ("header.php");

require ("../database.php");
?>

<?php
$name = $email = $password = $createdOn = $dob = "";
$passErr = $emailErr = $nameErr = $dobErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $createdOn = date('Y-m-d H:i:s');

    if (empty ($_REQUEST["name"])) {
        $nameErr = "<p style='color:red'> * Name is required</p>";
    } else {
        $name = $_REQUEST["name"];
    }

    if (empty ($_REQUEST["email"])) {
        $emailErr = "<p style='color:red'> * Email is required</p> ";
    } else {
        $email = $_REQUEST["email"];
    }

    if (empty ($_REQUEST["dob"])) {
        $dobErr = "<p style='color:red'> * Date of Birth is required</p> ";
    } else {
        $dob = $_REQUEST["dob"];
    }

    if (empty ($_REQUEST["password"])) {
        $passErr = "<p style='color:red'> * Password is required</p> ";
    } else {
        $password = $_REQUEST["password"];

    }

    if (!empty ($name) && !empty ($email) && !empty ($password) && !empty ($dob)) {
        $sel_query = "SELECT email FROM staff WHERE email = '$email'";
        $result = mysqli_query($con, $sel_query) or die (mysqli_error($con));

        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0) {
            $emailErr = "<p style='color:red'> * Email already exists</p>";
        } else {

            $query = "INSERT into staff (name, email, password, dob, createdOn) VALUES ('$name', '$email', '".md5($password)."', '$dob', '$createdOn')";
            $result = mysqli_query($con, $query) or die (mysqli_error($con));
            echo "<p style='color:green; font-size: 20px;'>Staff account created successfully!</p>";

            if ($result) {
                
                echo "<script>alert('Staff account created successfully!');</script>";
                $addMore = "<script>if(confirm('Do you want to add more staff?')){window.location.href='add_staff.php';}</script>";
                echo $addMore;
                $name = $email = $dob = $password = "";
            } else {
                echo "<script>alert('Failed to create staff account!');</script>";
            }
        }
    }
}
?>


<div class="login-form-bg h-100">
    <div class="container mt-5 h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5 shadow">
                            <h1 class="text-center">Add New Admin</h1>
                            <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                                <div class="form-group">
                                    <label>Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
                                    <?php echo $nameErr; ?>
                                </div>


                                <div class="form-group">
                                    <label>Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
                                    <?php echo $emailErr; ?>
                                </div>

                                <div class="form-group">
                                    <label>Password: </label>
                                    <input type="password" class="form-control" value="<?php echo $password; ?>"
                                        name="password">
                                    <?php echo $passErr; ?>
                                </div>

                                <div class="form-group">
                                    <label>Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob">
                                    <?php echo $dobErr; ?>

                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary btn-block">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>