<?php

    require_once '../app/Controller/User.php';

    $resp = $usr = new User('Augusto Garcia de Carvalho Pires','Administrador', '123456', '1995-04-05'); 
    $usr->createUser();

    // var_dump($usr->__get('full_name'));
    // var_dump($usr->__get('user'));
    // var_dump($usr->__get('password'));
    // var_dump($usr->__get('birth'));

    echo '<br><br>';

    //var_dump($usr->Login());