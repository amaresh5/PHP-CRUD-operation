 <?php
include 'partials/_db_connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Search"];
    $search_sql = "SELECT * FROM application WHERE firstname LIKE '%{$name}%' OR lastname LIKE '%{$name}%'";
    $search_data = mysqli_query($conn, $search_sql);

    if (mysqli_num_rows($search_data)) {

        while ($row = mysqli_fetch_assoc($search_data)) {

            echo  '<a href="#">  ' . $row['firstname'] . '</a>';
        }
    } else {
        echo  "Result Not Found";
    }
}

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>

    <div class="d-flex justify-content-center my-3">
        <form class="d-flex" action="searchdb.php" method="post">
            <input id="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
            <button id="btnsearch" name="Search" class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>



    <div class=container id="dbcontent">

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="./search.js"></script>
</body>

</html> 




