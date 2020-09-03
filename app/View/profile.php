<?php
  //include '../../php/maintence/alert.php';

  session_start();

  if (empty($_SESSION['usr'])){
    header("Location: ../../index.php");
  }

  if (isset($_SESSION['alert'])){
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
  }
  
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <!-- Bootstrap CSS -->
    <!-- <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'> -->
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/bootstrap.css.map">
    
    <title><?php echo $_SESSION['full_name']?></title>
  </head>
  <body>
    <div  class='container-fluid'>
      <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <a class='navbar-brand' href='#'>Music Collection</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNavAltMarkup' aria-controls='navbarNavAltMarkup' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNavAltMarkup'>
          <div class='navbar-nav'>
            <a class='nav-item nav-link' href='music.php'>Musics</a>
            <a class='nav-item nav-link' href='artist.php'>Artists</a>
            <a class='nav-item nav-link' href='album.php'>Albums</a>
            <a class='nav-item nav-link' href='edit.php'>Edit</a>          
          </div>
        </div>

        <div class='container'>
          <div class='dropdown'>
            <button class='btn btn-light dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Settings
            </button>
            <div class='dropdown-menu dropdown-menu-left' aria-labelledby='dropdownMenuButton'>
              <a href="dashboard.php"><img class= 'img-thumbnail rounded float-left' src='img/img_profile.jpg' style='max-width: 19% !important; padding: 0.10rem !important; margin-left: 5px !important;'/> <h6 class='dropdown-header' style='padding: 0rem !important; margin-left: 3rem !important;'> Singed with <br><strong><?php echo $_SESSION['usr'];?></strong></h6>
              <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='#?>/profile.php'>Profile</a>
                <a class='dropdown-item' href='#'>Change password</a>
                <div class='dropdown-divider'></div>
                <form action='
                ../Model/logout.php' method='POST'>
                  <input class='dropdown-item' type='submit' value='Log Out'>
                </form> 
              </div>
            </div>
          </div>
        </nav>
      </div>

      <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-2 px-0 mx-3 border">
              <img class="img-thumbnail rounded-circle" src="usr/<?php echo $_SESSION['usr'];?>/img/img_profile.jpg" alt="">
              <p class="text-center mt-2"><?php echo $_SESSION['full_name']?></p>
              <hr>

              <div class="container mx-1">
                  <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="#">Settings</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#">Desativado</a>
                      </li>
                   </ul>
                </div>
          </div>
        <div class="col border mr-3">
          <div>
            <div class="container mt-3">
              <div class="">
                <h1>Settings</h1>
              </div>
              <form class="mt-3" >
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Name</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Username</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Username">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Email</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress">Birth</label>
                    <input type="date" class="form-control" id="inputAddress" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="bio">Biography</label>
                  <textarea class="form-control" id="bio" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>

            </div>
          </div>
        </div>
      </div>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
  </body>
</html>