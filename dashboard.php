<?php

  include "php/connection.php";
  session_start();
  
  if (empty($_SESSION['usr'])){
    header("Location: index.php");
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
          <a class="nav-item nav-link active" href="#">Musics <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Artists</a>
          <a class="nav-item nav-link" href="#">Albums</a>
          <form action="php/login/logout.php" method="POST">
            <input class="btn btn-light my-2 my-sm-0" type="submit" value="Log Out">
          </form>
          
        </div>
      </div>
    </nav>
    <div class="cardSobre m-lg-3">
      <div class="text-center">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Artist</th>
              <th scope="col">Music name</th>
              <th scope="col">Song</th>

            </tr>
          </thead>
            <tbody>
              <tr>
                <th scope="row">João Mandioca</th>
                <td value="#">Viva La Mandioca </td>
                <td><audio controls><source src="php/files/Jon Gomm - Passionflower.mp3" type="audio/mpeg"></audio></td>
              </tr>
              <tr>
                <th scope="row">João Mandioca</th>
                <td value="#">Viva La Mandioca </td>
                <td><audio controls><source src="php/files/Quebra-Mar - Acústico Mtv - Charlie Brown Jr..mp3" type="audio/mpeg"></audio></td>
              </tr>              
            </tbody>
        </table>
        <form action="php/upload.php" method="POST" enctype="multipart/form-data">
          <input type="file" href="areaAdm.php" role="button" aria-disabled="true" name="file">
          <input type="submit" value="Send" name="send_file">
        </form>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

  <?php    

    if (isset($_SESSION['alert'])){
      echo $_SESSION['alert'];
      session_unset($_SESSION['alert']);
    }

  ?>
  
</html>