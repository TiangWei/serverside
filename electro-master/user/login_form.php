<!-- Session handling -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style1.css">

   <style>
      body {
         background-image: url('../img/userlogin_bg.jpg');
         background-size: cover;
         background-position: center;
         height: 100vh;
         /* Ensure full viewport height */
         margin: 0;
         /* Remove default margin */
         display: flex;

      }

      .form-container {
         background-color: rgba(255, 255, 255, 0.5);
         /* Add opacity to create a translucent background */
         padding: 70px;
         border-radius: 50px;
      }

   </style>
</head>

<body>
   <?php
   //Need db file
   require ('../database.php');

   // Check if login form submitted
   if (isset($_POST['email'])) {
      // Sanitize user input
      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($con, $email);
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con, $password);

      // Retrieve users from DB 
      $query = "SELECT * 
              FROM `user` 
              WHERE email='$email'
              AND password='" . md5($password) . "'"
      ;
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $rows = mysqli_num_rows($result);
      // If user found, set session and redirect 
      if ($rows == 1) {
         $user = mysqli_fetch_assoc($result);
         $_SESSION['user_name'] = $user['name'];

         header("Location: ../store.php");
         exit();
      } else {
         $error[] = 'incorrect email or password!';
      }
   }
   ?>


   <!-- Form handling -->
   <div class="form-container">

      <!-- User Login Form -->
      <form action="" method="post" name="login">
         <h3>User Log In</h3>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         } ?>

         <input type="text" name="email" placeholder="Email" required /><br>
         <input type="password" name="password" placeholder="Password" required /><br>
         <input name="submit" type="submit" value="Login" class="form-btn" />
         <p>Not registered yet? <a href='register_form.php'>Register Here</a></p>
         Staff? <a href='../staff/login_form.php'>Login as staff here</a>
      </form>
   </div>

   <!-- End of form handling -->

</body>



</html>