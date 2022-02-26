<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

// if (isset($_POST["submit"])) {
//   header("location:showdata.php");
//   exit;
// }
?>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/_db_connect.php';
  $firstname = $_POST["firstname"];
  $middlename = $_POST["middlename"];
  $lastname = $_POST["lastname"];
  $course = $_POST["course"];
  $gender = $_POST["gender"];
  $phone = $_POST["phone"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $marks = $_POST["marks"];
  $marks12 = $_POST["marks12"];

  $sql = "INSERT INTO `application` (`firstname`, `middlename`, `lastname`, `course`, `gender`, `phone`, `address`, `email`, `marks`, `marks12`) VALUES ('$firstname', '$middlename', '$lastname', '$course', '$gender', '$phone', '$address', ' $email', '$marks', '$marks12')";
  $result = mysqli_query($conn, $sql);
  header("location:showdata.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration Form</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


  <style>
    body {
      font-family: Calibri, Helvetica, sans-serif;
      background-color: pink;
    }

    .container {
      padding: 50px;
      background-color: lightblue;
    }

    input[type=text],
    input[type=password],
    textarea {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
      background-color: orange;
      outline: none;
    }

    div {
      padding: 10px 0;
    }

    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    .registerbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .registerbtn:hover {
      opacity: 1;
    }
  </style>


</head>

<body>
  <?php require 'partials/_nav.php' ?>

  <div class="container">
    <center>
      <h1> Student Registeration Form</h1>
    </center>
    <hr>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <label> Firstname </label>
      <input type="text" name="firstname" placeholder="Firstname" size="15" required />
      <label> Middlename: </label>
      <input type="text" name="middlename" placeholder="Middlename" size="15" required />
      <label> Lastname: </label>
      <input type="text" name="lastname" placeholder="Lastname" size="15" required />
      <div>
        <label>
          Course :
        </label>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "users";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT course FROM course ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row

          echo '<select name="course">';
          while ($row = $result->fetch_assoc()) {
            echo '<option>' . $row['course'] . '</option>';
          }
          echo '</select>';
        } else {
          echo "0 results";
        }

        $conn->close();
        ?>
      </div>
      <div>
        <label>
          Gender :
        </label><br>
        <input type="radio" value="Male" name="gender"> Male
        <input type="radio" value="Female" name="gender"> Female
        <input type="radio" value="Other" name="gender"> Other

      </div>
      <label>
        Phone :
      </label>
      <input type="text" name="country code" placeholder="Country Code" value="+91" size="2" />
      <input type="text" name="phone" placeholder="phone no." size="10" / required>
      <label>
        Current Address :
      </label>
      <input type="text" placeholder="Enter Address" name="address" required>
      </textarea>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>10th Marks</b></label>
      <input type="text" placeholder="Enter Marks" name="marks" required>

      <label for="psw-repeat"><b>12th Marks</b></label>
      <input type="text" placeholder="Enter Marks" name="marks12" required>

      <button name="submit" class="registerbtn">Register</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>