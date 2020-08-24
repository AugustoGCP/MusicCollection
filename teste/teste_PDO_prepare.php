<?php

    require_once '../app/Controller/Connection.php';
    //require_once '../Classes/User.php';

    $user = 'Administrador';//$_POST['usr'];    
    $password = '123456';//$_POST['password'];

    if ( (empty($user)) || (empty($password)) ){

        $_SESSION['alert'] = 'Some field was filled incorrect.';
        header("Location: ../../index.php");

    }else{

        $conn = new Connection();
        $pdo = $conn->Connect();
        //$conn->getPdo()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $pdo->prepare('SELECT * FROM tb_users WHERE usr = :usr and password = :password');
        $sql->execute(array('usr' => $user, 'password'=> $password));        

        var_dump($sql->rowCount());

    }


    