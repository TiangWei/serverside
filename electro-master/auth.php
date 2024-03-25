<?php
// Start new session
session_start();

// If username is not set will redirect to login page
if(!isset($_SESSION["user_name"])){
header("Location: login_form.php");
exit(); }
?>
