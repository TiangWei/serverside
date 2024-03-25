<?php

include ("../auth.php");
require ("../config.php");

$staff_id = $_REQUEST['staff_id'];
$query = "SELECT * FROM staff WHERE staff_id='$staff_id'";
$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
$row = mysqli_fetch_array($result);

$status = "";
if (isset ($_POST['submit'])) {
    // Retrieve form data
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $dob = $_REQUEST['dob'];
    $createdOn = date("Y-m-d H:i:s");

    // Update the staff record in the database
    $updateQuery = "UPDATE staff SET name='$name', email='$email', dob='$dob', createdOn='$createdOn' WHERE staff_id='$staff_id'";
    $result = mysqli_query($conn, $updateQuery) or die (mysqli_error($conn));

    // Retrieve the updated record
    $updatedQuery = "SELECT * FROM staff WHERE staff_id='$staff_id'";
    $updatedResult = mysqli_query($conn, $updatedQuery) or die (mysqli_error($conn));
    $row = mysqli_fetch_array($updatedResult);

    // Set the status message
    $status = "Staff details updated successfully!
    <br></br>
    <a href='view_staff.php'>View Updated Record</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Staff Detail</title>
    <link rel="stylesheet" href="../css/style1.css">

    <style>
        .form-update {
            background-color: gray;
        }

        .status-message {
            color: #008000;
            text-align: center;

        }
    </style>
</head>

<body>

    <div class="form-update">
        <form name="form" method="post" action="">
            <h3>Edit Staff Detail</h3>

            <label>Staff Name: </label>
            <input type="text" name="name" placeholder="Enter Staff Name" required value="<?php echo $row['name']; ?>">
            <label>Staff Email: </label>
            <input type="email" name="email" placeholder="Enter Staff Email" required
                value="<?php echo $row['email']; ?>">
            <label>Staff DOB: </label>
            <input type="date" name="dob" placeholder="Enter Staff DOB" required value="<?php echo $row['dob']; ?>">
            <input type="submit" name="submit" value="Update" class="form-btn">


            <!-- show status message-->
            <div class="status-message">
                <?php if (!empty ($status)) { ?>
                    <div class="status-message">
                        <br>
                        <?php echo $status; ?>
                    </div>
                <?php } ?>

            </div>
        </form>




    </div>
</body>

</html>