<?php

@include '../database.php';

if(isset($_POST['submit'])){

   $status = "";

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['c_password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($con, $insert);
         echo "<script>alert('user registered successfully!'); window.location.href = 'login_form.php';</script>";
      
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style1.css">

   <style>
      body {
         background-image: url('../img/register_bg.jpg');
         background-size: cover;
         background-position: center;
         height: 100vh; /* Ensure full viewport height */
         margin: 0; /* Remove default margin */
         display: flex;
         justify-content: center;
      }

   </style>

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="c_password" required placeholder="confirm your password">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login_form.php">login now</a></p>

   </form>

</div>

</body>
</html>