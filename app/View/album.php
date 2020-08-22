<?php

    include "../Controller/Connection.php"; 

    session_cache_expire(30);
    session_start();

    if (empty($_SESSION['usr'])){
        header("Location: ../index.php");
    }

    if (isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }

    // $usr = $_SESSION['usr'];
    // $sql = "select * from tb_users where usr = '$usr'";
    // $result = mysqli_query($conn, $sql);
    // $data = $result->fetch_array();

    // $cod_usr = $data['cod_usr'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Music Collection - Artists</title>
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
                    <a class="nav-item nav-link active" href="#">Albums <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="edit.php">Edit</a>       
                </div> 
            </div>

            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </button>
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                        <img class= "img-thumbnail rounded float-left" src="../usr/<?php //echo $usr;?>/img/img_profile.jpg" style="max-width: 19% !important; padding: 0.10rem !important; margin-left: 5px !important;"/> <h6 class="dropdown-header " style="padding: 0rem !important; margin-left: 3rem !important;"> Singed with <br><strong><?php //echo $usr;?></strong></h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../usr/<?php //echo $usr;?>/profile.php">Profile</a>
                        <a class="dropdown-item" href="#">Change password</a>
                        <div class="dropdown-divider"></div>
                        <form action="../Model/logout.php" method="POST">
                            <input class="dropdown-item" type="submit" value="Log Out">
                        </form> 
                    </div>
                </div>
            </div>
        </nav>

        
        <div class="cardSobre m-lg-3">
                <div class="container">
                    <div class="accordion" id="accordionExample">
                        <div class="card">

                            <?php
                            
                                // $sql = "select * from tb_artists where usr = $cod_usr";
                                // $result = mysqli_query($conn, $sql);

                                                                                            
                                // while ($data = $result->fetch_array() ){
                                    
                                //     $artist = $data['artist'];
                            ?>
                            
                            <div class="card-header bg-dark" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#<?php //echo $data['twitter'];?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?php //echo $data['artist'];?>
                                    </button>
                                    <a href="#" class="btn btn-light float-right">Visit Artist</a>
                                </h5>
                            </div>

                            <div id="<?php //echo $data['twitter'];?>" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample"> 
                                <div class = "row">
                                    <!-- <div class="card-body">
                                        <div class="col-sm-6"> -->

                            <?php
                                
                                // $sql_2 = "select * from tb_albums inner join tb_artists on tb_albums.artist = tb_artists.cod_artist where tb_artists.usr = $cod_usr and tb_artists.deactivate = 1 and tb_artists.artist = '$artist'";
                                // $result_2 = mysqli_query($conn, $sql_2); 

                                // while ($data_2 = $result_2->fetch_array()){         

                            ?>

                            
                                    <div class="card" style="width: 18rem; margin: 30px 0px 50px 25px !important;">
                                        <img class="card-img-top" src="<?php //echo $data_2['img_cover'];?>" alt="Imagem de capa do card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php //echo $data_2['album'];?></h5>
                                            <p class="card-text"><?php //echo $data_2['year_album'];?></p>
                                            <p class="card-text"><?php //echo $data_2['about'];?></p>
                                            <a href="#" class="btn btn-primary">Visit</a>
                                        </div>
                                    </div>
                               

                                <?php  //}?>
                                <!-- </div>
                                    </div> -->
                                </div>
                            </div>

                            <?php //}?>


                        </div>
                    </div>                 
                </div>
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
  </html>