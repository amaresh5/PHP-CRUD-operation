
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
    <title>Student details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            background-color: #17a2b8;
        }

        h1 {
            line-height: 0.8;
        }
    </style>

</head>

<body>
<?php require 'partials/_nav.php' ?>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT firstname, middlename, lastname,course,gender,phone,address,email,marks,marks12 FROM application ORDER BY slno DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo "<br><h1 class='d-flex justify-content-center '>Students Details</h1><br>";
            echo "<br> <h1>Name: " . $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] . "  <br><h1>";
            echo "<br> <h1>Course: " . $row["course"] . " <br><h1>";
            echo "<br> <h1>Gender: " . $row["gender"] . " <br><h1>";
            echo "<br> <h1>Phone : " . $row["phone"] . " <br><h1>";
            echo "<br> <h1>Address: " . $row["address"] . " <br><h1>";
            echo "<br> <h1>Email: " . $row["email"] . " <br><h1>";
            echo "<br> <h1>10th Marks: " . $row["marks"] . " <br><h1>";
            echo "<br> <h1>12th Marks: " . $row["marks12"] . " <br><h1>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <div class="d-flex justify-content-center ">
        <a href="./applyform.php">
            <button type="button" class="btn btn-danger">Update</button>
        </a>

        <a href="./home.php">

            <button type="button" class="btn btn-success">Save</button>
            <a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>