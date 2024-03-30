<?php 
require("../database.php");

$staff_id = $_GET['staff_id'];
$query = "DELETE FROM staff WHERE staff_id = '$staff_id'";
$result = mysqli_query($con, $query) or die(mysqli_error($con));
header("Location: view_staff.php");
exit();
?>
