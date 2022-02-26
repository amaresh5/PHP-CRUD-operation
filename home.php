<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>
<?php require 'partials/_nav.php' ?>

  <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?></h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as <?php echo $_SESSION['username']?>. Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/phpproject/logout.php"> using this link.</a></p>
    </div>
  </div>


  <section id="table">
<div class="container">
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">Sl No.</th>
      <th scope="col">College Name</th>
      <th scope="col">Location</th>
      <th scope="col">Apply</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>College Name</td>
      <td>Bhubaneswar</td>
      <td> <form action="./applyform.php">
  <button class="btn btn-primary" type="submit">Apply</button>
  </form>
</td>
    </tr>
  </tbody>
</table>
</div>
     
  </section>


  <?php

if($loggedin){


  echo '<div class="d-flex justify-content-center"><button type="button" class="btn btn-primary btn-lg"><a style="color:black" class="nav-link" href="/phpproject/showapplications.php">All Applications</a></button></div>';
 
}
  ?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>