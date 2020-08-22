<?php

  session_start();

  if(isset($_SESSION['alert'])){
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
  }

  if (!isset($_SESSION['usr'])){
      //header("Location: ../../index.php");
      echo $_SESSION['usr'];
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>Music Collection - DashBoard</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Music Collection</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="music.php">Musics</a>
                    <a class="nav-item nav-link" href="artist.php">Artists</a>
                    <a class="nav-item nav-link" href="album.php">Albums <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="edit.php">Edit</a>       
                </div>  
            </div>

            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                        <img class= "img-thumbnail rounded float-left" src="../usr/<?php echo $usr;?>/img/img_profile.jpg" style="max-width: 19% !important; padding: 0.10rem !important; margin-left: 5px !important;"/> <h6 class="dropdown-header " style="padding: 0rem !important; margin-left: 3rem !important;"> Singed with <br><strong><?php echo $usr;?></strong></h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../usr/<?php echo $usr;?>/profile.php">Profile</a>
                        <a class="dropdown-item" href="#">Change password</a>
                        <div class="dropdown-divider"></div>
                        <form action="../Model/logout.php" method="POST">
                            <input class="dropdown-item" type="submit" value="Log Out">
                        </form> 
                    </div>
                </div>
            </div>
        </nav>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
  </html>