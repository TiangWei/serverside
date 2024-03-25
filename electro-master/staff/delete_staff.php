<?php 
require("../config.php");

$staff_id = $_GET['staff_id'];
$query = "DELETE FROM staff WHERE staff_id = '$staff_id'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
header("Location: view_staff.php");
exit();
?>
