<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // include 'partials/_db_connect.php';
  // $name = $_POST["search"];
  // $search_sql = "SELECT * FROM application WHERE firstname LIKE '%{$name}%' OR lastname LIKE '%{$name}%'";
  // $search = mysqli_query($conn, $search_sql);
  // if ($search->num_rows > 0){
  //   echo "ok ok";
  // }else{
  //   echo "no data found";
  // }

// }

// include 'partials/_db_connect.php';
// if (isset($_POST['search'])) {
//   $str = mysqli_real_escape_string($conn, $_POST['str']);
//   $search_sql = "SELECT firstname FROM application WHERE firstname LIKE '%$str%'";
//   $search = mysqli_query($conn, $search_sql);
//   if (mysqli_num_rows($search) > 0) {
//     }  else {
//     echo "No data found";
//   }
// }
 ?>





<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
?>

<?php
include 'partials/_db_connect.php';
$no_of_records_per_page = 3;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
  $start = $_GET['start'];
  $current_page = $start;
  $start--;
  $start = $start * $no_of_records_per_page;
}
$total_pages_sql = "SELECT COUNT(*) FROM application";
$result = mysqli_query($conn, $total_pages_sql);

$total_rows = mysqli_fetch_array($result)[0];

$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM application LIMIT $start, $no_of_records_per_page";
$res_data = mysqli_query($conn, $sql);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Applications</title>


</head>

<body>

  <?php require 'partials/_nav.php' ?>


  <div class="container-fluid m-3">
    <table class="table table-striped table-dark my-5">
      <thead>
        <tr>
          <th scope="col">Serial no.</th>
          <th scope="col">Name</th>
          <th scope="col">Course</th>
          <th scope="col">Mobile no.</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = $res_data->fetch_assoc()) {
        ?>

          <tr>
            <td><?php echo "" . $row["slno"] . ""; ?></td>
            <td><?php echo "" . $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] . ""; ?></td>
            <td><?php echo "" . $row["course"] . ""; ?></td>
            <td><?php echo "" . $row["phone"] . ""; ?></td>
            <td><?php echo "" . $row["email"] . ""; ?></td>
            <td><a href="delete.php?id=<?php echo $row['slno']; ?>">
                <font color="#FF0000">DELETE</font>
              </a></td>

          </tr>

        <?php } ?>

      </tbody>
    </table>

  </div>


  <div class="d-flex justify-content-center ">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) {
          $class = "";
          if ($current_page == $i) {
            $class = "active";
          }

        ?>
          <li class="page-item <?php echo $class ?>"><a class="page-link" href="?start=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php } ?>
      </ul>
    </nav>
  </div>



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>