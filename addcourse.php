<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}


?>


<?php

$showAlert = false;
$showError = false;
$courseErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/_db_connect.php';

    if (empty($_POST["course"])) {
      $courseErr = "Course is required";
    } else {
      $course =$_POST["course"];
      $existSql = "SELECT * FROM `course` WHERE course = '$course'";
      $result = mysqli_query($conn, $existSql);
      $numExistRows = mysqli_num_rows($result);
      if ($numExistRows > 0) {
        $showError = "Course Already Exists";
      } else {
          $sql = "INSERT INTO `course` (`course`) VALUES ('$course')";
          $result = mysqli_query($conn, $sql);
          $showAlert = true;
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
    <title>Add Course</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php require 'partials/_nav.php' ?>


<?php

if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Course added successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }

if ($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
  }
  ?>

   <div>

   <h1 class='d-flex justify-content-center my-5'>Add Course</h1>
   </div>


    <div class="container">
    <form action="addcourse.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Add Course</label>
            <input type="text" name="course" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add course">
            <span class="error"> <?php echo $courseErr;?> </span>

        </div>    
        <button type="submit" name="submit" value="submit" class="btn btn-primary">ADD</button>
    </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>