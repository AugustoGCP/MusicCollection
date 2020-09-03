<?php

    require_once '../app/Controller/User.php';

    $usr = new User('AugustoGarcia', '123456');
    $resposta = $usr->Login();
    print_r($resposta);