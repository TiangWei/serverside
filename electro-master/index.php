<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <!-- <link href="resorce/css/style.css" rel="stylesheet"> -->

  <title>Choose to login</title>
  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .bg {
      background-image: url('img/index_bg.jpg');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      align-items: center;
      display: flex;
      justify-content: center;

    }

    .form-fill {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 50px;
      size: 30px;
      justify-content: center;
      text-align: center;
      padding: 100px;
      box-shadow: 10px 40px 10px rgba(0, 0, 0, .1);
      width: 600px;
      height: 400px;

    }
  </style>
</head>

<body>


  <div class="bg">
    <div class="form-fill">
      <h1 class="text-center pb-4">Welcome to Gadget-Online Orders</h1>
      <h6 class="text-center pb-4">Please sign-in below to continue</h6>

      <div class="container mt-4">

        <div class="btn-toolbar justify-content-between">
          <div class="btn-group">
            <a href="user/login_form.php" class="btn btn-primary btn-lg">Log-in as user </a>
          </div>

          <div class="btn-group">

            <a href="staff/login_form.php" class="btn btn-primary btn-lg">Log-In as staff</a>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>