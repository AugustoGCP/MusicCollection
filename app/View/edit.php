<?php

    include "../Controller/Connection.php";

    session_cache_expire(30);
    session_start();
    
    if (empty($_SESSION['usr'])){
        header("Location: ../../index.php");
    }
    
    if (isset($_SESSION['alert'])){
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    } 

    

    // $usr = $_SESSION['usr'];

    // $sql = "select * from tb_users where usr = '$usr'";
    // $result = mysqli_query($conn, $sql);
    // $date = mysqli_fetch_array($result);
    // $cod_usr = $date['cod_usr'];

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
                    <a class="nav-item nav-link " href="album.php">Albums </a>
                    <a class="nav-item nav-link active" href="#">Edit <span class="sr-only">(current)</span></a>   
                </div>
            </div>

            <div class="container">
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Settings
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="dashboard.php"><img class= "img-thumbnail rounded float-left" src="usr/<?php echo $_SESSION['usr'];?>/img/img_profile.jpg" style="max-width: 19% !important; padding: 0.10rem !important; margin-left: 5px !important;"/> <h6 class="dropdown-header " style="padding: 0rem !important; margin-left: 3rem !important;"> Singed with <br><strong><?php echo $_SESSION['usr'];?></strong></h6></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <div class="btn-group dropright">
                            <button type="button" class="dropdown-item btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            Change password

                            </button>  
                            <div class="dropdown-menu">
                                <form class="px-4 py-3">
                                    <div class="form-group">
                                        <label for="exampleDropdownFormEmail1">Endereço de email</label>
                                        <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@exemplo.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleDropdownFormPassword1">Senha</label>
                                        <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Senha">
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </form>
                            </div>                          
                        </div>

                        <div class="dropdown-divider"></div>

                        <form action="../Model/logout.php" method="POST">
                            <input class="dropdown-item" type="submit" value="Log Out">
                        </form> 

                    </div>
                </div>
            </div>
            
            <div class = "container">
                <a href=""><img src="../img/user-friends-solid.svg" alt=""></a>

            </div>
        </nav>

        <div class="cardSobre m-lg-3">
            <div class="container">
               <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header bg-dark" id="headingOne">
                            <button class="btn btn-dark show" type="button" data-toggle="collapse" data-target="#edit_artist" aria-expanded="false" aria-controls="edit_artist">Edit Artists</button>
                            <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#edit_albums" aria-expanded="false" aria-controls="edit_albums">Edit Albums</button>
                            <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#edit_musics" aria-expanded="false" aria-controls="edit_musics edit_albums">Edit Musics</button>
                        </div>
                    </div>
                    <div class="collapse show" id="edit_artist">
                        <div class="card card-body">
                            <p class="h2"> Edit Artists</p>
                            <hr/>
                            <p class="h4"> Create Artist</p>
                            <form action="../php/maintence/edit_artist.php" method="POST">
                                <div class="form-group">
                                    <label for="artist_name">Artist name:</label>
                                    <input type="text" class="form-control" id="artist_name" name="artist_name" placeholder="The artist name...">
                                </div>                      
                                <label for="validationTooltipUsername">Twitter</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="twitter_handle" name="twitter_name" placeholder="Twitter handle" aria-describedby="twitter_handle">       
                                </div><br>
                                <div class="form-group">
                                    <label for="about_artist">Write about this artist</label>
                                    <textarea class="form-control" id="about_artist" name="about_artist" rows="3" placeholder="Write soonely about this artist" ></textarea>
                                </div>
                                <hr/>
                                <p class="h4"> Deactivate Artist</p>
                                <select class="form-control form-control-md" name="disable_artist">
                                    <option desabled>Select the artist</option>
                                    
                                    <?php 

                                        // $sql = "SELECT * FROM `tb_artists` WHERE usr = $cod_usr and deactivate = 1";
                                        // $result = mysqli_query($conn, $sql);
                                        // while ($data = $result->fetch_array()){

                                    ?>

                                    <option value="<?php //echo $data['artist'];?>"><?php //echo $data['artist'];?></option>

                                    <?php  //}?>                                   

                                </select></br>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="deactive" name="deactive">
                                    <label class="form-check-label" for="deactivate">Deactive this artist</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                    <div class="collapse" id="edit_albums">
                        <div class="card card-body">
                            <p class="h2"> Edit Albums</p>
                            <hr>
                            <p class="h4">Create Album</p>
                            <form action="../php/maintence/edit_album.php" method="POST" enctype="multipart/form-data"> 
                                <div class="form-group">
                                    <label for="album_name">Album name:</label>
                                    <input type="text" class="form-control" id="album_name" name="album_name" placeholder="The album name...">
                                </div>
                                <select class="form-control form-control-md" name="cod_artist">
                                    <option disabeled>Select the artist</option>
                                    <?php 

                                        // $sql = "SELECT * FROM `tb_artists` WHERE usr = $cod_usr and deactivate = 1";
                                        // $result = mysqli_query($conn, $sql);
                                        // while ($data = $result->fetch_array()){

                                    ?>
                                    
                                    <option value="<?php //echo $data['cod_artist'];?>"><?php //echo $data['artist'];?></option>
                                    
                                    <?php //}?>
                                </select><br>
                                <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                        <label>Album year</label>
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="year">
                                            <option disabled selected>Choice...</option>
                                            <?php 

                                                // $year = 1930;
                                                // $current_year = Date("Y");
                                                    
                                                // while( $year <= $current_year){                                        
                                            ?>
                                            <option value="<?php //echo $year;?>"><?php //echo $year;?></option>
                                            <?php //$year += 1;}?>
                                        </select>
                                    </div>
                                </div><br>                               
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload the cover album</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                                </div>
                                <button type="submit" class="btn btn-primary" name="send_file">Send</button>
                            </form>
                        </div>
                    </div>  
                    <div class="collapse" id="edit_musics">
                        <div class="card card-body">
                            <p class="h2">Edit Musics</p>
                            <hr>
                            <p class="h4">Insert song(s) in album</p>
                            <form action="../php/maintence/edit_music.php" method="POST" enctype="multipart/form-data">
                                <select class="form-control form-control-md" id="cod_artist" name="cod_artist"> 
                                    <option disabled selected>Select the artist</option>
                                <?php

                                    // $sql = "select * from tb_artists where usr = $cod_usr and deactivate = 1";
                                    // $result = mysqli_query($conn, $sql);
                                    
                                    // while ($data = $result->fetch_array()){

                                ?>
                                    <option value = "<?php //echo $data['cod_artist']?>"><?php //echo $data['artist']?></option>

                                <?php //}?>
                                    
                                </select><br>
                                <select class="form-control form-control-md" name="cod_album">
                                    <option disabled selected>Select the album</option>

                                    <script>

                                    </script>
                                        
                                    <?php
                                    
                                        // $sql = "select * from tb_albums";
                                        // $result = mysqli_query($conn, $sql);

                                        // while ($data = $result->fetch_array()){
                                    
                                    ?>

                                    <option value="<?php //echo $data['cod_album'];?>"><?php //echo $data['album'];?></option>

                                        <?php  //}?>

                                </select><br>
                                    <label for="exampleFormControlFile1">Upload the musics' album</label>
                                    <small id="emailHelp" class="form-text text-muted">Please, use audio file nominated only with the name's song.</small>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file"><br>
                                    <button type="submit" class="btn btn-primary" name="send_file">Send</button>
                            </form>
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