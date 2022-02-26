
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
    $loggedin = false;
  }
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a style="color:white" class="navbar-brand" href="#">College</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a style="color:white" class="nav-link active" aria-current="page" href="/phpproject/home.php">Home <span class="sr-only">(current)</span></a>
          </li>';
          if(!$loggedin){
         echo '<li class="nav-item">
            <a style="color:white" class="nav-link" href="/phpproject/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a style="color:white" class="nav-link" href="/phpproject/register.php">Signup</a>
          </li>
        </ul>';
          }
        if($loggedin){
            echo '<li class="nav-item">
              <a style="color:white" class="nav-link" href="/phpproject/logout.php">Logout</a>
            </li>';
            echo '<li class="nav-item">
              <a style="color:white" class="nav-link" href="/phpproject/addcourse.php">AddCourse</a>
            </li>';    
        }
        echo '<form style="margin-left: 916px;"class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>';
        
  ?>