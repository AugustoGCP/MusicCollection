<?php

    require_once '../app/Controller/Connection.php';

    $connect = new Connection();

    var_dump($connect->Connect());