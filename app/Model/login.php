<?php

    //require_once '../Controller/Connection.php';
    require_once '../Controller/User.php';

    $user = $_POST['usr'];    
    $password = $_POST['password'];

    if ( (empty($user)) || (empty($password)) ){

        // $_SESSION['alert'] = 'Some field was filled incorrect.';
        // header("Location: ../../index.php");

        echo 'In fact, i wasnt there, i always have been here rsrs';

    }else{

        $usr = new User($user, $password);
        $result = $usr->Login();

        if ($result === 1){
            $_SESSION['usr'] = $user;
            header('Location: ../View/artist.php');
                        
        }else{

            echo 'Im here';
            //$_SESSION['alert'] = "<script>alert('Sorry, we couldnt find an account with this username. Please check youre using the right username and try again.')</script>";
            //header("Location: ../../index.php");

            
        }

    }



