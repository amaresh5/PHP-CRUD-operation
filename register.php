<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/_db_connect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];


  //Check whether this user name exists
  $existSql = "SELECT * FROM `registration` WHERE username = '$username'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    $showError = "Username Already Exists";
  } else {
    if (($password == $cpassword)) {
      $hash= password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `registration` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp());
        ";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $showAlert = true;
      }
    } else {
      $showError = "Passwords do not match";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #76eb72;
      height: 100vh;
    }

    #login .container #login-row #login-column #login-box{
      margin-top: 120px;
      max-width: 600px;
      height: 380px;
      border: 1px solid #9C9C9C;
      background-color: #EAEAEA;
    }

    #login .container #login-row #login-column #login-box #login-form {
      padding: 20px;
    }

    #login .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }
  </style>

</head>

<body>
<?php require 'partials/_nav.php' ?>
  
  <?php

  if($showAlert){
  echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is now created and you can login
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
  </div> ';
  }
  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  }
  ?>

  <div id="login">
    <h3 class="text-center text-white pt-5">New user SignUp form</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <h3 class="text-center text-info">Register</h3>
            <form action="./register.php" method="post">
              <div class="form-group">
                <label for="username" class="text-info">Username:</label><br>
                <input type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password" class="text-info">Password:</label><br>
                <input type="text" name="password" id="password" class="form-control">
              </div>
              <div class="form-group">
                <label for="cpassword" class="text-info">Confirm Password:</label><br>
                <input type="text" name="cpassword" id="cpassword" class="form-control">
              </div>

              <div class="form-group">
                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
              </div>
            </form>
            <h3>Already have an account</h3>
               <button class="btn btn-info"><a style="color:white" href="/phpproject/login.php">Login</a>
                </button>
          </div>
        </div>
      </div>
    </div>
  </div>


</html>

</body>

</html>