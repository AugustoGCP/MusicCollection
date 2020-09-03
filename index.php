<?php

  session_start();

  if(isset($_SESSION['alert'])){
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="783017677176-jl5qbms08409ts13boc6i7i8bodr44gt.apps.googleusercontent.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Olá, mundo!</title>
  </head>
  <body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Ação</a>
                    <a class="dropdown-item" href="#">Outra ação</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Algo mais aqui</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Desativado</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
              </form>
            </div>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-sm-2 px-0 mx-3 border">
                <!-- Botão para acionar modal -->
                <div class="container pt-3 ml-3 ">
                    <input type="button" class="btn" style="padding-right: 3.5em !important; padding-left: 2.9rem !important;"data-toggle="modal" data-target="#singin" value="Sing In">
                        <!-- Sing In 
                    </button> -->
                    <br>
                    <input type="button" class="btn my-2 px-5" data-toggle="modal" data-target="#singup" value="Sing Up">
                        <!-- Sing Up 
                    </button> -->
                </div>
                
                <!-- Modal -->
                  <div class="modal fade" id="singin" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="TituloModalCentralizado">Sing up into Music Collection</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </div>                               
                              <div class="modal-body">
                                <div class="form-group">
                                  <form action="app/Model/login.php" method="POST">
                                    <input class="form-control mb-1" type="text" name="usr" placeholder = "Username or Email">
                                    <input class="form-control mb-1" type="password" name="password" placeholder="Password">       
                                    <button type="submit" class="btn btn-primary">Send</button>
                                  </form>                                  
                                </div>
                              <hr>
                              <p class="text-center">
                                By signing up, you confirm that you agree to our Terms Of Service and have read and understood our Privacy Policy
                              </p>
                            </div>                                
                          </div>
                        </div>                        
                      </div>
                    <div class="modal fade" id="singup" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">                                        
                                <form action="app/Model/sing_up.php" method="POST">
                                  <input class="form-control mb-1" type="email" name="email" placeholder = "Email">
                                  <input class="form-control mb-1" type="text" name = "user" placeholder = "Username">
                                  <input class="form-control mb-1" type="password" name="password" placeholder="Password">       
                                  <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                                <hr>
                                <p class="text-center">
                                  By signing up, you confirm that you agree to our Terms Of Service and have read and understood our Privacy Policy
                                </p>
                              </div>                                
                            </div>
                          </div>
                      </div>                           
                      <hr>
                      <div class="container mx-1">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link active" href="#">Ativo</a>
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

              <div class="container border py-0 px-0 mt-4">
                <div class="row">
                  <div class="col">
                    Sessão
                  </div>
                </div>
              </div>

              <div class="container mt-4">
                <div class="row">
                  <div class="col mr-1 border">
                    Outra sessão
                  </div>
                  <div class="col mr-0 border">
                    Mias uma sessão
                  </div>
                </div>
              </div>
            </div>
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>