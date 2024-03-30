<?php


    require_once "header.php";

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>

   <!--staff management-->
   
   <div class="content">
      <h3>Staff Management</h3>
      <h3>Username: <span><?php echo $_SESSION['admin_name'] ?></span></h3>
      <p>this is an admin page</p>
   </div>
   <?php
      if(isset($_POST['create_staff'])){
         // Get form data
         $username = $_POST['username'];
         $password = $_POST['password'];
         $access = isset($_POST['staff_management_access']) ? 1 : 0;

         // Create staff account
         // Your code to create staff account goes here

         // Display success message
         echo "Staff account created successfully!";
      }
   ?>
<!-- <style>
      .col {
         display: flex;
         flex-direction: column;
         margin-bottom: 10px;
      }

      label {
         margin-bottom: 5px;
      }

      input[type="text"],
      input[type="password"] {
         padding: 5px;
         border: 1px solid #ccc;
         border-radius: 3px;
      }

      button[type="submit"] {
         padding: 5px 10px;
         background-color: #4CAF50;
         color: white;
         border: none;
         border-radius: 3px;
         cursor: pointer;
      } -->
<br><br>
<div class="form">
   <form method="POST" action="" name="createStaff">
      <h4>Create Staff Account</h4>
      <div class="col md-5">
         <label for="username">Username:</label>
         <input type="text" name="username" id="username" required>
      </div>

      <div class="col md-5">
         <label for="password">Password:</label>
         <input type="password" name="password" id="password" required>
      </div>

      <div class="col md-5">
         <label for="staff_management_access">Staff Management Access:</label>
         <input type="checkbox" name="staff_management_access" id="staff_management_access">
      </div>

      <button type="submit" name="create_staff">Create Account</button>
   </form>
   </div>


   <div class="content">
      <a href="login_form.php" class="btn">Login |</a>
      <a href="register_form.php" class="btn">Register |</a>
      <a href="testadmin.php" class="btn">Staff Management page |</a>
      <a href="logout.php" class="btn">Logout</a>
   </div>



</body>
</html>