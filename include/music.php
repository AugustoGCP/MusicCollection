<?php

  include "../php/connection.php";
  session_cache_expire(30);
  session_start();
  
  if (empty($_SESSION['usr'])){
    header("Location: ../index.php");
  }

  $usr = $_SESSION['usr'];

  $sql = "select * from tb_users where usr = '$usr'";
  $result = mysqli_query($conn, $sql);
  $data = $result->fetch_array();

  $cod_usr = $data['cod_usr'];


  $sql = "select * from tb_users inner join tb_musics on tb_musics.usr_msc = tb_users.cod_usr 

          inner join tb_artists on tb_musics.artist_msc = tb_artists.cod_artist

          where tb_users.usr = '$usr' and tb_musics.deactive = 1 and tb_artists.usr = $cod_usr order BY tb_artists.artist ASC";

  $result = mysqli_query($conn, $sql);    
    
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
          <a class="nav-item nav-link" href="artist.php">Artists</a>
          <a class="nav-item nav-link" href="album.php">Albums</a>
          <a class="nav-item nav-link" href="edit.php">Edit</a>          
        </div>

        <div class="container">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
                </button>
                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Change password</a>
                    <div class="dropdown-divider"></div>
                    <form action="../php/login/logout.php" method="POST">
                        <input class="dropdown-item" type="submit" value="Log Out">
                    </form> 
                </div>
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
            <?php
             
            //  $cod = 1;

             while( $data = $result->fetch_array() ){
               
            ?>
              <tr>
                <th scope="row"><?php echo $data['artist'];?></th>
                <td value="#"><?php echo $data['music'];?></td>
                <!-- <td><?php echo $data['']?></td> -->
                <td><audio controls><source src="<?php echo $data['path'];?>" type="audio/mpeg"></audio></td>
              </tr>   
            <?php 
              }
            ?>          
            </tbody>
        </table>
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
      session_unset();
    }

  ?>
  
</html>