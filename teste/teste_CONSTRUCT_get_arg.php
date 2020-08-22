<?php

    require_once '../app/Controller/User.php';

    $usr = new User('Administrador', '123456'); 

    var_dump($usr->__get('user'));
    var_dump($usr->__get('password'));