<?php
session_start();

require ("../config.php");
?>

<?php
if (isset ($_POST['submit'])) {

   $email = strip_tags($_REQUEST['email']);
   $email = mysqli_real_escape_string($conn, $email);
   $pass = $_REQUEST['password'];
   $pass = mysqli_real_escape_string($conn, $pass);


   $select = " SELECT * FROM staff WHERE email = '$email' && password = '".md5($pass)."' ";

   $result = mysqli_query($conn, $select) or die (mysqli_error($conn));

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);
      $email = $row["email"];
      $_SESSION['user_name'] = $row['name'];
      header('location:viewproduct.php'); // Redirect to admin_page.php
   } else {
      $error[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Staff login form</title>

   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>login form</title>
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
</head>

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Staff login</h3>
         <?php
         if (isset ($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            }
            ;
         }
         ;
         ?>
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>not a staff? <a href="../user/login_form.php">Login here as user now</a></p>
      </form>

   </div>

</body>

</html>